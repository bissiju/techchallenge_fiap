<?php

namespace TechChallengeFIAP\Application\Customer\Create;

use TechChallengeFIAP\Domain\Customer\Customer;
use TechChallengeFIAP\Domain\Customer\CustomerRepository;
use TechChallengeFIAP\Domain\Customer\CustomerId;
use TechChallengeFIAP\Domain\Customer\Exception\CpfAlreadyExistsException;
use TechChallengeFIAP\Domain\Customer\ValueObject\Cpf;
use TechChallengeFIAP\Domain\Customer\ValueObject\Name;

class CreateCustomerService
{
    private CustomerRepository $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(CreateCustomerRequest $request): CreateCustomerResponse
    {
        $cpf = new Cpf($request->getCpf());
        $name = new Name($request->getName());

        $this->checkIfcpfExists($cpf);

        $customer = $this->create($cpf, $name);

        return $this->response($customer);
    }

    private function checkIfcpfExists(Cpf $cpf): void
    {
        if ($this->repository->byCpf($cpf->cpf())) {
            throw new CpfAlreadyExistsException($cpf->cpf());
        }
    }

    private function create(Cpf $cpf, Name $name): Customer
    {
        $customer = new Customer(
            new CustomerId(),
            $cpf->cpf(),
            $name->name()
        );

        return $this->repository->create($customer);
    }

    private function response(Customer $customer): CreateCustomerResponse
    {
        return new CreateCustomerResponse($customer->id());
    }
}
