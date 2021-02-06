<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210206054932 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE customers (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, created_at DATETIME NOT NULL, update_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_62534E21E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE effectif (id INT AUTO_INCREMENT NOT NULL, effec_id_id INT DEFAULT NULL, raison_sociale VARCHAR(255) DEFAULT NULL, nom_contact VARCHAR(180) DEFAULT NULL, prenom_contact VARCHAR(180) DEFAULT NULL, civilite VARCHAR(25) DEFAULT NULL, fonction VARCHAR(255) DEFAULT NULL, tel_contact INT DEFAULT NULL, portable_contact INT DEFAULT NULL, email_contact VARCHAR(180) DEFAULT NULL, adresse_1 LONGTEXT DEFAULT NULL, adresse_2 LONGTEXT DEFAULT NULL, code_postal_entreprise INT DEFAULT NULL, ville_entreprise VARCHAR(255) DEFAULT NULL, telephone_entreprise INT DEFAULT NULL, effectif INT DEFAULT NULL, INDEX IDX_F0B590F1DF6F2C40 (effec_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE effectif ADD CONSTRAINT FK_F0B590F1DF6F2C40 FOREIGN KEY (effec_id_id) REFERENCES customers (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE effectif DROP FOREIGN KEY FK_F0B590F1DF6F2C40');
        $this->addSql('DROP TABLE customers');
        $this->addSql('DROP TABLE effectif');
    }
}
