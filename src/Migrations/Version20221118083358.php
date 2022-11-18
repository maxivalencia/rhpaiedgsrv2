<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221118083358 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE situation_sanitaire ADD personne_concerner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE situation_sanitaire ADD CONSTRAINT FK_F4C2C6E58978E89B FOREIGN KEY (personne_concerner_id) REFERENCES proche (id)');
        $this->addSql('CREATE INDEX IDX_F4C2C6E58978E89B ON situation_sanitaire (personne_concerner_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE situation_sanitaire DROP FOREIGN KEY FK_F4C2C6E58978E89B');
        $this->addSql('DROP INDEX IDX_F4C2C6E58978E89B ON situation_sanitaire');
        $this->addSql('ALTER TABLE situation_sanitaire DROP personne_concerner_id');
    }
}
