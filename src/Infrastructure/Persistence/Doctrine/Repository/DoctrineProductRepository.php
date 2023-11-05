<?php

namespace TechChallengeFIAP\Infrastructure\Persistence\Doctrine\Repository;

use Doctrine\ORM\EntityManagerInterface;
use TechChallengeFIAP\Domain\Product\Product;
use TechChallengeFIAP\Domain\Product\ProductId;
use TechChallengeFIAP\Domain\Product\ProductRepository;
use Tightenco\Collect\Support\Collection;

class DoctrineProductRepository extends DoctrineRepository implements ProductRepository
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, $entityManager->getClassMetadata(Product::class));
    }

    public function create(Product $product): Product
    {
        $this->store($product);

        return $product;
    }

    public function byId(ProductId $productId): ?Product
    {
        return $this->find($productId->id());
    }

    public function byName(string $name): ?Product
    {
        return $this->findOneBy(['name' => $name]);
    }

    public function byCategory(string $category): Collection
    {
        return new Collection($this->findBy(['category' => $category]));
    }

    public function save(Product $product)
    {
        $em = $this->getEntityManager();

        $em->flush($product);
    }

    public function delete(Product $product)
    {
        $em = $this->getEntityManager();

        $em->remove($product);

        $em->flush();
    }
}
