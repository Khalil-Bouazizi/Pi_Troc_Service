<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240212204840 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE association (id INT AUTO_INCREMENT NOT NULL, nom_association VARCHAR(255) NOT NULL, adresse_association VARCHAR(500) NOT NULL, rib BIGINT NOT NULL, logo_association VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE don_argent (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, id_association_id INT DEFAULT NULL, montant DOUBLE PRECISION NOT NULL, date_don_argent DATE NOT NULL, INDEX IDX_ACE1F3F39D86650F (user_id_id), INDEX IDX_ACE1F3F3D2DF75A3 (id_association_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE don_bien_materiel (id INT AUTO_INCREMENT NOT NULL, id_association_id INT DEFAULT NULL, user_id_id INT DEFAULT NULL, description_don VARCHAR(500) NOT NULL, photo_don VARCHAR(255) NOT NULL, statut_don TINYINT(1) NOT NULL, date_don_bien_materiel DATE NOT NULL, INDEX IDX_45999F56D2DF75A3 (id_association_id), INDEX IDX_45999F569D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE don_argent ADD CONSTRAINT FK_ACE1F3F39D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE don_argent ADD CONSTRAINT FK_ACE1F3F3D2DF75A3 FOREIGN KEY (id_association_id) REFERENCES association (id)');
        $this->addSql('ALTER TABLE don_bien_materiel ADD CONSTRAINT FK_45999F56D2DF75A3 FOREIGN KEY (id_association_id) REFERENCES association (id)');
        $this->addSql('ALTER TABLE don_bien_materiel ADD CONSTRAINT FK_45999F569D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE don_argent DROP FOREIGN KEY FK_ACE1F3F39D86650F');
        $this->addSql('ALTER TABLE don_argent DROP FOREIGN KEY FK_ACE1F3F3D2DF75A3');
        $this->addSql('ALTER TABLE don_bien_materiel DROP FOREIGN KEY FK_45999F56D2DF75A3');
        $this->addSql('ALTER TABLE don_bien_materiel DROP FOREIGN KEY FK_45999F569D86650F');
        $this->addSql('DROP TABLE association');
        $this->addSql('DROP TABLE don_argent');
        $this->addSql('DROP TABLE don_bien_materiel');
    }
}
