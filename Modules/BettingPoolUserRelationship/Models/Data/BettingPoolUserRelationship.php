<?php

declare(strict_types=1);

namespace Modules\BettingPoolUserRelationship\Models\Data;

use Illuminate\Database\Eloquent\Model;
use Modules\BettingPoolUserRelationship\Api\Data\BettingPoolUserRelationshipInterface;

/**
 * @property int $id
 * @property int betting_pool_id
 * @property int user_id
 * @property int $score
 * @property int $position
 * @method static \Illuminate\Database\Eloquent\Builder|BettingPoolUserRelationship newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BettingPoolUserRelationship newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BettingPoolUserRelationship query()
 * @method static \Illuminate\Database\Eloquent\Builder|BettingPoolUserRelationship whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BettingPoolUserRelationship whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BettingPoolUserRelationship whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BettingPoolUserRelationship whereType($value)
 * @mixin \Eloquent
 */
class BettingPoolUserRelationship extends Model implements BettingPoolUserRelationshipInterface
{
    public $timestamps = false;
    protected $table = BettingPoolUserRelationshipInterface::TABLE_NAME;
    protected $fillable = [
        BettingPoolUserRelationshipInterface::BETTING_POOL_ID,
        BettingPoolUserRelationshipInterface::USER_ID,
        BettingPoolUserRelationshipInterface::POSITION,
        BettingPoolUserRelationshipInterface::SCORE
    ];

    /**
     * Retrieve betting pool id
     *
     * @return int
     */
    public function getBettingPoolId(): int
    {
        return $this->betting_pool_id;
    }

    /**
     * Set betting pool
     *
     * @param int $bettingPoolId
     * @return self
     */
    public function setBettingPoolId(int $bettingPoolId): BettingPoolUserRelationshipInterface
    {
        $this->betting_pool_id = $bettingPoolId;
        return $this;
    }

    /**
     * Retrieve user id
     *
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * Set user id
     *
     * @param int $userId
     * @return self
     */
    public function setUserId(int $userId): BettingPoolUserRelationshipInterface
    {
        $this->user_id = $userId;
        return $this;
    }

    /**
     * Retrieve score
     *
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * Set score
     *
     * @param int $score
     * @return self
     */
    public function setScore(int $score): BettingPoolUserRelationshipInterface
    {
        $this->score = $score;
        return $this;
    }

    /**
     * Retrieve position
     *
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * Set position
     *
     * @param int $position
     * @return self
     */
    public function setPosition(int $position): BettingPoolUserRelationshipInterface
    {
        $this->position = $position;
        return $this;
    }
}
