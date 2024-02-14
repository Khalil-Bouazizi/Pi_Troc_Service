<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240212162923 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE justificatif (id INT AUTO_INCREMENT NOT NULL, produit_r_id INT DEFAULT NULL, fichier VARCHAR(255) NOT NULL, statut_j TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_90D3C5DC50EAD6C6 (produit_r_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prod_r (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, ptc_id_id INT DEFAULT NULL, type_dispo_id INT DEFAULT NULL, statut TINYINT(1) NOT NULL, description VARCHAR(255) DEFAULT NULL, nom_p VARCHAR(255) NOT NULL, INDEX IDX_9641CAEF9D86650F (user_id_id), INDEX IDX_9641CAEFC050CD01 (ptc_id_id), INDEX IDX_9641CAEF6C733B35 (type_dispo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_dispo (id INT AUTO_INCREMENT NOT NULL, pt_collect_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_4637CAD8F0247391 (pt_collect_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_dispo_pt_collect (type_dispo_id INT NOT NULL, pt_collect_id INT NOT NULL, INDEX IDX_110822486C733B35 (type_dispo_id), INDEX IDX_11082248F0247391 (pt_collect_id), PRIMARY KEY(type_dispo_id, pt_collect_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE justificatif ADD CONSTRAINT FK_90D3C5DC50EAD6C6 FOREIGN KEY (produit_r_id) REFERENCES prod_r (id)');
        $this->addSql('ALTER TABLE prod_r ADD CONSTRAINT FK_9641CAEF9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE prod_r ADD CONSTRAINT FK_9641CAEFC050CD01 FOREIGN KEY (ptc_id_id) REFERENCES pt_collect (id)');
        $this->addSql('ALTER TABLE prod_r ADD CONSTRAINT FK_9641CAEF6C733B35 FOREIGN KEY (type_dispo_id) REFERENCES type_dispo (id)');
        $this->addSql('ALTER TABLE type_dispo ADD CONSTRAINT FK_4637CAD8F0247391 FOREIGN KEY (pt_collect_id) REFERENCES pt_collect (id)');
        $this->addSql('ALTER TABLE type_dispo_pt_collect ADD CONSTRAINT FK_110822486C733B35 FOREIGN KEY (type_dispo_id) REFERENCES type_dispo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE type_dispo_pt_collect ADD CONSTRAINT FK_11082248F0247391 FOREIGN KEY (pt_collect_id) REFERENCES pt_collect (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE justificatif DROP FOREIGN KEY FK_90D3C5DC50EAD6C6');
        $this->addSql('ALTER TABLE prod_r DROP FOREIGN KEY FK_9641CAEF9D86650F');
        $this->addSql('ALTER TABLE prod_r DROP FOREIGN KEY FK_9641CAEFC050CD01');
        $this->addSql('ALTER TABLE prod_r DROP FOREIGN KEY FK_9641CAEF6C733B35');
        $this->addSql('ALTER TABLE type_dispo DROP FOREIGN KEY FK_4637CAD8F0247391');
        $this->addSql('ALTER TABLE type_dispo_pt_collect DROP FOREIGN KEY FK_110822486C733B35');
        $this->addSql('ALTER TABLE type_dispo_pt_collect DROP FOREIGN KEY FK_11082248F0247391');
        $this->addSql('DROP TABLE justificatif');
        $this->addSql('DROP TABLE prod_r');
        $this->addSql('DROP TABLE type_dispo');
        $this->addSql('DROP TABLE type_dispo_pt_collect');
    }
}
