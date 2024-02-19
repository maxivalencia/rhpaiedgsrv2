<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230821084719 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE communes DROP FOREIGN KEY communes_ibfk_1');
        $this->addSql('ALTER TABLE communes DROP FOREIGN KEY communes_ibfk_2');
        $this->addSql('DROP INDEX idx_type_commune ON communes');
        $this->addSql('CREATE INDEX IDX_5C5EE2A5C54C8C93 ON communes (type_id)');
        $this->addSql('DROP INDEX idx_district ON communes');
        $this->addSql('CREATE INDEX IDX_5C5EE2A5B08FA272 ON communes (district_id)');
        $this->addSql('ALTER TABLE communes ADD CONSTRAINT communes_ibfk_1 FOREIGN KEY (type_id) REFERENCES types_communes (id)');
        $this->addSql('ALTER TABLE communes ADD CONSTRAINT communes_ibfk_2 FOREIGN KEY (district_id) REFERENCES districts (id)');
        $this->addSql('ALTER TABLE fonctions_conjoints CHANGE lieu_travail lieu_travail VARCHAR(128) DEFAULT NULL, CHANGE employeur employeur VARCHAR(255) DEFAULT NULL, CHANGE adresse_employeur adresse_employeur VARCHAR(128) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE communes DROP FOREIGN KEY FK_5C5EE2A5C54C8C93');
        $this->addSql('ALTER TABLE communes DROP FOREIGN KEY FK_5C5EE2A5B08FA272');
        $this->addSql('DROP INDEX idx_5c5ee2a5b08fa272 ON communes');
        $this->addSql('CREATE INDEX IDX_DISTRICT ON communes (district_id)');
        $this->addSql('DROP INDEX idx_5c5ee2a5c54c8c93 ON communes');
        $this->addSql('CREATE INDEX IDX_TYPE_COMMUNE ON communes (type_id)');
        $this->addSql('ALTER TABLE communes ADD CONSTRAINT FK_5C5EE2A5C54C8C93 FOREIGN KEY (type_id) REFERENCES types_communes (id)');
        $this->addSql('ALTER TABLE communes ADD CONSTRAINT FK_5C5EE2A5B08FA272 FOREIGN KEY (district_id) REFERENCES districts (id)');
        $this->addSql('ALTER TABLE fonctions_conjoints CHANGE lieu_travail lieu_travail VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE employeur employeur VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse_employeur adresse_employeur VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
