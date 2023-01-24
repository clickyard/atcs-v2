<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginato;


use App\Http\Livewire\OrderWizardComponent;
use App\Http\Livewire\Steps\CartStepComponent;
use App\Http\Livewire\Steps\ConfirmStepComponent;
use App\Http\Livewire\Steps\DeliveryAddressStepComponent;
use Illuminate\Support\Facades\Blade;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::preventLazyLoading(! app()->isProduction());
        Paginator::useBootstrap();


        Blade::component('layouts.layout', 'layout');
        Blade::component('components.button', 'button');
        Blade::component('components.input', 'input');

        Livewire::component('order-wizard', OrderWizardComponent::class);
        Livewire::component('cart', CartStepComponent::class);
        Livewire::component('delivery-address', DeliveryAddressStepComponent::class);
        Livewire::component('confirm', ConfirmStepComponent::class);
    }
}
