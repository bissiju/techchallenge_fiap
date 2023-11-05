<?php

namespace TechChallengeFIAP\Application\Product\View;

use DateTime;

class ViewProductResponse
{
    private array $products = [];

    public function __construct(array $products)
    {
        $this->products = $products;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function __toString()
    {
        return json_encode([
            'products' => $this->products,
        ]);
    }
}
