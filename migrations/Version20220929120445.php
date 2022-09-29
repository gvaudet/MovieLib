<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version20220929120445 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add duration field to Film Entity ';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE film ADD duration TIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE film DROP duration');
    }
}
