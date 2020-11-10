<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201109122457 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, picture_id_picture_id INT DEFAULT NULL, text LONGTEXT NOT NULL, date_at DATETIME NOT NULL, INDEX IDX_9474526CA76ED395 (user_id), INDEX IDX_9474526C382AB610 (picture_id_picture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gallery (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, status_gallery VARBINARY(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gallery_user (gallery_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_1E8CFEC54E7AF8F (gallery_id), INDEX IDX_1E8CFEC5A76ED395 (user_id), PRIMARY KEY(gallery_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gallery_keywords (gallery_id INT NOT NULL, keywords_id INT NOT NULL, INDEX IDX_9FD267E54E7AF8F (gallery_id), INDEX IDX_9FD267E56205D0B8 (keywords_id), PRIMARY KEY(gallery_id, keywords_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE keywords (id INT AUTO_INCREMENT NOT NULL, keywords VARCHAR(16) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, gallery_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, name_img VARCHAR(255) NOT NULL, width INT NOT NULL, height INT NOT NULL, INDEX IDX_16DB4F894E7AF8F (gallery_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture_keywords (picture_id INT NOT NULL, keywords_id INT NOT NULL, INDEX IDX_C29F2052EE45BDBF (picture_id), INDEX IDX_C29F20526205D0B8 (keywords_id), PRIMARY KEY(picture_id, keywords_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, status_users VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C382AB610 FOREIGN KEY (picture_id_picture_id) REFERENCES picture (id)');
        $this->addSql('ALTER TABLE gallery_user ADD CONSTRAINT FK_1E8CFEC54E7AF8F FOREIGN KEY (gallery_id) REFERENCES gallery (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gallery_user ADD CONSTRAINT FK_1E8CFEC5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gallery_keywords ADD CONSTRAINT FK_9FD267E54E7AF8F FOREIGN KEY (gallery_id) REFERENCES gallery (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gallery_keywords ADD CONSTRAINT FK_9FD267E56205D0B8 FOREIGN KEY (keywords_id) REFERENCES keywords (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F894E7AF8F FOREIGN KEY (gallery_id) REFERENCES gallery (id)');
        $this->addSql('ALTER TABLE picture_keywords ADD CONSTRAINT FK_C29F2052EE45BDBF FOREIGN KEY (picture_id) REFERENCES picture (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE picture_keywords ADD CONSTRAINT FK_C29F20526205D0B8 FOREIGN KEY (keywords_id) REFERENCES keywords (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gallery_user DROP FOREIGN KEY FK_1E8CFEC54E7AF8F');
        $this->addSql('ALTER TABLE gallery_keywords DROP FOREIGN KEY FK_9FD267E54E7AF8F');
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F894E7AF8F');
        $this->addSql('ALTER TABLE gallery_keywords DROP FOREIGN KEY FK_9FD267E56205D0B8');
        $this->addSql('ALTER TABLE picture_keywords DROP FOREIGN KEY FK_C29F20526205D0B8');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C382AB610');
        $this->addSql('ALTER TABLE picture_keywords DROP FOREIGN KEY FK_C29F2052EE45BDBF');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('ALTER TABLE gallery_user DROP FOREIGN KEY FK_1E8CFEC5A76ED395');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE gallery');
        $this->addSql('DROP TABLE gallery_user');
        $this->addSql('DROP TABLE gallery_keywords');
        $this->addSql('DROP TABLE keywords');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE picture_keywords');
        $this->addSql('DROP TABLE user');
    }
}
