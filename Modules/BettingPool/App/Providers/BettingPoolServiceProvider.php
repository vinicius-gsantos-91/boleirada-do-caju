<?php

declare(strict_types=1);

namespace Modules\BettingPool\App\Providers;

use Modules\BettingPool\Api\BettingPoolRepositoryInterface;
use Modules\BettingPool\Api\Data\BettingPoolInterface;
use Modules\BettingPool\App\Models\BettingPoolRepository;
use Modules\BettingPool\App\Models\Data\BettingPool;
use Modules\Framework\App\Model\ModuleBaseFiles\AbstractServiceProvider;

class BettingPoolServiceProvider extends AbstractServiceProvider
{
    protected string $moduleName = 'BettingPool';
    protected string $moduleNameLower = 'bettingpool';

    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);

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
