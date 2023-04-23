<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentGatewayContract;

class PaymentController extends Controller
{
    public function __construct(
        private PaymentGatewayContract $gateway,
    ) {}
}
