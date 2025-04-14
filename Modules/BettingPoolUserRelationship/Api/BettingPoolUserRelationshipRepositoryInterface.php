<?php

declare(strict_types=1);

namespace Modules\BettingPoolUserRelationship\Api;

use Illuminate\Pagination\LengthAwarePaginator;

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
     * @return LengthAwarePaginator
     */
    public function getList(array $filters, int $paginate, int $page = 0): LengthAwarePaginator;
}
