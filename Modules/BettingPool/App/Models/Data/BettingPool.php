<?php

declare(strict_types=1);

namespace Modules\BettingPool\App\Models\Data;

use Modules\BettingPool\Api\BettingPoolInterface;

class BettingPool implements BettingPoolInterface
{
    /**
     * Retrieves betting pool name
     *
     * @return string
     */
    public function getName(): string
    {
        // TODO: Implement getName() method.
    }

    /**
     * Set betting pool name
     *
     * @param string $name
     * @return self
     */
    public function setName(string $name): BettingPoolInterface
    {
        // TODO: Implement setName() method.
    }

    /**
     * Retrieves betting pool type
     *
     * @return string
     */
    public function getType(): string
    {
        // TODO: Implement getType() method.
    }

    /**
     * Set betting pool type
     *
     * @param string $type
     * @return self
     */
    public function setType(string $type): BettingPoolInterface
    {
        // TODO: Implement setType() method.
    }

    /**
     * Retrieves betting pool code
     *
     * @return string
     */
    public function getCode(): string
    {
        // TODO: Implement getCode() method.
    }

    /**
     * Set betting pool code
     *
     * @param string $code
     * @return self
     */
    public function setCode(string $code): BettingPoolInterface
    {
        // TODO: Implement setCode() method.
    }
}
