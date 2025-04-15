<?php

declare(strict_types=1);

namespace Modules\BettingPoolUserRelationship\App\Providers;

use Modules\BettingPoolUserRelationship\Api\BettingPoolUserRelationshipRepositoryInterface;
use Modules\BettingPoolUserRelationship\Api\Data\BettingPoolUserRelationshipInterface;
use Modules\BettingPoolUserRelationship\Models\BettingPoolUserRelationshipRepository;
use Modules\BettingPoolUserRelationship\Models\Data\BettingPoolUserRelationship;
use Modules\Framework\App\Model\ModuleBaseFiles\AbstractServiceProvider;
use Modules\BettingPool\App\Models\Data\BettingPool;
use Modules\BettingPoolUserRelationship\App\Observers\CreateRelationshipObserver;

class BettingPoolUserRelationshipServiceProvider extends AbstractServiceProvider
{
    protected string $moduleName = 'BettingPoolUserRelationship';
    protected string $moduleNameLower = 'bettingpooluserrelationship';

    public function boot(): void
    {
        parent::boot();

        $this->app->bind(
            BettingPoolUserRelationshipInterface::class,
            BettingPoolUserRelationship::class
        );

        $this->app->bind(
            BettingPoolUserRelationshipRepositoryInterface::class,
            BettingPoolUserRelationshipRepository::class
        );

        BettingPool::observe(
            [
                CreateRelationshipObserver::class
            ]
        );
    }
}
