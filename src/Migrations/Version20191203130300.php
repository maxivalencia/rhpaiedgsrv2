<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191203130300 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE radiations_personnels (id INT AUTO_INCREMENT NOT NULL, personnel_id INT NOT NULL, motif_radiation_id INT DEFAULT NULL, detail_motif_radiation_id INT DEFAULT NULL, decision_radiation_id INT DEFAULT NULL, droit_pension_id INT DEFAULT NULL, date_notification DATE NOT NULL, lieu_repli VARCHAR(128) NOT NULL, date_radiation DATE NOT NULL, date_prevu_radiation DATE DEFAULT NULL, reference_mrc_radiation VARCHAR(128) DEFAULT NULL, date_mrc_radiation DATE DEFAULT NULL, INDEX IDX_9E9D70DE1C109075 (personnel_id), INDEX IDX_9E9D70DEA0039483 (motif_radiation_id), INDEX IDX_9E9D70DE855EBC40 (detail_motif_radiation_id), INDEX IDX_9E9D70DE4CB75E69 (decision_radiation_id), INDEX IDX_9E9D70DEBE088238 (droit_pension_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE radiations_personnels ADD CONSTRAINT FK_9E9D70DE1C109075 FOREIGN KEY (personnel_id) REFERENCES personnels (id)');
        $this->addSql('ALTER TABLE radiations_personnels ADD CONSTRAINT FK_9E9D70DEA0039483 FOREIGN KEY (motif_radiation_id) REFERENCES motifs_radiations_controles (id)');
        $this->addSql('ALTER TABLE radiations_personnels ADD CONSTRAINT FK_9E9D70DE855EBC40 FOREIGN KEY (detail_motif_radiation_id) REFERENCES details_motifs_radiations_controles (id)');
        $this->addSql('ALTER TABLE radiations_personnels ADD CONSTRAINT FK_9E9D70DE4CB75E69 FOREIGN KEY (decision_radiation_id) REFERENCES decisions_radiations_controles (id)');
        $this->addSql('ALTER TABLE radiations_personnels ADD CONSTRAINT FK_9E9D70DEBE088238 FOREIGN KEY (droit_pension_id) REFERENCES droits_pensions (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE radiations_personnels');
    }
}
