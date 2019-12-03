<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191203120258 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ex_conjoints (id INT AUTO_INCREMENT NOT NULL, conjoint_id INT NOT NULL, motif_rupture VARCHAR(255) NOT NULL, date_rupture DATE NOT NULL, reference_rupture VARCHAR(128) DEFAULT NULL, date_reference_rupture DATE NOT NULL, adresse_veuve VARCHAR(128) DEFAULT NULL, INDEX IDX_444385BD5E8D7836 (conjoint_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ex_conjoints ADD CONSTRAINT FK_444385BD5E8D7836 FOREIGN KEY (conjoint_id) REFERENCES conjoints (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE ex_conjoints');
    }
}
