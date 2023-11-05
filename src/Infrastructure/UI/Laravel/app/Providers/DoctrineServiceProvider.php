<?php

namespace App\Providers;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
use Illuminate\Support\ServiceProvider;
use TechChallengeFIAP\Domain\Product\ProductRepository;
use TechChallengeFIAP\Domain\Customer\CustomerRepository;
use TechChallengeFIAP\Domain\Order\OrderRepository;
use TechChallengeFIAP\Infrastructure\Persistence\Doctrine\Repository\DoctrineProductRepository;
use TechChallengeFIAP\Infrastructure\Persistence\Doctrine\Repository\DoctrineCustomerRepository;
use TechChallengeFIAP\Infrastructure\Persistence\Doctrine\Repository\DoctrineOrderRepository;

use TechChallengeFIAP\Infrastructure\Persistence\Doctrine\Types\ProductTypeId;
use TechChallengeFIAP\Infrastructure\Persistence\Doctrine\Types\CustomerTypeId;
use TechChallengeFIAP\Infrastructure\Persistence\Doctrine\Types\OrderTypeId;

class DoctrineServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(
            EntityManagerInterface::class,
            fn () => EntityManager::create($this->connection(), $this->config())
        );

        $this->types();

        $this->app->bind(CustomerRepository::class, DoctrineCustomerRepository::class);

        $this->app->bind(ProductRepository::class, DoctrineProductRepository::class);

        $this->app->bind(OrderRepository::class, DoctrineOrderRepository::class);
    }

    private function connection()
    {
        return DriverManager::getConnection(config('database.connections.mysql'));
    }

    private function config()
    {
        return Setup::createXMLMetadataConfiguration(
            [(__DIR__."/../../../../Persistence/Doctrine/Mapping")],
            ('app.env') === 'local'
        );
    }

    private function types()
    {
        if (!Type::hasType(CustomerTypeId::MYTYPE)) {
            Type::addType(CustomerTypeId::MYTYPE, CustomerTypeId::class);
        }

        if (!Type::hasType(ProductTypeId::MYTYPE)) {
            Type::addType(ProductTypeId::MYTYPE, ProductTypeId::class);
        }

        if (!Type::hasType(OrderTypeId::MYTYPE)) {
            Type::addType(OrderTypeId::MYTYPE, OrderTypeId::class);
        }
    }
}
