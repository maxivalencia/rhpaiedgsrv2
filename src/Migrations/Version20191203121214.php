<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191203121214 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE notes_pos (id INT AUTO_INCREMENT NOT NULL, personnels_id INT DEFAULT NULL, annee DATE NOT NULL, qf VARCHAR(255) NOT NULL, vet VARCHAR(255) NOT NULL, ags VARCHAR(255) NOT NULL, niveau VARCHAR(255) NOT NULL, potentiel VARCHAR(255) NOT NULL, appreciation_complet VARCHAR(255) NOT NULL, personnel VARCHAR(255) DEFAULT NULL, INDEX IDX_69F92C0BC7022806 (personnels_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE notes_pos ADD CONSTRAINT FK_69F92C0BC7022806 FOREIGN KEY (personnels_id) REFERENCES personnels (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE notes_pos');
    }
}
