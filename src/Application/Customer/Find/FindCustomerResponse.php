<?php

namespace TechChallengeFIAP\Application\Customer\Find;

use TechChallengeFIAP\Domain\Customer\CustomerId;

class FindCustomerResponse
{
    private CustomerId $customerId;

    public function __construct(CustomerId $customerId)
    {
        $this->customerId = $customerId;
    }

    public function id(): CustomerId
    {
        return $this->customerId;
    }

    public function __toString()
    {
        return json_encode(['id' => $this->customerId->id()]);
    }
}
