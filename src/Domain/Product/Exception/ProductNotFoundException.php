<?php

namespace TechChallengeFIAP\Domain\Product\Exception;

use TechChallengeFIAP\Domain\Product\ProductId;
use TechChallengeFIAP\Domain\Shared\Exception\BaseException;

class ProductNotFoundException extends BaseException
{
    public function __construct(ProductId $productId)
    {
        parent::__construct("Produto {$productId->id()} não encontrado.");
    }
}
