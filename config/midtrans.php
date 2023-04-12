<?php


return [
    'MIDTRANS_SERVER_KEY' => env('MIDTRANS_SERVER_KEY'),
    'MIDTRANS_CLIENT_KEY' => env('MIDTRANS_CLIENT_KEY'),
    'is_production' => false,
    'is_sanitized' => true, // Set sanitization on (default)
    'is_3ds' => true, // Set 3DS transaction for credit card to true
];

