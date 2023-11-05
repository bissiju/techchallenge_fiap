<?php

namespace TechChallengeFIAP\Domain\Customer\ValueObject;

class Name
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function name()
    {
        return $this->name;
    }
}
