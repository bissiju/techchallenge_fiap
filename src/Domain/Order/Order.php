<?php

namespace TechChallengeFIAP\Domain\Order;

use Carbon\Carbon;
use DateTime;
use TechChallengeFIAP\Domain\Customer\CustomerId;
use TechChallengeFIAP\Domain\Customer\ValueObject\Cpf;

class Order
{
    private OrderId $orderId;

    private string $customerId;

    private string $totalPrice;

    private DateTime $createdAt;

    private string $status;

    private string $productsId;

    private bool $delivered;

    public function __construct(
        OrderId $orderId,
        string $customerId,
        string $totalPrice,
        string $status,
        string $productsId,
        bool $delivered = false,
        DateTime $createdAt = null
    ) {
        $this->orderId = $orderId;
        $this->customerId = $customerId;
        $this->createdAt = $createdAt ?? new DateTime();
        $this->totalPrice = $totalPrice;
        $this->status = $status;
        $this->productsId = $productsId;
        $this->delivered = $delivered;
    }

    public function id(): OrderId
    {
        return $this->orderId;
    }

    public function customerId(): string
    {
        return $this->customerId;
    }

    public function productsId(): string
    {
        return $this->productsId;
    }

    public function status(): string
    {

        if ($this->isDelivered()) {
            return 'finalized';
        }

        return 'received';
    }

    public function isDelivered(): bool
    {
        return $this->delivered;
    }

    public function createdAt(): DateTime
    {
        return $this->createdAt;
    }

    public function totalPrice(): string
    {
        return $this->totalPrice;
    }
}
