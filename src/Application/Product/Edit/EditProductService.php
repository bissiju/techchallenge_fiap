<?php

namespace TechChallengeFIAP\Application\Product\Edit;

use TechChallengeFIAP\Domain\Product\Exception\ProductNotFoundException;
use TechChallengeFIAP\Domain\Product\Product;
use TechChallengeFIAP\Domain\Product\ProductId;
use TechChallengeFIAP\Domain\Product\ProductRepository;
use TechChallengeFIAP\Domain\Product\Exception\NameAlreadyExistsException;

class EditProductService
{
    private ProductRepository $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(EditProductRequest $request)
    {
        $product = $this->findProduct($request->getProductId());

        $name = $request->getName();
        $this->checkIfNameExists($name);

        $description = $request->getDescription();
        $price = $request->getPrice();
        $images = $request->getImages();
        $category = $request->getCategory();

        $product->editProduct($name, $description, $category, $images, $price);

        $this->repository->save($product);
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

    private function checkIfNameExists(string $name): void
    {
        if ($this->repository->byName($name)) {
            throw new NameAlreadyExistsException($name);
        }
    }
}
