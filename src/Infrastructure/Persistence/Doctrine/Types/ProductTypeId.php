<?php

namespace TechChallengeFIAP\Infrastructure\Persistence\Doctrine\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;
use TechChallengeFIAP\Domain\Product\ProductId;

class ProductTypeId extends StringType
{
    const MYTYPE = 'product_id';

    public function getName()
    {
        return self::MYTYPE;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new ProductId($value);
    }
}
