<?php

declare(strict_types=1);

namespace Modules\BettingPoolUserRelationship\Api;

use Illuminate\Database\Eloquent\Collection;
use Modules\BettingPoolUserRelationship\Api\Data\BettingPoolUserRelationshipInterface;

interface BettingPoolUserRelationshipRepositoryInterface
{
    /**
     * Saves betting pool
     *
     * @param array $data
     * @return bool
     */
    public function save(array $data): bool;

    /**
     * Retrieve betting pool list based on filters
     *
     * @param array $filters
     * @param int $paginate
     * @param int $page
     * @return BettingPoolUserRelationshipInterface[]|Collection
     */
    public function getList(array $filters, int $paginate, int $page = 0): array|Collection;

    /**
     * Retrieve betting pool list by user id
     *
     * @param int $id
     * @return BettingPoolUserRelationshipInterface[]
     */
    public function getListByUser(int $id): array;
}
