<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan');
            $table->string('email_pelanggan');
            $table->string('telepon_pelanggan');
            $table->foreignId('paket_id')->constrained('pakets')->onDelete('cascade'); // Relasi ke tabel paket
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');  // Relasi ke tabel user
            $table->enum('status', ['pending', 'completed','active', 'canceled'])->default('pending'); // Status pemesanan
            $table->boolean('is_paid')->default(false);
            $table->decimal('total_harga', 10, 2); // Total harga pesanan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};