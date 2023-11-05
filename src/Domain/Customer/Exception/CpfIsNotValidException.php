<?php

namespace TechChallengeFIAP\Domain\Customer\Exception;

use TechChallengeFIAP\Domain\Shared\Exception\BaseException;

class CPFIsNotValidException extends BaseException
{
    public function __construct(string $cpf, array $invalidCpf)
    {
        parent::__construct("O CPF {$cpf} é inválido.");
    }
}
