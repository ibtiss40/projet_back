<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210308155550 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cv (id INT AUTO_INCREMENT NOT NULL, id_image_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_B66FFE926D7EC9F8 (id_image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cv ADD CONSTRAINT FK_B66FFE926D7EC9F8 FOREIGN KEY (id_image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE portfolio ADD url VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9B96B5643');
        $this->addSql('DROP INDEX IDX_50159CA9B96B5643 ON projet');
        $this->addSql('ALTER TABLE projet CHANGE portfolio_id client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA919EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_50159CA919EB6921 ON projet (client_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE cv');
        $this->addSql('ALTER TABLE portfolio DROP url');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA919EB6921');
        $this->addSql('DROP INDEX IDX_50159CA919EB6921 ON projet');
        $this->addSql('ALTER TABLE projet CHANGE client_id portfolio_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9B96B5643 FOREIGN KEY (portfolio_id) REFERENCES portfolio (id)');
        $this->addSql('CREATE INDEX IDX_50159CA9B96B5643 ON projet (portfolio_id)');
    }
}
