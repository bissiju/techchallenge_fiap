<?php

namespace TechChallengeFIAP\Application\Product\Delete;

class DeleteProductRequest
{
    private string $productId;

    public function getProductId(): string
    {
        return $this->productId;
    }

    public function setProductId(string $productId): DeleteProductRequest
    {
        $this->productId = $productId;
        return $this;
    }

}
