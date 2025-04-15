<?php

namespace Modules\BettingPoolUserRelationship\App\Observers;

use Modules\BettingPool\App\Models\Data\BettingPool;
use Illuminate\Support\Facades\Auth;
use Modules\BettingPoolUserRelationship\Api\BettingPoolUserRelationshipRepositoryInterface;
use Modules\BettingPoolUserRelationship\Api\Data\BettingPoolUserRelationshipInterface;

class CreateRelationshipObserver
{
    public function __construct(
        private readonly BettingPoolUserRelationshipRepositoryInterface $bettingPoolUserRelationshipRepository
    ) {
    }

    /**
     * Creates relationship between user and betting pool after betting pool creation
     *
     * @param BettingPool $subject
     * @return void
     */
    public function created(BettingPool $subject): void
    {
        $user = Auth::user();

        $data = [
            BettingPoolUserRelationshipInterface::BETTING_POOL_ID => $subject->id,
            BettingPoolUserRelationshipInterface::USER_ID => $user->id,
            BettingPoolUserRelationshipInterface::SCORE => 0,
            BettingPoolUserRelationshipInterface::POSITION => 1
        ];

        $this->bettingPoolUserRelationshipRepository->save($data);
    }
}
