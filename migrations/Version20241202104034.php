<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241202104034 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cio (id INT AUTO_INCREMENT NOT NULL, etablissements_id_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, contact VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, role VARCHAR(255) DEFAULT NULL, INDEX IDX_DCE2004C3758F7A5 (etablissements_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competences (id INT AUTO_INCREMENT NOT NULL, metiers_id_id INT DEFAULT NULL, competence VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_DB2077CEF4ECA2A9 (metiers_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE diplomes (id INT AUTO_INCREMENT NOT NULL, abreviation VARCHAR(255) DEFAULT NULL, diplome VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE diplomes_etablissements (diplomes_id INT NOT NULL, etablissements_id INT NOT NULL, INDEX IDX_225C6371A953C628 (diplomes_id), INDEX IDX_225C6371D23B76CD (etablissements_id), PRIMARY KEY(diplomes_id, etablissements_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE districts (id INT AUTO_INCREMENT NOT NULL, regions_id_id INT NOT NULL, code VARCHAR(255) DEFAULT NULL, district VARCHAR(255) NOT NULL, INDEX IDX_68E318DCEEB5DD76 (regions_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprises (id INT AUTO_INCREMENT NOT NULL, districts_id_id INT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, INDEX IDX_56B1B7A9421E0692 (districts_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etablissements (id INT AUTO_INCREMENT NOT NULL, districts_id_id INT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, latitude VARCHAR(255) DEFAULT NULL, longitude VARCHAR(255) DEFAULT NULL, contact VARCHAR(255) DEFAULT NULL, chef VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, logo VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, INDEX IDX_29F65EB1421E0692 (districts_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE filiers (id INT AUTO_INCREMENT NOT NULL, secteurs_id_id INT DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, filiere VARCHAR(255) NOT NULL, INDEX IDX_DA04E8CFBFEFDF00 (secteurs_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE filiers_etablissements (filiers_id INT NOT NULL, etablissements_id INT NOT NULL, INDEX IDX_6FBE82836D78A96A (filiers_id), INDEX IDX_6FBE8283D23B76CD (etablissements_id), PRIMARY KEY(filiers_id, etablissements_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE metiers (id INT AUTO_INCREMENT NOT NULL, filiers_id_id INT DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, metier VARCHAR(255) NOT NULL, INDEX IDX_FF51A00D21A7505 (filiers_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE referentiels (id INT AUTO_INCREMENT NOT NULL, referentiel VARCHAR(255) DEFAULT NULL, fichier LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE regions (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) DEFAULT NULL, region VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE secteurs (id INT AUTO_INCREMENT NOT NULL, codesecteurs VARCHAR(255) DEFAULT NULL, secteur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE secteurs_entreprises (secteurs_id INT NOT NULL, entreprises_id INT NOT NULL, INDEX IDX_296CF65B978437EE (secteurs_id), INDEX IDX_296CF65BA70A18EC (entreprises_id), PRIMARY KEY(secteurs_id, entreprises_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE textes (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, fichier LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_formations (id INT AUTO_INCREMENT NOT NULL, abreviation VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_formations_etablissements (type_formations_id INT NOT NULL, etablissements_id INT NOT NULL, INDEX IDX_1EC96F664B1807F7 (type_formations_id), INDEX IDX_1EC96F66D23B76CD (etablissements_id), PRIMARY KEY(type_formations_id, etablissements_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cio ADD CONSTRAINT FK_DCE2004C3758F7A5 FOREIGN KEY (etablissements_id_id) REFERENCES etablissements (id)');
        $this->addSql('ALTER TABLE competences ADD CONSTRAINT FK_DB2077CEF4ECA2A9 FOREIGN KEY (metiers_id_id) REFERENCES metiers (id)');
        $this->addSql('ALTER TABLE diplomes_etablissements ADD CONSTRAINT FK_225C6371A953C628 FOREIGN KEY (diplomes_id) REFERENCES diplomes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE diplomes_etablissements ADD CONSTRAINT FK_225C6371D23B76CD FOREIGN KEY (etablissements_id) REFERENCES etablissements (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE districts ADD CONSTRAINT FK_68E318DCEEB5DD76 FOREIGN KEY (regions_id_id) REFERENCES regions (id)');
        $this->addSql('ALTER TABLE entreprises ADD CONSTRAINT FK_56B1B7A9421E0692 FOREIGN KEY (districts_id_id) REFERENCES districts (id)');
        $this->addSql('ALTER TABLE etablissements ADD CONSTRAINT FK_29F65EB1421E0692 FOREIGN KEY (districts_id_id) REFERENCES districts (id)');
        $this->addSql('ALTER TABLE filiers ADD CONSTRAINT FK_DA04E8CFBFEFDF00 FOREIGN KEY (secteurs_id_id) REFERENCES secteurs (id)');
        $this->addSql('ALTER TABLE filiers_etablissements ADD CONSTRAINT FK_6FBE82836D78A96A FOREIGN KEY (filiers_id) REFERENCES filiers (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE filiers_etablissements ADD CONSTRAINT FK_6FBE8283D23B76CD FOREIGN KEY (etablissements_id) REFERENCES etablissements (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE metiers ADD CONSTRAINT FK_FF51A00D21A7505 FOREIGN KEY (filiers_id_id) REFERENCES filiers (id)');
        $this->addSql('ALTER TABLE secteurs_entreprises ADD CONSTRAINT FK_296CF65B978437EE FOREIGN KEY (secteurs_id) REFERENCES secteurs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE secteurs_entreprises ADD CONSTRAINT FK_296CF65BA70A18EC FOREIGN KEY (entreprises_id) REFERENCES entreprises (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE type_formations_etablissements ADD CONSTRAINT FK_1EC96F664B1807F7 FOREIGN KEY (type_formations_id) REFERENCES type_formations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE type_formations_etablissements ADD CONSTRAINT FK_1EC96F66D23B76CD FOREIGN KEY (etablissements_id) REFERENCES etablissements (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cio DROP FOREIGN KEY FK_DCE2004C3758F7A5');
        $this->addSql('ALTER TABLE competences DROP FOREIGN KEY FK_DB2077CEF4ECA2A9');
        $this->addSql('ALTER TABLE diplomes_etablissements DROP FOREIGN KEY FK_225C6371A953C628');
        $this->addSql('ALTER TABLE diplomes_etablissements DROP FOREIGN KEY FK_225C6371D23B76CD');
        $this->addSql('ALTER TABLE districts DROP FOREIGN KEY FK_68E318DCEEB5DD76');
        $this->addSql('ALTER TABLE entreprises DROP FOREIGN KEY FK_56B1B7A9421E0692');
        $this->addSql('ALTER TABLE etablissements DROP FOREIGN KEY FK_29F65EB1421E0692');
        $this->addSql('ALTER TABLE filiers DROP FOREIGN KEY FK_DA04E8CFBFEFDF00');
        $this->addSql('ALTER TABLE filiers_etablissements DROP FOREIGN KEY FK_6FBE82836D78A96A');
        $this->addSql('ALTER TABLE filiers_etablissements DROP FOREIGN KEY FK_6FBE8283D23B76CD');
        $this->addSql('ALTER TABLE metiers DROP FOREIGN KEY FK_FF51A00D21A7505');
        $this->addSql('ALTER TABLE secteurs_entreprises DROP FOREIGN KEY FK_296CF65B978437EE');
        $this->addSql('ALTER TABLE secteurs_entreprises DROP FOREIGN KEY FK_296CF65BA70A18EC');
        $this->addSql('ALTER TABLE type_formations_etablissements DROP FOREIGN KEY FK_1EC96F664B1807F7');
        $this->addSql('ALTER TABLE type_formations_etablissements DROP FOREIGN KEY FK_1EC96F66D23B76CD');
        $this->addSql('DROP TABLE cio');
        $this->addSql('DROP TABLE competences');
        $this->addSql('DROP TABLE diplomes');
        $this->addSql('DROP TABLE diplomes_etablissements');
        $this->addSql('DROP TABLE districts');
        $this->addSql('DROP TABLE entreprises');
        $this->addSql('DROP TABLE etablissements');
        $this->addSql('DROP TABLE filiers');
        $this->addSql('DROP TABLE filiers_etablissements');
        $this->addSql('DROP TABLE metiers');
        $this->addSql('DROP TABLE referentiels');
        $this->addSql('DROP TABLE regions');
        $this->addSql('DROP TABLE secteurs');
        $this->addSql('DROP TABLE secteurs_entreprises');
        $this->addSql('DROP TABLE textes');
        $this->addSql('DROP TABLE type_formations');
        $this->addSql('DROP TABLE type_formations_etablissements');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
