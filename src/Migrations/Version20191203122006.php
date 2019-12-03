<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191203122006 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE fonctions_conjoints (id INT AUTO_INCREMENT NOT NULL, type_contrat_id INT DEFAULT NULL, conjoint_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, abbreviation VARCHAR(64) DEFAULT NULL, lieu_travail VARCHAR(128) NOT NULL, employeur VARCHAR(255) NOT NULL, adresse_employeur VARCHAR(128) NOT NULL, est_fonctionnaire TINYINT(1) NOT NULL, INDEX IDX_F5A902C0520D03A (type_contrat_id), INDEX IDX_F5A902C05E8D7836 (conjoint_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fonctions_conjoints ADD CONSTRAINT FK_F5A902C0520D03A FOREIGN KEY (type_contrat_id) REFERENCES types_contrats (id)');
        $this->addSql('ALTER TABLE fonctions_conjoints ADD CONSTRAINT FK_F5A902C05E8D7836 FOREIGN KEY (conjoint_id) REFERENCES conjoints (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE fonctions_conjoints');
    }
}
