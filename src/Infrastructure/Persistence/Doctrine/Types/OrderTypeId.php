<?php

namespace TechChallengeFIAP\Infrastructure\Persistence\Doctrine\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;
use TechChallengeFIAP\Domain\Order\OrderId;

class OrderTypeId extends StringType
{
    const MYTYPE = 'order_id';

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
        return new OrderId($value);
    }
}
