<?php

namespace TechChallengeFIAP\Infrastructure\Persistence\Doctrine\Repository;

use Doctrine\ORM\EntityManagerInterface;
use TechChallengeFIAP\Domain\Customer\Customer;
use TechChallengeFIAP\Domain\Customer\CustomerId;
use TechChallengeFIAP\Domain\Customer\CustomerRepository;

class DoctrineCustomerRepository extends DoctrineRepository implements CustomerRepository
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, $entityManager->getClassMetadata(Customer::class));
    }

    public function create(Customer $customer): Customer
    {
        $this->store($customer);

        return $customer;
    }

    public function byId(CustomerId $customerId): ?Customer
    {
        return $this->find($customerId->id());
    }

    public function byCpf(string $cpf): ?Customer
    {
        return $this->findOneBy(['cpf' => $cpf]);
    }
}
