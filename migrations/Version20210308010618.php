<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210308010618 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE experience ADD cv_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C103CFE419E2 FOREIGN KEY (cv_id) REFERENCES cv (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_590C103CFE419E2 ON experience (cv_id)');
        $this->addSql('ALTER TABLE formation ADD cv_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFCFE419E2 FOREIGN KEY (cv_id) REFERENCES cv (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_404021BFCFE419E2 ON formation (cv_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C103CFE419E2');
        $this->addSql('DROP INDEX UNIQ_590C103CFE419E2 ON experience');
        $this->addSql('ALTER TABLE experience DROP cv_id');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFCFE419E2');
        $this->addSql('DROP INDEX UNIQ_404021BFCFE419E2 ON formation');
        $this->addSql('ALTER TABLE formation DROP cv_id');
    }
}
