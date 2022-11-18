<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221118081219 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE proche (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE decision_reintegration ADD date_reference DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE reintegration ADD radiation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reintegration ADD CONSTRAINT FK_F343482278347508 FOREIGN KEY (radiation_id) REFERENCES radiations_personnels (id)');
        $this->addSql('CREATE INDEX IDX_F343482278347508 ON reintegration (radiation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE proche');
        $this->addSql('ALTER TABLE decision_reintegration DROP date_reference');
        $this->addSql('ALTER TABLE reintegration DROP FOREIGN KEY FK_F343482278347508');
        $this->addSql('DROP INDEX IDX_F343482278347508 ON reintegration');
        $this->addSql('ALTER TABLE reintegration DROP radiation_id');
    }
}
