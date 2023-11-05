<?php

namespace TechChallengeFIAP\Application\Customer\Find;

use TechChallengeFIAP\Domain\Customer\Customer;
use TechChallengeFIAP\Domain\Customer\CustomerId;
use TechChallengeFIAP\Domain\Customer\CustomerRepository;
use TechChallengeFIAP\Domain\Customer\Exception\CustomerDoNotExistsException;
use TechChallengeFIAP\Domain\Customer\ValueObject\Cpf;

class FindCustomerService
{
    private CustomerRepository $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function execute(FindCustomerRequest $request)
    {
        $cpf = new Cpf($request->getCustomerCpf());
        $customer = $this->customerRepository->byCpf($cpf->cpf());
        
        if (!$customer) {
            throw new CustomerDoNotExistsException($cpf->cpf());
        }

        return $this->response($customer);
    }

    private function response(Customer $customer): FindCustomerResponse
    {
        return new FindCustomerResponse($customer->id());
    }
}
