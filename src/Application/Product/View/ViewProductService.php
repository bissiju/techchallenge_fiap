<?php

namespace TechChallengeFIAP\Application\Product\View;

use TechChallengeFIAP\Domain\Product\Product;
use TechChallengeFIAP\Domain\Product\ProductRepository;
use Tightenco\Collect\Support\Collection;

class ViewProductService
{
    private ProductRepository $repository;

    public function __construct(
        ProductRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function execute(ViewProductRequest $request): ViewProductResponse
    {
        $products = $this->repository->byCategory($request->getCategory());

        $products = $products
            ->map(fn ($product) => [
            'id' => $product->id(),
            'name' => $product->name(),
            'description' => $product->description(),
            'price' => $product->price(),
            'image' => $product->images(),
        ])->toArray();

        return $this->response($products);
    }

    private function response(array $products): ViewProductResponse
    {
        return new ViewProductResponse($products);
    }
}
    