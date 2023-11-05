<?php

namespace TechChallengeFIAP\Application\Product\Create;

use TechChallengeFIAP\Domain\Product\ProductId;

class CreateProductResponse
{
    private ProductId $productId;

    public function __construct(ProductId $productId)
    {
        $this->productId = $productId;
    }

    public function __toString()
    {
        return json_encode(['id' => $this->productId->id()]);
    }
}
