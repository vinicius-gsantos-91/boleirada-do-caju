<?php

declare(strict_types=1);

namespace Modules\BettingPoolUserRelationship\Models;

use Illuminate\Pagination\LengthAwarePaginator;
use Modules\BettingPoolUserRelationship\Api\BettingPoolUserRelationshipRepositoryInterface;
use Modules\BettingPoolUserRelationship\Api\Data\BettingPoolUserRelationshipInterface;
use Modules\BettingPoolUserRelationship\Models\Data\BettingPoolUserRelationship;
use Illuminate\Database\Eloquent\Collection;

class BettingPoolUserRelationshipRepository implements BettingPoolUserRelationshipRepositoryInterface
{
    /**
     * Saves betting pool
     *
     * @param array $data
     * @return bool
     */
    public function save(array $data): bool
    {
        $bettingPoolUserRelationship = BettingPoolUserRelationship::make();
        $bettingPoolUserRelationship
            ->setBettingPoolId($data[BettingPoolUserRelationshipInterface::BETTING_POOL_ID])
            ->setUserId($data[BettingPoolUserRelationshipInterface::USER_ID])
            ->setScore($data[BettingPoolUserRelationshipInterface::SCORE])
            ->setPosition($data[BettingPoolUserRelationshipInterface::POSITION]);
        return $bettingPoolUserRelationship->save();
    }

    /**
     * Retrieve betting pool list based on filters
     *
     * @param array $filters
     * @param int $paginate
     * @param int $page
     * @return LengthAwarePaginator|Collection
     */
    public function getList(array $filters, int $paginate = 10, int $page = 0): LengthAwarePaginator|Collection
    {
        if (!empty($filters[BettingPoolUserRelationshipInterface::BETTING_POOL_ID])) {
            return BettingPoolUserRelationship::where(
                BettingPoolUserRelationshipInterface::BETTING_POOL_ID,
                $filters[BettingPoolUserRelationshipInterface::BETTING_POOL_ID]
            )->paginate($paginate);
        }

        if (!empty($filters[BettingPoolUserRelationshipInterface::USER_ID])) {
            return BettingPoolUserRelationship::where(
                BettingPoolUserRelationshipInterface::USER_ID,
                $filters[BettingPoolUserRelationshipInterface::USER_ID]
            )->paginate($paginate);
        }

        return BettingPoolUserRelationship::all()->forPage($page, $paginate);
    }

    /**
     * Retrieve betting pool list by user id
     *
     * @param int $id
     * @return LengthAwarePaginator
     */
    public function getListByUser(int $id): LengthAwarePaginator
    {
        return $this->getList([BettingPoolUserRelationshipInterface::USER_ID => $id]);
    }
}
