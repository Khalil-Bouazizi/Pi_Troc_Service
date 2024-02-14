<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240212161419 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blog (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, category VARCHAR(255) NOT NULL, titre VARCHAR(255) NOT NULL, contenu_blog VARCHAR(500) NOT NULL, status INT NOT NULL, rate INT DEFAULT NULL, INDEX IDX_C0155143A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pt_collect (id INT AUTO_INCREMENT NOT NULL, nom_pc VARCHAR(255) NOT NULL, adresse_pc VARCHAR(255) NOT NULL, latitude_pc INT NOT NULL, longitude_pc DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponse_blog (id INT AUTO_INCREMENT NOT NULL, blog_id INT DEFAULT NULL, id_user_reponse_id INT DEFAULT NULL, contenu VARCHAR(255) NOT NULL, date DATE NOT NULL, nb_likes INT NOT NULL, INDEX IDX_FC7E1800DAE07E97 (blog_id), INDEX IDX_FC7E18008121BEE6 (id_user_reponse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE blog ADD CONSTRAINT FK_C0155143A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reponse_blog ADD CONSTRAINT FK_FC7E1800DAE07E97 FOREIGN KEY (blog_id) REFERENCES blog (id)');
        $this->addSql('ALTER TABLE reponse_blog ADD CONSTRAINT FK_FC7E18008121BEE6 FOREIGN KEY (id_user_reponse_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user CHANGE nb_points nb_points INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blog DROP FOREIGN KEY FK_C0155143A76ED395');
        $this->addSql('ALTER TABLE reponse_blog DROP FOREIGN KEY FK_FC7E1800DAE07E97');
        $this->addSql('ALTER TABLE reponse_blog DROP FOREIGN KEY FK_FC7E18008121BEE6');
        $this->addSql('DROP TABLE blog');
        $this->addSql('DROP TABLE pt_collect');
        $this->addSql('DROP TABLE reponse_blog');
        $this->addSql('ALTER TABLE user CHANGE nb_points nb_points INT DEFAULT NULL');
    }
}
