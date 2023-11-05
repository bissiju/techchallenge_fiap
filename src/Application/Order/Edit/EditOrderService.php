<?php

namespace TechChallengeFIAP\Application\Order\Edit;

use TechChallengeFIAP\Domain\Customer\CustomerId;
use TechChallengeFIAP\Domain\Order\Exception\OrderNotFoundException;
use TechChallengeFIAP\Domain\Order\Order;
use TechChallengeFIAP\Domain\Order\OrderId;
use TechChallengeFIAP\Domain\Order\OrderRepository;

class EditOrderService
{
    private OrderRepository $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(EditOrderRequest $request)
    {
        $order = $this->findOrder($request);

        $order->markAsDelivered();

        $this->repository->save($order);
    }

    private function findOrder(EditOrderRequest $request): Order
    {
        $orders = $this->repository->byCustomer(new CustomerId($request->getCustomerId()));

        $lookingForOrderId = new OrderId($request->getOrderId());

        $order = $orders->first(fn (Order $order) => $order->id()->equals($lookingForOrderId));

        if (is_null($order)) {
            throw new OrderNotFoundException($lookingForOrderId);
        }

        return $order;
    }
}
