<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210510160537 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce_visites (id INT AUTO_INCREMENT NOT NULL, membre_id INT NOT NULL, ville_id INT NOT NULL, nom_lieu VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, region VARCHAR(255) NOT NULL, langue VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, rue VARCHAR(255) NOT NULL, numero VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, INDEX IDX_BD62A3E36A99F74A (membre_id), INDEX IDX_BD62A3E3A73F0036 (ville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_infos (id INT AUTO_INCREMENT NOT NULL, membre_id INT NOT NULL, titre VARCHAR(255) NOT NULL, resumer LONGTEXT NOT NULL, message_info LONGTEXT NOT NULL, date_article DATE NOT NULL, type_information VARCHAR(255) NOT NULL, theme VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, rue VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, pays VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(255) DEFAULT NULL, numero VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, INDEX IDX_997DF07C6A99F74A (membre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE membre (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, pays_id INT NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_43C3D9C3A6E44244 (pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonce_visites ADD CONSTRAINT FK_BD62A3E36A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id)');
        $this->addSql('ALTER TABLE annonce_visites ADD CONSTRAINT FK_BD62A3E3A73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE article_infos ADD CONSTRAINT FK_997DF07C6A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id)');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C3A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce_visites DROP FOREIGN KEY FK_BD62A3E36A99F74A');
        $this->addSql('ALTER TABLE article_infos DROP FOREIGN KEY FK_997DF07C6A99F74A');
        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C3A6E44244');
        $this->addSql('ALTER TABLE annonce_visites DROP FOREIGN KEY FK_BD62A3E3A73F0036');
        $this->addSql('DROP TABLE annonce_visites');
        $this->addSql('DROP TABLE article_infos');
        $this->addSql('DROP TABLE membre');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE ville');
    }
}
