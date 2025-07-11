<?php

namespace App\Providers;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

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
         View::composer('*', function ($view) {
        $jumlahKeranjang = 0;

        if (Auth::check()) {
            $jumlahKeranjang = Keranjang::where('user_id', Auth::id())->count(); 
        }

        $view->with('jumlahKeranjang', $jumlahKeranjang);
    });
    }
}
