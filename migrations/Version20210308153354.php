<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210308153354 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image ADD id_projet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F80F43E55 FOREIGN KEY (id_projet_id) REFERENCES projet (id)');
        $this->addSql('CREATE INDEX IDX_C53D045F80F43E55 ON image (id_projet_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F80F43E55');
        $this->addSql('DROP INDEX IDX_C53D045F80F43E55 ON image');
        $this->addSql('ALTER TABLE image DROP id_projet_id');
    }
}
