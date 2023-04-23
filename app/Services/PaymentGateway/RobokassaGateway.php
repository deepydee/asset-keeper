<?php

namespace App\Services\PaymentGateway;

use App\Contracts\PaymentGatewayContract;

class RobokassaGateway implements PaymentGatewayContract
{
    public function __construct(
        private string $username,
        private string $password,
    ) {}
}
