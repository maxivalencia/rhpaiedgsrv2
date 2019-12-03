<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191203110829 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE diplomes (id INT AUTO_INCREMENT NOT NULL, domaine_id INT NOT NULL, niveau_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, abbreviation VARCHAR(128) NOT NULL, type VARCHAR(128) NOT NULL, est_diplome_militaire TINYINT(1) NOT NULL, INDEX IDX_8A81EFD14272FC9F (domaine_id), INDEX IDX_8A81EFD1B3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE diplomes ADD CONSTRAINT FK_8A81EFD14272FC9F FOREIGN KEY (domaine_id) REFERENCES domaine_diplome (id)');
        $this->addSql('ALTER TABLE diplomes ADD CONSTRAINT FK_8A81EFD1B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau_diplome (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE diplomes');
    }
}
