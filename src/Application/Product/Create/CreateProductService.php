<?php

namespace TechChallengeFIAP\Application\Product\Create;

use TechChallengeFIAP\Domain\Product\Product;
use TechChallengeFIAP\Domain\Product\ProductId;
use TechChallengeFIAP\Domain\Product\ProductRepository;
use TechChallengeFIAP\Domain\Product\Exception\NameAlreadyExistsException;

class CreateProductService
{
    private ProductRepository $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(CreateProductRequest $request): CreateProductResponse
    {
        $name = $request->getName();
        $description = $request->getDescription();
        $price = $request->getPrice();
        $images = $request->getImages();
        $category = $request->getCategory();

        $this->checkIfNameExists($name);
        $product = $this->create($name, $description, $images, $category, $price);

        return $this->response($product);
    }

    private function create(string $name, string $description, string $images, string $category, float $price): Product
    {
        $product = new Product(
            new ProductId(),
            $name,
            $description,
            $category,
            $images,
            $price
        );

        return $this->repository->create($product);
    }

    private function checkIfNameExists(string $name): void
    {
        if ($this->repository->byName($name)) {
            throw new NameAlreadyExistsException($name);
        }
    }

    private function response(Product $product): CreateProductResponse
    {
        return new CreateProductResponse($product->id());
    }
}
