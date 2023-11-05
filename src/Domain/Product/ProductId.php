<?php

namespace TechChallengeFIAP\Domain\Product;

use TechChallengeFIAP\Domain\Shared\Uuid;

class ProductId extends Uuid
{
    public function equals(ProductId $productId): bool
    {
        return $this->id === $productId->id;
    }
}
