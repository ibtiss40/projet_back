<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210308154625 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE portfolio (id INT AUTO_INCREMENT NOT NULL, id_image_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_A9ED10626D7EC9F8 (id_image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE portfolio ADD CONSTRAINT FK_A9ED10626D7EC9F8 FOREIGN KEY (id_image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE projet ADD portfolio_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9B96B5643 FOREIGN KEY (portfolio_id) REFERENCES portfolio (id)');
        $this->addSql('CREATE INDEX IDX_50159CA9B96B5643 ON projet (portfolio_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9B96B5643');
        $this->addSql('DROP TABLE portfolio');
        $this->addSql('DROP INDEX IDX_50159CA9B96B5643 ON projet');
        $this->addSql('ALTER TABLE projet DROP portfolio_id');
    }
}
