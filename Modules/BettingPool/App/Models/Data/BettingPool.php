<?php

declare(strict_types=1);

namespace Modules\BettingPool\App\Models\Data;

use Illuminate\Database\Eloquent\Model;
use Modules\BettingPool\Api\BettingPoolInterface;

class BettingPool extends Model implements BettingPoolInterface
{
    protected $table = BettingPoolInterface::TABLE_NAME;

    protected $fillable = [
        BettingPoolInterface::NAME,
        BettingPoolInterface::TYPE,
        BettingPoolInterface::CODE
    ];

    /**
     * Retrieves betting pool name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set betting pool name
     *
     * @param string $name
     * @return self
     */
    public function setName(string $name): BettingPoolInterface
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Retrieves betting pool type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set betting pool type
     *
     * @param string $type
     * @return self
     */
    public function setType(string $type): BettingPoolInterface
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Retrieves betting pool code
     *
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Set betting pool code
     *
     * @param string $code
     * @return self
     */
    public function setCode(string $code): BettingPoolInterface
    {
        $this->code = $code;
        return $this;
    }
}
