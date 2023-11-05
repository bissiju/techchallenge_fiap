<?php

namespace TechChallengeFIAP\Domain\Product\Exception;

use TechChallengeFIAP\Domain\Shared\Exception\BaseException;

class NameAlreadyExistsException extends BaseException
{
    public function __construct(string $name)
    {
        parent::__construct("Já existe um produto com o nome {$name}.");
    }
}
