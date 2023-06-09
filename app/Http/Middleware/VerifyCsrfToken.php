<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
       'payments/paypal/status-success',
       'payments/payu/status-success',
       'payments/payu/status-cancel',
       'paynow/fee/pau-success',
       'paynow/fee/pau-cancel',
       'paynow/fee/paypal-success',
       'paynow/fee/paypal-cancel',
       '/mdtxs/fdxs', // Midtrans Callback
       '/support/facebook/deletion' // Facebook Callback
    ];
}
