<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221116111048 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE situation_sanitaire (id INT AUTO_INCREMENT NOT NULL, personnel_id INT NOT NULL, type_maladie_id INT DEFAULT NULL, type_traitement_id INT DEFAULT NULL, frequence_traitement_id INT DEFAULT NULL, controleur_periodique_id INT DEFAULT NULL, hopital_medecin_traitant VARCHAR(255) DEFAULT NULL, date_debut_traitement DATE DEFAULT NULL, date_fin_traitement DATE DEFAULT NULL, maladie VARCHAR(255) NOT NULL, lieu_traitement VARCHAR(255) DEFAULT NULL, disponibilite_traitement VARCHAR(255) DEFAULT NULL, adresse_traitant VARCHAR(255) DEFAULT NULL, controle_periodique TINYINT(1) DEFAULT NULL, niveau_danger INT DEFAULT NULL, INDEX IDX_F4C2C6E51C109075 (personnel_id), INDEX IDX_F4C2C6E5A9B215B2 (type_maladie_id), INDEX IDX_F4C2C6E5AD4EF383 (type_traitement_id), INDEX IDX_F4C2C6E5AC506BC0 (frequence_traitement_id), INDEX IDX_F4C2C6E5E6E9AB04 (controleur_periodique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE situation_sanitaire ADD CONSTRAINT FK_F4C2C6E51C109075 FOREIGN KEY (personnel_id) REFERENCES personnels (id)');
        $this->addSql('ALTER TABLE situation_sanitaire ADD CONSTRAINT FK_F4C2C6E5A9B215B2 FOREIGN KEY (type_maladie_id) REFERENCES type_maladie (id)');
        $this->addSql('ALTER TABLE situation_sanitaire ADD CONSTRAINT FK_F4C2C6E5AD4EF383 FOREIGN KEY (type_traitement_id) REFERENCES type_traitement (id)');
        $this->addSql('ALTER TABLE situation_sanitaire ADD CONSTRAINT FK_F4C2C6E5AC506BC0 FOREIGN KEY (frequence_traitement_id) REFERENCES frequence_traitement (id)');
        $this->addSql('ALTER TABLE situation_sanitaire ADD CONSTRAINT FK_F4C2C6E5E6E9AB04 FOREIGN KEY (controleur_periodique_id) REFERENCES suivie_apres_traitement (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE situation_sanitaire');
    }
}
