<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210308025858 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455216158D2');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C103CFE419E2');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFCFE419E2');
        $this->addSql('DROP TABLE cv');
        $this->addSql('DROP INDEX UNIQ_C7440455216158D2 ON client');
        $this->addSql('ALTER TABLE client DROP id_cv_id');
        $this->addSql('DROP INDEX UNIQ_590C103CFE419E2 ON experience');
        $this->addSql('ALTER TABLE experience DROP cv_id');
        $this->addSql('DROP INDEX UNIQ_404021BFCFE419E2 ON formation');
        $this->addSql('ALTER TABLE formation DROP cv_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cv (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, titre VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_B66FFE9219EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE cv ADD CONSTRAINT FK_B66FFE9219EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE client ADD id_cv_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455216158D2 FOREIGN KEY (id_cv_id) REFERENCES cv (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7440455216158D2 ON client (id_cv_id)');
        $this->addSql('ALTER TABLE experience ADD cv_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C103CFE419E2 FOREIGN KEY (cv_id) REFERENCES cv (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_590C103CFE419E2 ON experience (cv_id)');
        $this->addSql('ALTER TABLE formation ADD cv_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFCFE419E2 FOREIGN KEY (cv_id) REFERENCES cv (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_404021BFCFE419E2 ON formation (cv_id)');
    }
}
