<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210119073656 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE migration_versions');
        $this->addSql('ALTER TABLE conjoints CHANGE date_naissance date_naissance DATE DEFAULT NULL, CHANGE lieu_naissance lieu_naissance VARCHAR(255) DEFAULT NULL, CHANGE nom_mere nom_mere VARCHAR(255) DEFAULT NULL, CHANGE date_mariage date_mariage DATE DEFAULT NULL, CHANGE numero_cin numero_cin VARCHAR(12) DEFAULT NULL, CHANGE date_cin date_cin DATE DEFAULT NULL, CHANGE lieu_cin lieu_cin VARCHAR(128) DEFAULT NULL, CHANGE lieu_mariage lieu_mariage VARCHAR(128) DEFAULT NULL, CHANGE reference_officiel_mariage reference_officiel_mariage VARCHAR(128) DEFAULT NULL, CHANGE date_reference_officiel_mariage date_reference_officiel_mariage DATE DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE migration_versions (version VARCHAR(14) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, executed_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(version)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE conjoints CHANGE date_naissance date_naissance DATE NOT NULL, CHANGE lieu_naissance lieu_naissance VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom_mere nom_mere VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_mariage date_mariage DATE NOT NULL, CHANGE numero_cin numero_cin VARCHAR(12) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_cin date_cin DATE NOT NULL, CHANGE lieu_cin lieu_cin VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lieu_mariage lieu_mariage VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE reference_officiel_mariage reference_officiel_mariage VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_reference_officiel_mariage date_reference_officiel_mariage DATE NOT NULL');
    }
}
