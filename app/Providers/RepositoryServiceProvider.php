<?php

namespace App\Providers;

use App\Repositories\AssuntoRepository;
use App\Repositories\AutorRepository;
use App\Repositories\Interfaces\AssuntoRepositoryInterface;
use App\Repositories\Interfaces\AutorRepositoryInterface;
use App\Repositories\Interfaces\LivroRepositoryInterface;
use App\Repositories\LivroRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(LivroRepositoryInterface::class, LivroRepository::class);
        $this->app->bind(AutorRepositoryInterface::class, AutorRepository::class);
        $this->app->bind(AssuntoRepositoryInterface::class, AssuntoRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
