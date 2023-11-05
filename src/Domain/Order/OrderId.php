<?php

namespace TechChallengeFIAP\Domain\Order;

use TechChallengeFIAP\Domain\Shared\Uuid;

class OrderId extends Uuid
{
    public function equals(OrderId $orderId): bool
    {
        return $this->id === $orderId->id();
    }
}
