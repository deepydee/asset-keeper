<?php

namespace App\Http\Controllers\API;

use App\Contracts\PaymentGatewayContract;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function __construct(
        private PaymentGatewayContract $gateway,
    ) {}
}
