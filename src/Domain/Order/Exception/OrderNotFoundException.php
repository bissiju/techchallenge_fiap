<?php

namespace TechChallengeFIAP\Domain\Order\Exception;

use TechChallengeFIAP\Domain\Order\OrderId;
use TechChallengeFIAP\Domain\Shared\Exception\BaseException;

class OrderNotFoundException extends BaseException
{
    public function __construct(OrderId $orderId)
    {
        parent::__construct("Pedido {$orderId->id()} não encontrado.");
    }
}
