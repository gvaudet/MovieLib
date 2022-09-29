<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version20220929092228 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create relations between entities (film, people, job and category)';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE attendees (id INT AUTO_INCREMENT NOT NULL, film_id INT DEFAULT NULL, people_id INT DEFAULT NULL, INDEX IDX_C8C96B25567F5183 (film_id), INDEX IDX_C8C96B253147C936 (people_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film_category (id INT AUTO_INCREMENT NOT NULL, film_id INT DEFAULT NULL, category_id INT DEFAULT NULL, INDEX IDX_A4CBD6A8567F5183 (film_id), INDEX IDX_A4CBD6A812469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE people_jobs (id INT AUTO_INCREMENT NOT NULL, people_id INT DEFAULT NULL, job_id INT DEFAULT NULL, INDEX IDX_AA5AA1753147C936 (people_id), INDEX IDX_AA5AA175BE04EA9 (job_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE attendees ADD CONSTRAINT FK_C8C96B25567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE attendees ADD CONSTRAINT FK_C8C96B253147C936 FOREIGN KEY (people_id) REFERENCES people (id)');
        $this->addSql('ALTER TABLE film_category ADD CONSTRAINT FK_A4CBD6A8567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE film_category ADD CONSTRAINT FK_A4CBD6A812469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE people_jobs ADD CONSTRAINT FK_AA5AA1753147C936 FOREIGN KEY (people_id) REFERENCES people (id)');
        $this->addSql('ALTER TABLE people_jobs ADD CONSTRAINT FK_AA5AA175BE04EA9 FOREIGN KEY (job_id) REFERENCES job (id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE attendees DROP FOREIGN KEY FK_C8C96B25567F5183');
        $this->addSql('ALTER TABLE attendees DROP FOREIGN KEY FK_C8C96B253147C936');
        $this->addSql('ALTER TABLE film_category DROP FOREIGN KEY FK_A4CBD6A8567F5183');
        $this->addSql('ALTER TABLE film_category DROP FOREIGN KEY FK_A4CBD6A812469DE2');
        $this->addSql('ALTER TABLE people_jobs DROP FOREIGN KEY FK_AA5AA1753147C936');
        $this->addSql('ALTER TABLE people_jobs DROP FOREIGN KEY FK_AA5AA175BE04EA9');
        $this->addSql('DROP TABLE attendees');
        $this->addSql('DROP TABLE film_category');
        $this->addSql('DROP TABLE people_jobs');
    }
}
