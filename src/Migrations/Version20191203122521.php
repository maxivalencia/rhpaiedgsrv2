<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191203122521 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE decorations_personnels (id INT AUTO_INCREMENT NOT NULL, personnel_id INT DEFAULT NULL, decoration_id INT DEFAULT NULL, date DATE NOT NULL, reference VARCHAR(128) NOT NULL, date_reference DATE NOT NULL, INDEX IDX_F88E70D31C109075 (personnel_id), INDEX IDX_F88E70D33446DFC4 (decoration_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE decorations_personnels ADD CONSTRAINT FK_F88E70D31C109075 FOREIGN KEY (personnel_id) REFERENCES personnels (id)');
        $this->addSql('ALTER TABLE decorations_personnels ADD CONSTRAINT FK_F88E70D33446DFC4 FOREIGN KEY (decoration_id) REFERENCES decorations (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE decorations_personnels');
    }
}
