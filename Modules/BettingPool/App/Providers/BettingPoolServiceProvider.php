<?php

declare(strict_types=1);

namespace Modules\BettingPool\App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\BettingPool\Api\BettingPoolRepositoryInterface;
use Modules\BettingPool\Api\Data\BettingPoolInterface;
use Modules\BettingPool\App\Models\BettingPoolRepository;
use Modules\BettingPool\App\Models\Data\BettingPool;

class BettingPoolServiceProvider extends ServiceProvider
{
    protected string $moduleName = 'BettingPool';
    protected string $moduleNameLower = 'bettingpool';

    public function boot(): void
    {
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/migrations'));
    }

    public function register(): void
    {
        $this->app->bind(
            BettingPoolInterface::class,
            BettingPool::class
        );
        $this->app->bind(
            BettingPoolRepositoryInterface::class,
            BettingPoolRepository::class
        );
    }
}
