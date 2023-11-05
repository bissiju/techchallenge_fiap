<?php

namespace TechChallengeFIAP\Application\Customer\Find;

class FindCustomerRequest
{
    private string $customerCpf;

    /**
     * @return string
     */
    public function getCustomerCpf(): string
    {
        return $this->customerCpf;
    }

    /**
     * @param string $customerCpf
     * @return FindCustomerRequest
     */
    public function setCustomerCpf(string $customerCpf): FindCustomerRequest
    {
        $this->customerCpf = $customerCpf;

        return $this;
    }

}
