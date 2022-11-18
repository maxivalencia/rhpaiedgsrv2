<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221116104140 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reintegration (id INT AUTO_INCREMENT NOT NULL, personnel_id INT NOT NULL, motif_reintegration_id INT DEFAULT NULL, detail_motif_reintegration_id INT DEFAULT NULL, decision_reintegration_id INT DEFAULT NULL, unite_id INT DEFAULT NULL, date_notification DATE DEFAULT NULL, date_reintegration DATE DEFAULT NULL, reference_rc_reintegration VARCHAR(128) DEFAULT NULL, date_rc_reintegration DATE DEFAULT NULL, date_prevu_reintegration DATE DEFAULT NULL, INDEX IDX_F34348221C109075 (personnel_id), INDEX IDX_F34348228AF315 (motif_reintegration_id), INDEX IDX_F3434822163D52FB (detail_motif_reintegration_id), INDEX IDX_F3434822C658430 (decision_reintegration_id), INDEX IDX_F3434822EC4A74AB (unite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reintegration ADD CONSTRAINT FK_F34348221C109075 FOREIGN KEY (personnel_id) REFERENCES personnels (id)');
        $this->addSql('ALTER TABLE reintegration ADD CONSTRAINT FK_F34348228AF315 FOREIGN KEY (motif_reintegration_id) REFERENCES motif_reintegration (id)');
        $this->addSql('ALTER TABLE reintegration ADD CONSTRAINT FK_F3434822163D52FB FOREIGN KEY (detail_motif_reintegration_id) REFERENCES details_motifs_reintegration (id)');
        $this->addSql('ALTER TABLE reintegration ADD CONSTRAINT FK_F3434822C658430 FOREIGN KEY (decision_reintegration_id) REFERENCES decision_reintegration (id)');
        $this->addSql('ALTER TABLE reintegration ADD CONSTRAINT FK_F3434822EC4A74AB FOREIGN KEY (unite_id) REFERENCES unites (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE reintegration');
    }
}
