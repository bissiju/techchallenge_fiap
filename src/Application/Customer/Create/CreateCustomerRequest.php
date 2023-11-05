<?php

namespace TechChallengeFIAP\Application\Customer\Create;

class CreateCustomerRequest
{
    private string $cpf;

    private string $name;

    /**
     * @return string
     */
    public function getCpf(): string
    {
        return $this->cpf;
    }

    /**
     * @param string $cpf
     * @return CreateCustomerRequest
     */
    public function setCpf(string $cpf): CreateCustomerRequest
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CreateCustomerRequest
     */
    public function setName(string $name): CreateCustomerRequest
    {
        $this->name = $name;
        return $this;
    }

}
