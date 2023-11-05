<?php

namespace TechChallengeFIAP\Domain\Customer;

use DateTime;
use TechChallengeFIAP\Domain\Customer\ValueObject\Cpf;
use TechChallengeFIAP\Domain\Customer\ValueObject\Name;

class Customer
{
    private CustomerId $id;

    private string $cpf;

    private string $name;

    private DateTime $createdAt;

    public function __construct(CustomerId $id, string $cpf, string $name, DateTime $createdAt = null)
    {
        $this->id = $id;
        $this->cpf = $cpf;
        $this->name = $name;
        $this->createdAt = $createdAt ?? new DateTime();
    }

    public function id(): CustomerId
    {
        return $this->id;
    }

    public function cpf(): Cpf
    {
        return $this->cpf;
    }

    public function name(): Name
    {
        return $this->name;
    }

    public function createdAt(): DateTime
    {
        return $this->createdAt;
    }
}
