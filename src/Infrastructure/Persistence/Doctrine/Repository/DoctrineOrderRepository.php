<?php

namespace TechChallengeFIAP\Infrastructure\Persistence\Doctrine\Repository;

use Doctrine\ORM\EntityManagerInterface;
use TechChallengeFIAP\Domain\Customer\CustomerId;
use TechChallengeFIAP\Domain\Order\Order;
use TechChallengeFIAP\Domain\Order\OrderRepository;
use Tightenco\Collect\Support\Collection;

class DoctrineOrderRepository extends DoctrineRepository implements OrderRepository
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, $entityManager->getClassMetadata(Order::class));
    }

    public function create(Order $order): Order
    {
        $this->store($order);

        return $order;
    }

    public function byCustomer(CustomerId $customerId): Collection
    {
        return new Collection($this->createQueryBuilder('i')
            ->where('i.customerId = :customerId')
            ->setParameters([
                'customerId' => $customerId
            ])
            ->getQuery()
            ->getResult());
    }

    public function byDate(\Datetime $date): Collection
    {
        $from = new \DateTime($date->format("Y-m-d")." 00:00:00");
        $to   = new \DateTime($date->format("Y-m-d")." 23:59:59");

        return new Collection($this->createQueryBuilder("i")
            ->where('i.createdAt BETWEEN :from AND :to')
            ->setParameter('from', $from )
            ->setParameter('to', $to)
            ->getQuery()
            ->getResult());
    }

    public function save(Order $order)
    {
        $em = $this->getEntityManager();

        $em->flush($order);
    }
}
