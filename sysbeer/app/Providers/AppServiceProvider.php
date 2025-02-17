<?php

namespace App\Providers;

use App\Factories\EmbalagemFactory;
use App\Factories\FactoryEmbalagemInterface;
use App\Services\ProdutoService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(FactoryEmbalagemInterface::class, EmbalagemFactory::class);

        $this->app->singleton('produtoService', function ($app) {
            return new ProdutoService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));

    }
}
