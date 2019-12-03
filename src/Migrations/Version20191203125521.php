<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191203125521 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE affectations_personnels (id INT AUTO_INCREMENT NOT NULL, annulation_id INT DEFAULT NULL, fonction_id INT DEFAULT NULL, personnel_id INT DEFAULT NULL, decision_affectation_id INT DEFAULT NULL, date_affectation DATE NOT NULL, date_disponibilite DATE DEFAULT NULL, reference_disponibilite VARCHAR(128) DEFAULT NULL, date_reference_disponibilite DATE DEFAULT NULL, motif_affectation VARCHAR(255) NOT NULL, situation VARCHAR(4) DEFAULT NULL, motif_annulation VARCHAR(128) NOT NULL, INDEX IDX_8183605FC7E10D1C (annulation_id), INDEX IDX_8183605F57889920 (fonction_id), INDEX IDX_8183605F1C109075 (personnel_id), INDEX IDX_8183605FBD502D07 (decision_affectation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE affectations_personnels ADD CONSTRAINT FK_8183605FC7E10D1C FOREIGN KEY (annulation_id) REFERENCES decisions_affectations (id)');
        $this->addSql('ALTER TABLE affectations_personnels ADD CONSTRAINT FK_8183605F57889920 FOREIGN KEY (fonction_id) REFERENCES fonctions (id)');
        $this->addSql('ALTER TABLE affectations_personnels ADD CONSTRAINT FK_8183605F1C109075 FOREIGN KEY (personnel_id) REFERENCES personnels (id)');
        $this->addSql('ALTER TABLE affectations_personnels ADD CONSTRAINT FK_8183605FBD502D07 FOREIGN KEY (decision_affectation_id) REFERENCES decisions_affectations (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE affectations_personnels');
    }
}
