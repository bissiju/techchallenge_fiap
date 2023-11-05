<?php

namespace TechChallengeFIAP\Domain\Order\Exception;

use TechChallengeFIAP\Domain\Order\OrderId;
use TechChallengeFIAP\Domain\Shared\Exception\BaseException;

class OrderOpenedCannotBePaidException extends BaseException
{
    public function __construct(OrderId $orderId)
    {
        parent::__construct("Pedido {$orderId->id()} em andamento, não pode ser finalizado.");
    }
}
