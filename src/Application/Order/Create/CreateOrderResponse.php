<?php

namespace TechChallengeFIAP\Application\Order\Create;

use TechChallengeFIAP\Domain\Order\OrderId;

class CreateOrderResponse
{
    private OrderId $orderId;

    public function __construct(OrderId $orderId)
    {
        $this->orderId = $orderId;
    }

    public function id(): OrderId
    {
        return $this->orderId;
    }

    public function __toString()
    {
        return json_encode(['id' => $this->orderId->id()]);
    }
}
