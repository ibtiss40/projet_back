<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210307222555 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ADD id_cv_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455216158D2 FOREIGN KEY (id_cv_id) REFERENCES cv (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7440455216158D2 ON client (id_cv_id)');
        $this->addSql('ALTER TABLE experience ADD id_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C10399DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_590C10399DED506 ON experience (id_client_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455216158D2');
        $this->addSql('DROP INDEX UNIQ_C7440455216158D2 ON client');
        $this->addSql('ALTER TABLE client DROP id_cv_id');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C10399DED506');
        $this->addSql('DROP INDEX IDX_590C10399DED506 ON experience');
        $this->addSql('ALTER TABLE experience DROP id_client_id');
    }
}
