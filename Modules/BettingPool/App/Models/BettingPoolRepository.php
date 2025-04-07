<?php

declare(strict_types=1);

namespace Modules\BettingPool\App\Models;

use Illuminate\Pagination\LengthAwarePaginator;
use Modules\BettingPool\Api\BettingPoolRepositoryInterface;
use Modules\BettingPool\Api\Data\BettingPoolInterface;
use Modules\BettingPool\App\Models\Data\BettingPool;

class BettingPoolRepository implements BettingPoolRepositoryInterface
{
    /**
     * Retrieve betting pool by id
     *
     * @param int $id
     * @return BettingPoolInterface
     */
    public function getById(int $id): BettingPoolInterface
    {
        return BettingPool::find($id);
    }

    /**
     * Retrieve betting pool list based on filters
     *
     * @param array $filters
     * @return LengthAwarePaginator
     */
    public function getList(array $filters): LengthAwarePaginator
    {
        if ($filters['type']) {
            return BettingPool::where(BettingPoolInterface::TYPE, $filters['type'])->paginate(10);
        }

        if ($filters['code']) {
            return BettingPool::where(BettingPoolInterface::CODE, $filters['code'])->paginate(10);
        }

        return BettingPool::all()->forPage(0, 10);
    }

    /**
     * Saves betting pool
     *
     * @param array $data
     * @return bool
     */
    public function save(array $data): bool
    {
        $bettingPool = BettingPool::make();
        $bettingPool->name = $data[BettingPoolInterface::NAME];
        $bettingPool->code = $data[BettingPoolInterface::CODE];
        $bettingPool->type = $data[BettingPoolInterface::TYPE];
        return $bettingPool->save();
    }

    /**
     * Delete betting pool
     *
     * @param int $bettingPoolId
     * @return bool
     */
    public function delete(int $bettingPoolId): bool
    {
        /** @var BettingPool $bettingPool */
        $bettingPool = $this->getById($bettingPoolId);
        return $bettingPool->delete();
    }
}
