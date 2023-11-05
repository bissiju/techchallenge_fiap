<?php

namespace TechChallengeFIAP\Application\Order\Create;

use TechChallengeFIAP\Domain\Customer\CustomerId;
use TechChallengeFIAP\Domain\Customer\CustomerRepository;
use TechChallengeFIAP\Domain\Order\Order;
use TechChallengeFIAP\Domain\Order\OrderId;
use TechChallengeFIAP\Domain\Order\OrderRepository;
use TechChallengeFIAP\Domain\Order\Exception\CustomerNotFoundException;

class CreateOrderService
{
    private CustomerRepository $customerRepository;

    private OrderRepository $repository;

    public function __construct(CustomerRepository $customerRepository, OrderRepository $repository)
    {
        $this->repository = $repository;
        $this->customerRepository = $customerRepository;
    }

    public function execute(CreateOrderRequest $request): CreateOrderResponse
    {
        $cpf = $request->getCpf();
        $customerId = $this->customerRepository->byCpf($cpf);

        if (!$customerId) {
            throw new CustomerNotFoundException($cpf);
        }

        $productsId = $request->getProductsId();

        $order = $this->create($customerId->id(), $productsId);

        return $this->response($order);
    }

    private function create(string $customerId, string $productsId): Order
    {
        $order = new Order(
            new OrderId(),
            $customerId,
            $totalPrice = "100,00",
            $status = "Iniciado",
            $productsId,
            $delivered = false
        );

        return $this->repository->create($order);
    }

    private function response(Order $order): CreateOrderResponse
    {
        return new CreateOrderResponse($order->id());
    }
}
