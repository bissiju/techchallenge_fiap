<?php

namespace TechChallengeFIAP\Application\Order\View;

use DateTime;

class ViewOrderResponse
{
    private array $orders = [];

    public function __construct(array $orders)
    {
        $this->orders = $orders;
    }

    public function getOrders(): array
    {
        return $this->orders;
    }

    public function __toString()
    {
        return json_encode([
            'orders' => $this->orders,
        ]);
    }
}
