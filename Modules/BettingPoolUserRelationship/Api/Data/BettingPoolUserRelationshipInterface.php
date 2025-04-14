<?php

declare(strict_types=1);

namespace Modules\BettingPoolUserRelationship\Api\Data;

interface BettingPoolUserRelationshipInterface
{
    public const TABLE_NAME = 'betting_pool_user_relationship';
    public const BETTING_POOL_ID = 'betting_pool_id';
    public const USER_ID = 'user_id';
    public const SCORE = 'score';
    public const POSITION = 'position';

    /**
     * Retrieve betting pool id
     *
     * @return int
     */
    public function getBettingPoolId(): int;

    /**
     * Set betting pool
     *
     * @param int $bettingPoolId
     * @return self
     */
    public function setBettingPoolId(int $bettingPoolId): self;

    /**
     * Retrieve user id
     *
     * @return int
     */
    public function getUserId(): int;

    /**
     * Set user id
     *
     * @param int $userId
     * @return self
     */
    public function setUserId(int $userId): self;

    /**
     * Retrieve score
     *
     * @return int
     */
    public function getScore(): int;

    /**
     * Set score
     *
     * @param int $score
     * @return self
     */
    public function setScore(int $score): self;

    /**
     * Retrieve position
     *
     * @return int
     */
    public function getPosition(): int;

    /**
     * Set position
     *
     * @param int $position
     * @return self
     */
    public function setPosition(int $position): self;
}
