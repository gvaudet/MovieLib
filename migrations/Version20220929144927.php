<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version20220929144927 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Try to change DATETIME in DATE for People and Film';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE film CHANGE release_date release_date DATE NOT NULL');
        $this->addSql('ALTER TABLE people CHANGE birth_date birth_date DATE DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE film CHANGE release_date release_date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE people CHANGE birth_date birth_date DATETIME DEFAULT NULL');
    }
}
