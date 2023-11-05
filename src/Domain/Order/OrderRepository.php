<?php

namespace TechChallengeFIAP\Domain\Order;

use TechChallengeFIAP\Domain\Customer\CustomerId;
use Tightenco\Collect\Support\Collection;

interface OrderRepository
{
    public function create(Order $order): Order;

    public function byCustomer(CustomerId $customerId): Collection;

    public function byDate(\DateTime $date): Collection;

    public function save(Order $order);
}
