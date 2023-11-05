<?php

namespace TechChallengeFIAP\Application\Order\View;

use TechChallengeFIAP\Domain\Customer\CustomerId;
use TechChallengeFIAP\Domain\Order\Order;
use TechChallengeFIAP\Domain\Order\OrderRepository;
use Tightenco\Collect\Support\Collection;

class ViewOrderService
{
    private OrderRepository $repository;

    public function __construct(
        OrderRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function execute(ViewOrderRequest $request): ViewOrderResponse
    {
        $orders = $this->repository->byDate($request->getCreatedDate());

        $ordersId = $orders
            ->map(fn ($orders) => [
            'id' => $orders->id(),
            'customer_id' => $orders->customerId(),
            'totalPrice' => $orders->totalPrice(),
            'products_id' => $orders->productsId(),
            'status' => $orders->status()
        ])->toArray();

        return $this->response($ordersId);
    }

    private function response(array $orders): ViewOrderResponse
    {
        return new ViewOrderResponse($orders);
    }
}
    