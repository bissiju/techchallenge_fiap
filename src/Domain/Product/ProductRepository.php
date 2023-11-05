<?php

namespace TechChallengeFIAP\Domain\Product;

use TechChallengeFIAP\Domain\Product\ProductId;
use Tightenco\Collect\Support\Collection;

interface ProductRepository
{
    public function create(Product $product): Product;

    public function byId(ProductId $productId): ?Product;

    public function byName(string $name): ?Product;

    public function byCategory(string $category): Collection;

    public function save(Product $product);

    public function delete(Product $product);
}
