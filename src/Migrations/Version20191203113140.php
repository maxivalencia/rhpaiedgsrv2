<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191203113140 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE diplomes_personnels (id INT AUTO_INCREMENT NOT NULL, diplome_id INT NOT NULL, personnel_id INT NOT NULL, numero VARCHAR(128) NOT NULL, date DATE NOT NULL, INDEX IDX_A26590CA26F859E2 (diplome_id), INDEX IDX_A26590CA1C109075 (personnel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE diplomes_personnels ADD CONSTRAINT FK_A26590CA26F859E2 FOREIGN KEY (diplome_id) REFERENCES diplomes (id)');
        $this->addSql('ALTER TABLE diplomes_personnels ADD CONSTRAINT FK_A26590CA1C109075 FOREIGN KEY (personnel_id) REFERENCES personnels (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE diplomes_personnels');
    }
}
