<?php

declare(strict_types=1);

namespace Modules\BettingPool\Api;

interface BettingPoolInterface
{
    public const TABLE_NAME = 'betting_pool';
    public const NAME = 'name';
    public const TYPE = 'type';
    public const CODE = 'code';

    /**
     * Retrieves betting pool name
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Set betting pool name
     *
     * @param string $name
     * @return self
     */
    public function setName(string $name): self;

    /**
     * Retrieves betting pool type
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Set betting pool type
     *
     * @param string $type
     * @return self
     */
    public function setType(string $type): self;

    /**
     * Retrieves betting pool code
     *
     * @return string
     */
    public function getCode(): string;

    /**
     * Set betting pool code
     *
     * @param string $code
     * @return self
     */
    public function setCode(string $code): self;
}
