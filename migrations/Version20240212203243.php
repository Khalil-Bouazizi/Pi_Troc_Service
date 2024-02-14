<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240212203243 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commandes (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, etat INT NOT NULL, date DATE NOT NULL, INDEX IDX_35D4282C79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_troc (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, description VARCHAR(1000) NOT NULL, statut INT DEFAULT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_8D2A6E8C79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_troc_with (id INT AUTO_INCREMENT NOT NULL, prod_id_troc_id INT DEFAULT NULL, user_id_tchange_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, description VARCHAR(1000) NOT NULL, image VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_D1AD6A8666583D84 (prod_id_troc_id), UNIQUE INDEX UNIQ_D1AD6A869019FF49 (user_id_tchange_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282C79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE produit_troc ADD CONSTRAINT FK_8D2A6E8C79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE produit_troc_with ADD CONSTRAINT FK_D1AD6A8666583D84 FOREIGN KEY (prod_id_troc_id) REFERENCES produit_troc (id)');
        $this->addSql('ALTER TABLE produit_troc_with ADD CONSTRAINT FK_D1AD6A869019FF49 FOREIGN KEY (user_id_tchange_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE annonces ADD commandes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE annonces ADD CONSTRAINT FK_CB988C6F8BF5C2E6 FOREIGN KEY (commandes_id) REFERENCES commandes (id)');
        $this->addSql('CREATE INDEX IDX_CB988C6F8BF5C2E6 ON annonces (commandes_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonces DROP FOREIGN KEY FK_CB988C6F8BF5C2E6');
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282C79F37AE5');
        $this->addSql('ALTER TABLE produit_troc DROP FOREIGN KEY FK_8D2A6E8C79F37AE5');
        $this->addSql('ALTER TABLE produit_troc_with DROP FOREIGN KEY FK_D1AD6A8666583D84');
        $this->addSql('ALTER TABLE produit_troc_with DROP FOREIGN KEY FK_D1AD6A869019FF49');
        $this->addSql('DROP TABLE commandes');
        $this->addSql('DROP TABLE produit_troc');
        $this->addSql('DROP TABLE produit_troc_with');
        $this->addSql('DROP INDEX IDX_CB988C6F8BF5C2E6 ON annonces');
        $this->addSql('ALTER TABLE annonces DROP commandes_id');
    }
}
