<?php

namespace TechChallengeFIAP\Domain\Customer;

interface CustomerRepository
{
    public function create(Customer $customer): Customer;

    public function byId(CustomerId $customerId): ?Customer;

    public function byCpf(string $cpf): ?Customer;
}
