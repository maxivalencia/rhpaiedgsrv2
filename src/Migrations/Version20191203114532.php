<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191203114532 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE conjoints (id INT AUTO_INCREMENT NOT NULL, commune_id INT DEFAULT NULL, personnel_id INT DEFAULT NULL, rang INT NOT NULL, nom VARCHAR(128) NOT NULL, prenom VARCHAR(128) DEFAULT NULL, date_naissance DATE NOT NULL, lieu_naissance VARCHAR(255) NOT NULL, nom_pere VARCHAR(255) DEFAULT NULL, nom_mere VARCHAR(255) NOT NULL, sexe TINYINT(1) NOT NULL, date_mariage DATE NOT NULL, numero_cin VARCHAR(12) NOT NULL, date_cin DATE NOT NULL, lieu_cin VARCHAR(128) NOT NULL, reference_autorisation_mariage VARCHAR(128) DEFAULT NULL, date_reference_autorisation_mariage DATE DEFAULT NULL, lieu_mariage VARCHAR(128) NOT NULL, reference_officiel_mariage VARCHAR(128) NOT NULL, date_reference_officiel_mariage DATE NOT NULL, INDEX IDX_65902217131A4F72 (commune_id), INDEX IDX_659022171C109075 (personnel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE conjoints ADD CONSTRAINT FK_65902217131A4F72 FOREIGN KEY (commune_id) REFERENCES communes (id)');
        $this->addSql('ALTER TABLE conjoints ADD CONSTRAINT FK_659022171C109075 FOREIGN KEY (personnel_id) REFERENCES personnels (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE conjoints');
    }
}
