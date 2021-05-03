<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210503132131 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_infos ADD membre_id INT NOT NULL');
        $this->addSql('ALTER TABLE article_infos ADD CONSTRAINT FK_997DF07C6A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id)');
        $this->addSql('CREATE INDEX IDX_997DF07C6A99F74A ON article_infos (membre_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_infos DROP FOREIGN KEY FK_997DF07C6A99F74A');
        $this->addSql('DROP INDEX IDX_997DF07C6A99F74A ON article_infos');
        $this->addSql('ALTER TABLE article_infos DROP membre_id');
    }
}
