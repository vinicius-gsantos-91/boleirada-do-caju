<?php

namespace Modules\BettingPoolUserRelationship\App\Observers;

use Modules\BettingPool\App\Models\Data\BettingPool;
use Illuminate\Support\Facades\Auth;
use Modules\BettingPoolUserRelationship\Api\BettingPoolUserRelationshipRepositoryInterface;
use Modules\BettingPoolUserRelationship\Api\Data\BettingPoolUserRelationshipInterface;
use Modules\BettingPoolUserRelationship\Models\Data\BettingPoolUserRelationship;

class CreateRelationshipObserver
{
    public function __construct(
        private readonly BettingPoolUserRelationshipRepositoryInterface $bettingPoolUserRelationshipRepository
    ) {
    }

    /**
     * Handle the CreateRelationship "created" event.
     */
    public function created(BettingPool $subject): void
    {
        $lastDocument = $this->bettingPoolUserRelationshipRepository->getList([])->count() > 0
            ? BettingPoolUserRelationship::all()->last()
            : null;

        $user = Auth::user();

        $data = [
            BettingPoolUserRelationshipInterface::BETTING_POOL_ID => $subject->id,
            BettingPoolUserRelationshipInterface::USER_ID => $user->id,
            BettingPoolUserRelationshipInterface::SCORE => 0,
            BettingPoolUserRelationshipInterface::POSITION => $lastDocument
                ? $lastDocument->getPosition() + 1
                : 1
            ];

        $this->bettingPoolUserRelationshipRepository->save($data);
    }
}
