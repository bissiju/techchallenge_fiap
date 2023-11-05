<?php

declare(strict_types=1);

namespace TechChallengeFIAP\Infrastructure\Persistence\Doctrine\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20200509210331 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create customer table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE customers(id varchar(255) not null PRIMARY KEY, cpf varchar(255) not null, created_at datetime not null)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE customers');
    }
}
