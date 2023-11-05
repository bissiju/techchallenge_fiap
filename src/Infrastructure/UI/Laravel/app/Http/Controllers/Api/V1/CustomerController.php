<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CustomerRequest;
use App\Http\Requests\Customer\FindRequest;
use Illuminate\Support\Facades\Hash;
use TechChallengeFIAP\Application\Customer\Create\CreateCustomerRequest;
use TechChallengeFIAP\Application\Customer\Create\CreateCustomerService;
use TechChallengeFIAP\Application\Customer\Find\FindCustomerRequest;
use TechChallengeFIAP\Application\Customer\Find\FindCustomerService;
use TechChallengeFIAP\Domain\Shared\Exception\BaseException;

class CustomerController extends Controller
{
    private CreateCustomerService $service;

    private FindCustomerService $findCustomerService;

    public function __construct(CreateCustomerService $service, FindCustomerService $findCustomerService)
    {
        $this->service = $service;
        $this->findCustomerService = $findCustomerService;
    }

    public function store(CustomerRequest $request)
    {
        try {
            $applicationRequest = (new CreateCustomerRequest())
                ->setCpf($request->get('cpf'))
                ->setName($request->get('name'));

            $response = $this->service->execute($applicationRequest);

            return $this->response->created(null, $response);
        } catch (BaseException $e) {
            $this->response->errorBadRequest($e->getMessage());
        }
    }

    public function find(FindRequest $request)
    {
        try {
            $request = (new FindCustomerRequest())
                ->setCustomerCpf($request->get('cpf'));

            $response = $this->findCustomerService->execute($request);

            return $this->response->created(null, $response);
        } catch (BaseException $e) {
            $this->response->errorBadRequest($e->getMessage());
        }
    }
}
