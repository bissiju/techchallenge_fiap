<?php

declare(strict_types=1);

namespace TechChallengeFIAP\Infrastructure\Persistence\Doctrine\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20200512014840 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Create orders table';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('CREATE TABLE orders(id varchar(255) primary key, customer_id varchar(255) not null, products_id varchar(255) not null, status varchar(255), totalPrice varchar(225), created_at datetime, delivered boolean)');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP TABLE orders');
    }
}
