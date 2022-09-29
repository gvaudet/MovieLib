<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20220929103227 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add description filed to film and biography fiel to people';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE film ADD description LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE people ADD biography LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE film DROP description');
        $this->addSql('ALTER TABLE people DROP biography');
    }
}
