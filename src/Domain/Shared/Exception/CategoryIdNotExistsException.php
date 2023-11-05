<?php

namespace TechChallengeFIAP\Domain\Shared\Exception;

use TechChallengeFIAP\Domain\Product\ProductId;

class ProductIdNotExistsException extends BaseException
{
    public function __construct(ProductId $productId)
    {
        parent::__construct("A Categoria {$productId->id()} não existe.");
    }
}
