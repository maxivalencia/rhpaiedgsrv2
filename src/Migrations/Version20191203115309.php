<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191203115309 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE enfants (id INT AUTO_INCREMENT NOT NULL, personnel_id INT DEFAULT NULL, rang INT NOT NULL, nom VARCHAR(128) NOT NULL, prenom VARCHAR(128) DEFAULT NULL, date_naissance DATE NOT NULL, lieu_naissance VARCHAR(128) NOT NULL, sexe TINYINT(1) NOT NULL, qualite VARCHAR(1) NOT NULL, est_decede TINYINT(1) NOT NULL, date_dece DATE DEFAULT NULL, INDEX IDX_23E2BAC31C109075 (personnel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE enfants ADD CONSTRAINT FK_23E2BAC31C109075 FOREIGN KEY (personnel_id) REFERENCES personnels (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE enfants');
    }
}
