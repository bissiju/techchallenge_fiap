<?php

namespace TechChallengeFIAP\Application\Product\Delete;

use TechChallengeFIAP\Domain\Product\Exception\ProductNotFoundException;
use TechChallengeFIAP\Domain\Product\Product;
use TechChallengeFIAP\Domain\Product\ProductId;
use TechChallengeFIAP\Domain\Product\ProductRepository;

class DeleteProductService
{
    private ProductRepository $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(DeleteProductRequest $request)
    {
        $product = $this->findProduct($request->getProductId());

        $this->repository->delete($product);
    }

    private function findProduct($productId): Product
    {
        $lookingForProductId = new ProductId($productId);

        $product = $this->repository->byId($lookingForProductId);

        if (is_null($product)) {
            throw new ProductNotFoundException($lookingForProductId);
        }

        return $product;
    }
}
