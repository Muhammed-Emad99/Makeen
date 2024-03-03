<?php

namespace App\Providers;

use App\Base\Interfaces\BaseRepositoryInterface;
use App\Base\Interfaces\SettingRepositoryInterface;
use App\Base\Repositories\BaseRepository;
use App\Base\Repositories\SettingRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
