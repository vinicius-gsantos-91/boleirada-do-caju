<?php

declare(strict_types=1);

namespace Modules\BettingPool\Api;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\BettingPool\Api\Data\BettingPoolInterface;

interface BettingPoolRepositoryInterface
{
    /**
     * Retrieve betting pool by id
     *
     * @param int $id
     * @return BettingPoolInterface
     */
    public function getById(int $id): BettingPoolInterface;

    /**
     * Retrieve betting pool by code
     *
     * @param string $code
     * @return BettingPoolInterface
     * @throws ModelNotFoundException
     */
    public function getByCode(string $code): BettingPoolInterface;

    /**
     * Retrieve betting pool list based on filters
     *
     * @param array $filters
     * @return LengthAwarePaginator
     */
    public function getList(array $filters): LengthAwarePaginator;

    /**
     * Saves betting pool
     *
     * @param array $data
     * @return bool
     */
    public function save(array $data): bool;

    /**
     * Delete betting pool
     *
     * @param int $bettingPoolId
     * @return bool
     */
    public function delete(int $bettingPoolId): bool;
}
