<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240212201802 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pt_collect_type_dispo (pt_collect_id INT NOT NULL, type_dispo_id INT NOT NULL, INDEX IDX_641EB71F0247391 (pt_collect_id), INDEX IDX_641EB716C733B35 (type_dispo_id), PRIMARY KEY(pt_collect_id, type_dispo_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pt_collect_type_dispo ADD CONSTRAINT FK_641EB71F0247391 FOREIGN KEY (pt_collect_id) REFERENCES pt_collect (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pt_collect_type_dispo ADD CONSTRAINT FK_641EB716C733B35 FOREIGN KEY (type_dispo_id) REFERENCES type_dispo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE justificatif DROP FOREIGN KEY FK_90D3C5DC50EAD6C6');
        $this->addSql('ALTER TABLE type_dispo_pt_collect DROP FOREIGN KEY FK_110822486C733B35');
        $this->addSql('ALTER TABLE type_dispo_pt_collect DROP FOREIGN KEY FK_11082248F0247391');
        $this->addSql('DROP TABLE justificatif');
        $this->addSql('DROP TABLE type_dispo_pt_collect');
        $this->addSql('ALTER TABLE prod_r DROP FOREIGN KEY FK_9641CAEF6C733B35');
        $this->addSql('DROP INDEX IDX_9641CAEF6C733B35 ON prod_r');
        $this->addSql('ALTER TABLE prod_r ADD type_prod_id_id INT NOT NULL, ADD justificatif VARCHAR(255) NOT NULL, DROP type_dispo_id, CHANGE user_id_id user_id_id INT NOT NULL, CHANGE ptc_id_id ptc_id_id INT NOT NULL, CHANGE statut statut TINYINT(1) DEFAULT NULL, CHANGE nom_p nom_p VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE prod_r ADD CONSTRAINT FK_9641CAEFE419D911 FOREIGN KEY (type_prod_id_id) REFERENCES type_dispo (id)');
        $this->addSql('CREATE INDEX IDX_9641CAEFE419D911 ON prod_r (type_prod_id_id)');
        $this->addSql('ALTER TABLE pt_collect CHANGE latitude_pc latitude_pc DOUBLE PRECISION DEFAULT NULL, CHANGE longitude_pc longitude_pc DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE type_dispo DROP FOREIGN KEY FK_4637CAD8F0247391');
        $this->addSql('DROP INDEX IDX_4637CAD8F0247391 ON type_dispo');
        $this->addSql('ALTER TABLE type_dispo DROP pt_collect_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE justificatif (id INT AUTO_INCREMENT NOT NULL, produit_r_id INT DEFAULT NULL, fichier VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, statut_j TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_90D3C5DC50EAD6C6 (produit_r_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE type_dispo_pt_collect (type_dispo_id INT NOT NULL, pt_collect_id INT NOT NULL, INDEX IDX_11082248F0247391 (pt_collect_id), INDEX IDX_110822486C733B35 (type_dispo_id), PRIMARY KEY(type_dispo_id, pt_collect_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE justificatif ADD CONSTRAINT FK_90D3C5DC50EAD6C6 FOREIGN KEY (produit_r_id) REFERENCES prod_r (id)');
        $this->addSql('ALTER TABLE type_dispo_pt_collect ADD CONSTRAINT FK_110822486C733B35 FOREIGN KEY (type_dispo_id) REFERENCES type_dispo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE type_dispo_pt_collect ADD CONSTRAINT FK_11082248F0247391 FOREIGN KEY (pt_collect_id) REFERENCES pt_collect (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pt_collect_type_dispo DROP FOREIGN KEY FK_641EB71F0247391');
        $this->addSql('ALTER TABLE pt_collect_type_dispo DROP FOREIGN KEY FK_641EB716C733B35');
        $this->addSql('DROP TABLE pt_collect_type_dispo');
        $this->addSql('ALTER TABLE prod_r DROP FOREIGN KEY FK_9641CAEFE419D911');
        $this->addSql('DROP INDEX IDX_9641CAEFE419D911 ON prod_r');
        $this->addSql('ALTER TABLE prod_r ADD type_dispo_id INT DEFAULT NULL, DROP type_prod_id_id, DROP justificatif, CHANGE user_id_id user_id_id INT DEFAULT NULL, CHANGE ptc_id_id ptc_id_id INT DEFAULT NULL, CHANGE statut statut TINYINT(1) NOT NULL, CHANGE nom_p nom_p VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE prod_r ADD CONSTRAINT FK_9641CAEF6C733B35 FOREIGN KEY (type_dispo_id) REFERENCES type_dispo (id)');
        $this->addSql('CREATE INDEX IDX_9641CAEF6C733B35 ON prod_r (type_dispo_id)');
        $this->addSql('ALTER TABLE pt_collect CHANGE latitude_pc latitude_pc INT NOT NULL, CHANGE longitude_pc longitude_pc DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE type_dispo ADD pt_collect_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE type_dispo ADD CONSTRAINT FK_4637CAD8F0247391 FOREIGN KEY (pt_collect_id) REFERENCES pt_collect (id)');
        $this->addSql('CREATE INDEX IDX_4637CAD8F0247391 ON type_dispo (pt_collect_id)');
    }
}
