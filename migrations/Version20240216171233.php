<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240216171233 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonces (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, commandes_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description_annonces VARCHAR(500) NOT NULL, negotiable TINYINT(1) NOT NULL, price DOUBLE PRECISION NOT NULL, category VARCHAR(255) NOT NULL, status INT NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_CB988C6F79F37AE5 (id_user_id), INDEX IDX_CB988C6F8BF5C2E6 (commandes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE association (id INT AUTO_INCREMENT NOT NULL, nom_association VARCHAR(255) NOT NULL, adresse_association VARCHAR(500) NOT NULL, rib BIGINT NOT NULL, logo_association VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blog (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, category VARCHAR(255) NOT NULL, titre VARCHAR(255) NOT NULL, contenu_blog VARCHAR(500) NOT NULL, status INT NOT NULL, rate INT DEFAULT NULL, INDEX IDX_C0155143A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commandes (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, etat INT NOT NULL, date DATE NOT NULL, INDEX IDX_35D4282C79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE don_argent (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, id_association_id INT DEFAULT NULL, montant DOUBLE PRECISION NOT NULL, date_don_argent DATE NOT NULL, INDEX IDX_ACE1F3F39D86650F (user_id_id), INDEX IDX_ACE1F3F3D2DF75A3 (id_association_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE don_bien_materiel (id INT AUTO_INCREMENT NOT NULL, id_association_id INT DEFAULT NULL, user_id_id INT DEFAULT NULL, description_don VARCHAR(500) NOT NULL, photo_don VARCHAR(255) NOT NULL, statut_don TINYINT(1) NOT NULL, date_don_bien_materiel DATE NOT NULL, INDEX IDX_45999F56D2DF75A3 (id_association_id), INDEX IDX_45999F569D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prod_r (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, ptc_id_id INT NOT NULL, type_prod_id_id INT NOT NULL, statut TINYINT(1) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, nom_p VARCHAR(255) DEFAULT NULL, justificatif VARCHAR(255) NOT NULL, INDEX IDX_9641CAEF9D86650F (user_id_id), INDEX IDX_9641CAEFC050CD01 (ptc_id_id), INDEX IDX_9641CAEFE419D911 (type_prod_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, nom_product VARCHAR(255) NOT NULL, INDEX IDX_D34A04ADA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_troc (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, description VARCHAR(1000) NOT NULL, statut INT DEFAULT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_8D2A6E8C79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_troc_with (id INT AUTO_INCREMENT NOT NULL, prod_id_troc_id INT DEFAULT NULL, user_id_tchange_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, description VARCHAR(1000) NOT NULL, image VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_D1AD6A8666583D84 (prod_id_troc_id), UNIQUE INDEX UNIQ_D1AD6A869019FF49 (user_id_tchange_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pt_collect (id INT AUTO_INCREMENT NOT NULL, nom_pc VARCHAR(255) NOT NULL, adresse_pc VARCHAR(255) NOT NULL, latitude_pc DOUBLE PRECISION DEFAULT NULL, longitude_pc DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pt_collect_type_dispo (pt_collect_id INT NOT NULL, type_dispo_id INT NOT NULL, INDEX IDX_641EB71F0247391 (pt_collect_id), INDEX IDX_641EB716C733B35 (type_dispo_id), PRIMARY KEY(pt_collect_id, type_dispo_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponse_blog (id INT AUTO_INCREMENT NOT NULL, blog_id INT DEFAULT NULL, id_user_reponse_id INT DEFAULT NULL, contenu VARCHAR(255) NOT NULL, date DATE NOT NULL, nb_likes INT NOT NULL, INDEX IDX_FC7E1800DAE07E97 (blog_id), INDEX IDX_FC7E18008121BEE6 (id_user_reponse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_dispo (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, nb_points INT NOT NULL, age INT NOT NULL, date_birthday DATE NOT NULL, confirmpassword VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonces ADD CONSTRAINT FK_CB988C6F79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE annonces ADD CONSTRAINT FK_CB988C6F8BF5C2E6 FOREIGN KEY (commandes_id) REFERENCES commandes (id)');
        $this->addSql('ALTER TABLE blog ADD CONSTRAINT FK_C0155143A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282C79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE don_argent ADD CONSTRAINT FK_ACE1F3F39D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE don_argent ADD CONSTRAINT FK_ACE1F3F3D2DF75A3 FOREIGN KEY (id_association_id) REFERENCES association (id)');
        $this->addSql('ALTER TABLE don_bien_materiel ADD CONSTRAINT FK_45999F56D2DF75A3 FOREIGN KEY (id_association_id) REFERENCES association (id)');
        $this->addSql('ALTER TABLE don_bien_materiel ADD CONSTRAINT FK_45999F569D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE prod_r ADD CONSTRAINT FK_9641CAEF9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE prod_r ADD CONSTRAINT FK_9641CAEFC050CD01 FOREIGN KEY (ptc_id_id) REFERENCES pt_collect (id)');
        $this->addSql('ALTER TABLE prod_r ADD CONSTRAINT FK_9641CAEFE419D911 FOREIGN KEY (type_prod_id_id) REFERENCES type_dispo (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE produit_troc ADD CONSTRAINT FK_8D2A6E8C79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE produit_troc_with ADD CONSTRAINT FK_D1AD6A8666583D84 FOREIGN KEY (prod_id_troc_id) REFERENCES produit_troc (id)');
        $this->addSql('ALTER TABLE produit_troc_with ADD CONSTRAINT FK_D1AD6A869019FF49 FOREIGN KEY (user_id_tchange_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE pt_collect_type_dispo ADD CONSTRAINT FK_641EB71F0247391 FOREIGN KEY (pt_collect_id) REFERENCES pt_collect (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pt_collect_type_dispo ADD CONSTRAINT FK_641EB716C733B35 FOREIGN KEY (type_dispo_id) REFERENCES type_dispo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reponse_blog ADD CONSTRAINT FK_FC7E1800DAE07E97 FOREIGN KEY (blog_id) REFERENCES blog (id)');
        $this->addSql('ALTER TABLE reponse_blog ADD CONSTRAINT FK_FC7E18008121BEE6 FOREIGN KEY (id_user_reponse_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonces DROP FOREIGN KEY FK_CB988C6F79F37AE5');
        $this->addSql('ALTER TABLE annonces DROP FOREIGN KEY FK_CB988C6F8BF5C2E6');
        $this->addSql('ALTER TABLE blog DROP FOREIGN KEY FK_C0155143A76ED395');
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282C79F37AE5');
        $this->addSql('ALTER TABLE don_argent DROP FOREIGN KEY FK_ACE1F3F39D86650F');
        $this->addSql('ALTER TABLE don_argent DROP FOREIGN KEY FK_ACE1F3F3D2DF75A3');
        $this->addSql('ALTER TABLE don_bien_materiel DROP FOREIGN KEY FK_45999F56D2DF75A3');
        $this->addSql('ALTER TABLE don_bien_materiel DROP FOREIGN KEY FK_45999F569D86650F');
        $this->addSql('ALTER TABLE prod_r DROP FOREIGN KEY FK_9641CAEF9D86650F');
        $this->addSql('ALTER TABLE prod_r DROP FOREIGN KEY FK_9641CAEFC050CD01');
        $this->addSql('ALTER TABLE prod_r DROP FOREIGN KEY FK_9641CAEFE419D911');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADA76ED395');
        $this->addSql('ALTER TABLE produit_troc DROP FOREIGN KEY FK_8D2A6E8C79F37AE5');
        $this->addSql('ALTER TABLE produit_troc_with DROP FOREIGN KEY FK_D1AD6A8666583D84');
        $this->addSql('ALTER TABLE produit_troc_with DROP FOREIGN KEY FK_D1AD6A869019FF49');
        $this->addSql('ALTER TABLE pt_collect_type_dispo DROP FOREIGN KEY FK_641EB71F0247391');
        $this->addSql('ALTER TABLE pt_collect_type_dispo DROP FOREIGN KEY FK_641EB716C733B35');
        $this->addSql('ALTER TABLE reponse_blog DROP FOREIGN KEY FK_FC7E1800DAE07E97');
        $this->addSql('ALTER TABLE reponse_blog DROP FOREIGN KEY FK_FC7E18008121BEE6');
        $this->addSql('DROP TABLE annonces');
        $this->addSql('DROP TABLE association');
        $this->addSql('DROP TABLE blog');
        $this->addSql('DROP TABLE commandes');
        $this->addSql('DROP TABLE don_argent');
        $this->addSql('DROP TABLE don_bien_materiel');
        $this->addSql('DROP TABLE prod_r');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE produit_troc');
        $this->addSql('DROP TABLE produit_troc_with');
        $this->addSql('DROP TABLE pt_collect');
        $this->addSql('DROP TABLE pt_collect_type_dispo');
        $this->addSql('DROP TABLE reponse_blog');
        $this->addSql('DROP TABLE type_dispo');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
