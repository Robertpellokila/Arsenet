<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Notification;

class PaymentController extends Controller
{
    public function process(Order $order)
    {
        // Validate required fields
        if (empty($order->id) || empty($order->total_harga) || empty($order->nama_pelanggan) || empty($order->email_pelanggan) || empty($order->telepon_pelanggan)) {
            return redirect()->back()->with('error', 'Invalid order details. Please try again.');
        }

        // Proceed with payment gateway setup, 
        $paymentGateway = new \Midtrans\Snap();

        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false; // Set to true for production
        Config::$isSanitized = true;

        // Data transaksi
        $transactionDetails = [
            'transaction_details' => [
               'order_id' => 'ORDER-' . $order->id . '-' . time(),
                'gross_amount' => (int)$order->total_harga,
            ],
            'customer_details' => [
                'first_name' => $order->nama_pelanggan,
                'email' => $order->email_pelanggan,
                'phone' => $order->telepon_pelanggan,
            ],
        ];

        // Ensure no empty array elements
        if (empty($transactionDetails['transaction_details']['order_id']) || empty($transactionDetails['transaction_details']['gross_amount'])) {
            return redirect()->back()->with('error', 'Transaction details are incomplete.');
        }

        // Create Snap token
        try {
            $snapToken = $paymentGateway::getSnapToken($transactionDetails);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Payment gateway error: ' . $e->getMessage());
        }

        // Send snapToken to the view
        return view('payment.process', compact('snapToken', 'order'));
    }

    // Method to handle the webhook notification from Midtrans
    public function webhook(Request $request)
    {
        // Set your server key for Midtrans
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Get notification from Midtrans
        $notification = new Notification();
        $order_id = $notification->order_id;
        $transaction_status = $notification->status_pembayaran;

        // Find order by order_id
        $order = Order::where('id', $order_id)->first();

        if (!$order) {
            return response()->json(['status' => 'Order not found'], 404);
        }

        // Update order status based on transaction status
        switch ($transaction_status) {
            case 'capture':
            case 'settlement':
                // Payment is successful
                $order->status = 'aktif'; // Change order status to "active"
                $order->is_paid = true;  // Mark as paid
                $order->save();
                break;

            case 'deny':
            case 'expired':
            case 'failed':
                // Payment failed
                $order->status = 'failed';
                $order->save();
                break;

            case 'pending':
                // Payment is pending
                $order->status = 'pending';
                $order->save();
                break;
        }

        return response()->json(['status' => 'OK']);
    }
}