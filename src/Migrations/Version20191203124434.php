<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191203124434 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE unites (id INT AUTO_INCREMENT NOT NULL, commune_id INT NOT NULL, unite_superieur_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, abbreviation VARCHAR(128) NOT NULL, localite VARCHAR(128) NOT NULL, email VARCHAR(128) DEFAULT NULL, phone VARCHAR(10) DEFAULT NULL, INDEX IDX_87F339C131A4F72 (commune_id), INDEX IDX_87F339CCBAC5C92 (unite_superieur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE unites ADD CONSTRAINT FK_87F339C131A4F72 FOREIGN KEY (commune_id) REFERENCES communes (id)');
        $this->addSql('ALTER TABLE unites ADD CONSTRAINT FK_87F339CCBAC5C92 FOREIGN KEY (unite_superieur_id) REFERENCES unites (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE unites DROP FOREIGN KEY FK_87F339CCBAC5C92');
        $this->addSql('DROP TABLE unites');
    }
}
