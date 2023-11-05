<?php

namespace TechChallengeFIAP\Domain\Customer;

use TechChallengeFIAP\Domain\Shared\Uuid;

class CustomerId extends Uuid
{
    public function equals(CustomerId $customerId): bool
    {
        return $this->id === $customerId->id();
    }
}
