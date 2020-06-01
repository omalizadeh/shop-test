<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // interfaces
        $this->app->singleton(\App\Repositories\Interfaces\UserRepositoryInterface::class, \App\Repositories\UserRepository::class);
        $this->app->singleton(\App\Repositories\Interfaces\ArticleRepositoryInterface::class, \App\Repositories\ArticleRepository::class);
        $this->app->singleton(\App\Repositories\Interfaces\BrandRepositoryInterface::class, \App\Repositories\BrandRepository::class);
        $this->app->singleton(\App\Repositories\Interfaces\CategoryRepositoryInterface::class, \App\Repositories\CategoryRepository::class);
        $this->app->singleton(\App\Repositories\Interfaces\ProductRepositoryInterface::class, \App\Repositories\ProductRepository::class);
        $this->app->singleton(\App\Repositories\Interfaces\FeatureGroupRepositoryInterface::class, \App\Repositories\FeatureGroupRepository::class);
        $this->app->singleton(\App\Repositories\Interfaces\FeatureRepositoryInterface::class, \App\Repositories\FeatureRepository::class);
        // extended classes
    }
}
