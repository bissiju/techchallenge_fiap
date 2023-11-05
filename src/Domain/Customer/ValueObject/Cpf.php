<?php

namespace TechChallengeFIAP\Domain\Customer\ValueObject;

use TechChallengeFIAP\Domain\Customer\Exception\CpfIsNotValidException;

class Cpf
{
    private array $invalidCpf = ['00000000000', '12345678910'];

    private string $cpf;

    public function __construct(string $cpf)
    {
        if (in_array($cpf, $this->invalidCpf)) {
            throw new CpfIsNotValidException($cpf, $this->invalidCpf);
        }
        
        $this->cpf = $cpf;
    }

    public function cpf()
    {
        return $this->cpf;
    }
}
