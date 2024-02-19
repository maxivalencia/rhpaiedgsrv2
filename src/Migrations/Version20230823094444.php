<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230823094444 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE affectations_personnels CHANGE date_affectation date_affectation DATE DEFAULT NULL, CHANGE motif_affectation motif_affectation VARCHAR(255) DEFAULT NULL, CHANGE motif_annulation motif_annulation VARCHAR(128) DEFAULT NULL');
        $this->addSql('ALTER TABLE decisions_affectations CHANGE reference_decision reference_decision VARCHAR(128) DEFAULT NULL, CHANGE date_decision date_decision DATE DEFAULT NULL, CHANGE genre genre VARCHAR(128) DEFAULT NULL');
        $this->addSql('ALTER TABLE decisions_promotions CHANGE reference_decision reference_decision VARCHAR(128) DEFAULT NULL, CHANGE date_decision date_decision DATE DEFAULT NULL, CHANGE genre_decision genre_decision VARCHAR(64) DEFAULT NULL');
        $this->addSql('ALTER TABLE decisions_radiations_controles CHANGE reference_decision reference_decision VARCHAR(128) DEFAULT NULL, CHANGE date_reference date_reference DATE DEFAULT NULL, CHANGE reference_journal_officiel reference_journal_officiel VARCHAR(128) DEFAULT NULL');
        $this->addSql('ALTER TABLE decorations_personnels CHANGE date date DATE DEFAULT NULL, CHANGE reference reference VARCHAR(128) DEFAULT NULL, CHANGE date_reference date_reference DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE details_motifs_radiations_controles CHANGE detail_motif_radiation detail_motif_radiation VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE details_motifs_reintegration CHANGE libelle libelle VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE diplomes_personnels CHANGE numero numero VARCHAR(128) DEFAULT NULL');
        $this->addSql('ALTER TABLE enfants CHANGE rang rang INT DEFAULT NULL, CHANGE nom nom VARCHAR(128) DEFAULT NULL, CHANGE date_naissance date_naissance DATE DEFAULT NULL, CHANGE lieu_naissance lieu_naissance VARCHAR(128) DEFAULT NULL, CHANGE qualite qualite VARCHAR(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE ex_conjoints CHANGE motif_rupture motif_rupture VARCHAR(255) DEFAULT NULL, CHANGE date_rupture date_rupture DATE DEFAULT NULL, CHANGE date_reference_rupture date_reference_rupture DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE fonctions CHANGE libelle libelle VARCHAR(128) DEFAULT NULL, CHANGE abbreviation abbreviation VARCHAR(128) DEFAULT NULL, CHANGE hierarchie hierarchie INT DEFAULT NULL');
        $this->addSql('ALTER TABLE frequence_traitement CHANGE libelle libelle VARCHAR(64) DEFAULT NULL');
        $this->addSql('ALTER TABLE grades CHANGE grade grade VARCHAR(64) DEFAULT NULL, CHANGE abbreviation abbreviation VARCHAR(10) DEFAULT NULL, CHANGE rang rang INT DEFAULT NULL');
        $this->addSql('ALTER TABLE motif_reintegration CHANGE libelle libelle VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE motifs_radiations_controles CHANGE libelle libelle VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE nature CHANGE libelle libelle VARCHAR(255) DEFAULT NULL, CHANGE abreviation abreviation VARCHAR(20) DEFAULT NULL');
        $this->addSql('ALTER TABLE niveau_diplome CHANGE libelle libelle VARCHAR(128) DEFAULT NULL');
        $this->addSql('ALTER TABLE nominations_personnels CHANGE date_nomination date_nomination DATE DEFAULT NULL, CHANGE rang rang INT DEFAULT NULL, CHANGE echelon echelon INT DEFAULT NULL, CHANGE class class INT DEFAULT NULL, CHANGE indice indice INT DEFAULT NULL');
        $this->addSql('ALTER TABLE notes_personnels CHANGE date_note date_note DATE DEFAULT NULL, CHANGE note note VARCHAR(7) DEFAULT NULL, CHANGE appreciation_global appreciation_global VARCHAR(255) DEFAULT NULL, CHANGE reference_note reference_note VARCHAR(128) DEFAULT NULL, CHANGE date_reference date_reference DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE notes_pos CHANGE annee annee DATE DEFAULT NULL, CHANGE qf qf VARCHAR(255) DEFAULT NULL, CHANGE vet vet VARCHAR(255) DEFAULT NULL, CHANGE ags ags VARCHAR(255) DEFAULT NULL, CHANGE niveau niveau VARCHAR(255) DEFAULT NULL, CHANGE potentiel potentiel VARCHAR(255) DEFAULT NULL, CHANGE appreciation_complet appreciation_complet VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE permissions CHANGE annee annee DATE DEFAULT NULL, CHANGE date_depart date_depart DATE DEFAULT NULL, CHANGE date_fin date_fin DATE DEFAULT NULL, CHANGE duree duree INT DEFAULT NULL, CHANGE reliquat reliquat INT DEFAULT NULL, CHANGE type_permission type_permission VARCHAR(128) DEFAULT NULL, CHANGE lieu_jouissance lieu_jouissance VARCHAR(128) DEFAULT NULL');
        $this->addSql('ALTER TABLE personnels CHANGE nom nom VARCHAR(128) DEFAULT NULL, CHANGE date_naissance date_naissance DATE DEFAULT NULL, CHANGE nom_mere nom_mere VARCHAR(255) DEFAULT NULL, CHANGE num_cin num_cin VARCHAR(12) DEFAULT NULL, CHANGE date_cin date_cin DATE DEFAULT NULL, CHANGE lieu_cin lieu_cin VARCHAR(64) DEFAULT NULL, CHANGE adresse adresse VARCHAR(255) DEFAULT NULL, CHANGE date_embauche date_embauche DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE photos CHANGE photo photo VARCHAR(128) DEFAULT NULL');
        $this->addSql('ALTER TABLE proche CHANGE libelle libelle VARCHAR(64) DEFAULT NULL');
        $this->addSql('ALTER TABLE provinces CHANGE province province VARCHAR(24) DEFAULT NULL');
        $this->addSql('ALTER TABLE punitions CHANGE libelle libelle VARCHAR(255) DEFAULT NULL, CHANGE reference reference VARCHAR(128) DEFAULT NULL, CHANGE date_reference date_reference DATE DEFAULT NULL, CHANGE sanction sanction VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE radiations_personnels CHANGE date_notification date_notification DATE DEFAULT NULL, CHANGE lieu_repli lieu_repli VARCHAR(128) DEFAULT NULL, CHANGE date_radiation date_radiation DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE recompense CHANGE libelle libelle VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE regions CHANGE region region VARCHAR(64) DEFAULT NULL');
        $this->addSql('ALTER TABLE situation_sanitaire CHANGE maladie maladie VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE suivie_apres_traitement CHANGE libelle libelle VARCHAR(128) DEFAULT NULL');
        $this->addSql('ALTER TABLE type_maladie CHANGE libelle libelle VARCHAR(64) DEFAULT NULL');
        $this->addSql('ALTER TABLE type_traitement CHANGE libelle libelle VARCHAR(64) DEFAULT NULL');
        $this->addSql('ALTER TABLE types_communes CHANGE type type VARCHAR(24) DEFAULT NULL');
        $this->addSql('ALTER TABLE types_contrats CHANGE type type VARCHAR(64) DEFAULT NULL');
        $this->addSql('ALTER TABLE unites CHANGE libelle libelle VARCHAR(255) DEFAULT NULL, CHANGE abbreviation abbreviation VARCHAR(128) DEFAULT NULL, CHANGE localite localite VARCHAR(128) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE affectations_personnels CHANGE date_affectation date_affectation DATE NOT NULL, CHANGE motif_affectation motif_affectation VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE motif_annulation motif_annulation VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE decisions_affectations CHANGE reference_decision reference_decision VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_decision date_decision DATE NOT NULL, CHANGE genre genre VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE decisions_promotions CHANGE reference_decision reference_decision VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_decision date_decision DATE NOT NULL, CHANGE genre_decision genre_decision VARCHAR(64) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE decisions_radiations_controles CHANGE reference_decision reference_decision VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_reference date_reference DATE NOT NULL, CHANGE reference_journal_officiel reference_journal_officiel VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE decorations_personnels CHANGE date date DATE NOT NULL, CHANGE reference reference VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_reference date_reference DATE NOT NULL');
        $this->addSql('ALTER TABLE details_motifs_radiations_controles CHANGE detail_motif_radiation detail_motif_radiation VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE details_motifs_reintegration CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE diplomes_personnels CHANGE numero numero VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE enfants CHANGE rang rang INT NOT NULL, CHANGE nom nom VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_naissance date_naissance DATE NOT NULL, CHANGE lieu_naissance lieu_naissance VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE qualite qualite VARCHAR(1) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE ex_conjoints CHANGE motif_rupture motif_rupture VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_rupture date_rupture DATE NOT NULL, CHANGE date_reference_rupture date_reference_rupture DATE NOT NULL');
        $this->addSql('ALTER TABLE fonctions CHANGE libelle libelle VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE abbreviation abbreviation VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE hierarchie hierarchie INT NOT NULL');
        $this->addSql('ALTER TABLE frequence_traitement CHANGE libelle libelle VARCHAR(64) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE grades CHANGE grade grade VARCHAR(64) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE abbreviation abbreviation VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE rang rang INT NOT NULL');
        $this->addSql('ALTER TABLE motif_reintegration CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE motifs_radiations_controles CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE nature CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE abreviation abreviation VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE niveau_diplome CHANGE libelle libelle VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE nominations_personnels CHANGE date_nomination date_nomination DATE NOT NULL, CHANGE rang rang INT NOT NULL, CHANGE echelon echelon INT NOT NULL, CHANGE class class INT NOT NULL, CHANGE indice indice INT NOT NULL');
        $this->addSql('ALTER TABLE notes_personnels CHANGE date_note date_note DATE NOT NULL, CHANGE note note VARCHAR(7) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE appreciation_global appreciation_global VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE reference_note reference_note VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_reference date_reference DATE NOT NULL');
        $this->addSql('ALTER TABLE notes_pos CHANGE annee annee DATE NOT NULL, CHANGE qf qf VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE vet vet VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ags ags VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE niveau niveau VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE potentiel potentiel VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE appreciation_complet appreciation_complet VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE permissions CHANGE annee annee DATE NOT NULL, CHANGE date_depart date_depart DATE NOT NULL, CHANGE date_fin date_fin DATE NOT NULL, CHANGE duree duree INT NOT NULL, CHANGE reliquat reliquat INT NOT NULL, CHANGE type_permission type_permission VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lieu_jouissance lieu_jouissance VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE personnels CHANGE nom nom VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_naissance date_naissance DATE NOT NULL, CHANGE nom_mere nom_mere VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE num_cin num_cin VARCHAR(12) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_cin date_cin DATE NOT NULL, CHANGE lieu_cin lieu_cin VARCHAR(64) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse adresse VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_embauche date_embauche DATE NOT NULL');
        $this->addSql('ALTER TABLE photos CHANGE photo photo VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE proche CHANGE libelle libelle VARCHAR(64) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE provinces CHANGE province province VARCHAR(24) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE punitions CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE reference reference VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_reference date_reference DATE NOT NULL, CHANGE sanction sanction VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE radiations_personnels CHANGE date_notification date_notification DATE NOT NULL, CHANGE lieu_repli lieu_repli VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_radiation date_radiation DATE NOT NULL');
        $this->addSql('ALTER TABLE recompense CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE regions CHANGE region region VARCHAR(64) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE situation_sanitaire CHANGE maladie maladie VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE suivie_apres_traitement CHANGE libelle libelle VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE type_maladie CHANGE libelle libelle VARCHAR(64) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE type_traitement CHANGE libelle libelle VARCHAR(64) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE types_communes CHANGE type type VARCHAR(24) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE types_contrats CHANGE type type VARCHAR(64) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE unites CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE abbreviation abbreviation VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE localite localite VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
