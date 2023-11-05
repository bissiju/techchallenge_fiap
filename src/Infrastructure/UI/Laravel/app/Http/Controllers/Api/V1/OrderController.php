<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderRequest;
use TechChallengeFIAP\Application\Order\Create\CreateOrderRequest;
use TechChallengeFIAP\Application\Order\Create\CreateOrderService;
use TechChallengeFIAP\Application\Order\View\ViewOrderRequest;
use TechChallengeFIAP\Application\Order\View\ViewOrderService;
use TechChallengeFIAP\Application\Order\Edit\EditOrderRequest;
use TechChallengeFIAP\Application\Order\Edit\EditOrderService;
use TechChallengeFIAP\Domain\Shared\Exception\BaseException;
use DateTime;

class OrderController extends Controller
{
    private CreateOrderService $service;

    private EditOrderService $serviceEditOrder;

    private ViewOrderService $viewOrderService;

    public function __construct(CreateOrderService $service, ViewOrderService $viewOrderService, EditOrderService $serviceEditOrder)
    {
        $this->service = $service;
        $this->serviceEditOrder = $serviceEditOrder;
        $this->viewOrderService = $viewOrderService;
    }

    public function store(OrderRequest $request)
    {
        try {
            $applicationRequest = (new CreateOrderRequest())
                ->setCpf($request->get('cpf'))
                ->setProductsId($request->get('productsId'));

            $response = $this->service->execute($applicationRequest);

            return $this->response->created(null, $response);
        } catch (BaseException $e) {
            $this->response->errorBadRequest($e->getMessage());
        }
    }

    public function view(ViewOrderRequest $request)
    {
        $now = new \DateTime();
        $request = (new ViewOrderRequest())
            ->setCreatedDate($now);

        $response = $this->viewOrderService->execute($request);

        return $this->response->created(null, $response);
    }

    public function delivery($orderId)
    {
        try {
            $request = (new EditOrderRequest())
                ->setCustomerId(auth()->user()->id())
                ->setOrderId($orderId);

            $this->serviceEditOrder->execute($request);

            return $this->response->noContent();
        } catch (BaseException $exception) {
            $this->response->errorBadRequest($exception->getMessage());
        }
    }
}
