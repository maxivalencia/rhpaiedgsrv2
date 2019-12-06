<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191206114330 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE affectations_personnels ADD unite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE affectations_personnels ADD CONSTRAINT FK_8183605FEC4A74AB FOREIGN KEY (unite_id) REFERENCES unites (id)');
        $this->addSql('CREATE INDEX IDX_8183605FEC4A74AB ON affectations_personnels (unite_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE affectations_personnels DROP FOREIGN KEY FK_8183605FEC4A74AB');
        $this->addSql('DROP INDEX IDX_8183605FEC4A74AB ON affectations_personnels');
        $this->addSql('ALTER TABLE affectations_personnels DROP unite_id');
    }
}
