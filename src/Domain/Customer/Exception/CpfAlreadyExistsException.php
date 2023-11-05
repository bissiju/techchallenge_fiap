<?php

namespace TechChallengeFIAP\Domain\Customer\Exception;

use TechChallengeFIAP\Domain\Shared\Exception\BaseException;

class CpfAlreadyExistsException extends BaseException
{
    public function __construct(string $cpf)
    {
        parent::__construct("CPF {$cpf} já cadastrado.");
    }
}
