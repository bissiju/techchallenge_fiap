<?php

namespace TechChallengeFIAP\Application\Order\Create;

class CreateOrderRequest
{
    private string $customerId;

    public function getCustomerId(): string
    {
        return $this->customerId;
    }

    public function setCustomerId(string $customerId): CreateOrderRequest
    {
        $this->customerId = $customerId;
        return $this;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): CreateOrderRequest
    {
        $this->cpf = $cpf;
        return $this;
    }

    public function getProductsId(): string
    {
        return $this->productsId;
    }

    public function setProductsId(string $productsId): CreateOrderRequest
    {
        $this->productsId = $productsId;
        return $this;
    }
}
