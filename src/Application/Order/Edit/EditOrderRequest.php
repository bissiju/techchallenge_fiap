<?php

namespace TechChallengeFIAP\Application\Order\Edit;

class EditOrderRequest
{
    private string $customerId;

    private OrderId $orderId;

    public function getCustomerId(): string
    {
        return $this->customerId;
    }

    public function setCustomerId(string $customerId): EditOrderRequest
    {
        $this->customerId = $customerId;
        return $this;
    }

    public function getOrderId(): OrderId
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId): EditOrderRequest
    {
        $this->orderId = $orderId;
        return $this;
    }
}
