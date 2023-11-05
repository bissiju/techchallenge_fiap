<?php

declare(strict_types=1);

namespace TechChallengeFIAP\Infrastructure\Persistence\Doctrine\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20200511132017 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Create products table';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('CREATE TABLE products (id varchar(255) PRIMARY KEY, name varchar(255) not null, price decimal(4,2), category varchar(255) not null, description varchar(255), images varchar(255), created_at datetime)');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP TABLE products');
    }
}
