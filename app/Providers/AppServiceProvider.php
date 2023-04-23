<?php

namespace App\Providers;

use App\Contracts\PaymentGatewayContract;
use App\Contracts\ProductRepositoryContract;
use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\PaymentController as ControllersPaymentController;
use App\Repositories\ProductRepository;
use App\Services\PaymentGateway\RobokassaGateway;
use App\Services\PaymentGateway\SberGateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // привязка интерфейса к реализации
        $this->app->bind(ProductRepositoryContract::class, ProductRepository::class);
        // $this->app->singleton(ProductRepositoryContract::class, ProductRepository::class);

        // к одному интерфейск привязываем разные реализации
        $this->app->when(PaymentController::class)
            ->needs(PaymentGatewayContract::class)
            ->give(RobokassaGateway::class);

        $this->app->when(ControllersPaymentController::class)
            ->needs(PaymentGatewayContract::class)
            ->give(SberGateway::class);

        // $this->app->when(RobokassaGateway::class)
        //     ->needs('$username')
        //     ->give(config('robokassa.username'));

        // передать нужные данные в реализацию
        $this->app->when(RobokassaGateway::class)
            ->needs('$username')
            ->giveConfig('robokassa.username');

        // реакция на событие извлечения объекта из контейнера
        $this->app->resolving(RobokassaGateway::class, function ($gateway, $app) {
            // здесь логика
            // $gateway - class instance
            // $app - app instance
        });

        // при извлечении любого объекта из контейнера
        $this->app->resolving(function ($object, $app) {
            // здесь логика
            // $object - class instance
            // $app - app instance
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
