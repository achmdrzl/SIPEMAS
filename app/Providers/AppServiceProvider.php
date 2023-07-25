<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('required_supplier_for_cuci_reparasi', function ($attribute, $value, $parameters, $validator) {
            $returnKondisi = request('detail_penjualan_return_kondisi');

            // If any of the return_kondisi values is 'CUCI' or 'REPARASI', supplier_id is required
            if (in_array('CUCI', $returnKondisi) || in_array('REPARASI', $returnKondisi)) {
                return !empty($value);
            }

            return true;
        });
    }
}
