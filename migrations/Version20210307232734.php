<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210307232734 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cv ADD client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cv ADD CONSTRAINT FK_B66FFE9219EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B66FFE9219EB6921 ON cv (client_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cv DROP FOREIGN KEY FK_B66FFE9219EB6921');
        $this->addSql('DROP INDEX UNIQ_B66FFE9219EB6921 ON cv');
        $this->addSql('ALTER TABLE cv DROP client_id');
    }
}
