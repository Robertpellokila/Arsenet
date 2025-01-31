<?php

return [
    // Set to true if you're in production, false for sandbox/testing mode
    'is_production' => env('MIDTRANS_PRODUCTION', false),

    // Your Midtrans Server Key
    'server_key' => env('MIDTRANS_SERVER_KEY', ''),

    // Your Midtrans Client Key
    'client_key' => env('MIDTRANS_CLIENT_KEY', ''),

    // Optional: Enable sanitization and 3DS secure features
    'is_sanitized' => env('MIDTRANS_SANITIZED', true),
    'is_3ds' => env('MIDTRANS_3DS', true),
];