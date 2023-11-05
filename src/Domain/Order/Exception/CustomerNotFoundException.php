<?php

namespace TechChallengeFIAP\Domain\Order\Exception;

use TechChallengeFIAP\Domain\Shared\Exception\BaseException;

class CustomerNotFoundException extends BaseException
{
    public function __construct(string $cpf)
    {
        parent::__construct("Não existe cliente cadastrado com o CPF {$cpf}.");
    }
}
