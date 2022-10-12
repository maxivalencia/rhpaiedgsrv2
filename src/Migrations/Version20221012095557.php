<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221012095557 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personnels ADD grade_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE personnels ADD CONSTRAINT FK_7AC38C2BFE19A1A8 FOREIGN KEY (grade_id) REFERENCES grades (id)');
        $this->addSql('CREATE INDEX IDX_7AC38C2BFE19A1A8 ON personnels (grade_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personnels DROP FOREIGN KEY FK_7AC38C2BFE19A1A8');
        $this->addSql('DROP INDEX IDX_7AC38C2BFE19A1A8 ON personnels');
        $this->addSql('ALTER TABLE personnels DROP grade_id');
    }
}
