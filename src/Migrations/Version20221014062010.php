<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221014062010 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recompense (id INT AUTO_INCREMENT NOT NULL, nature_id INT NOT NULL, personnel_id INT NOT NULL, reference VARCHAR(128) DEFAULT NULL, date DATE DEFAULT NULL, libelle VARCHAR(255) NOT NULL, autorite VARCHAR(64) DEFAULT NULL, INDEX IDX_1E9BC0DE3BCB2E4B (nature_id), INDEX IDX_1E9BC0DE1C109075 (personnel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recompense ADD CONSTRAINT FK_1E9BC0DE3BCB2E4B FOREIGN KEY (nature_id) REFERENCES nature (id)');
        $this->addSql('ALTER TABLE recompense ADD CONSTRAINT FK_1E9BC0DE1C109075 FOREIGN KEY (personnel_id) REFERENCES personnels (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE recompense');
    }
}
