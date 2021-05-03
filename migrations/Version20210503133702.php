<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210503133702 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce_visites ADD membre_id INT NOT NULL');
        $this->addSql('ALTER TABLE annonce_visites ADD CONSTRAINT FK_BD62A3E36A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id)');
        $this->addSql('CREATE INDEX IDX_BD62A3E36A99F74A ON annonce_visites (membre_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce_visites DROP FOREIGN KEY FK_BD62A3E36A99F74A');
        $this->addSql('DROP INDEX IDX_BD62A3E36A99F74A ON annonce_visites');
        $this->addSql('ALTER TABLE annonce_visites DROP membre_id');
    }
}
