<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201110095550 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE gallery_has_user (id INT AUTO_INCREMENT NOT NULL, status_users VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE gallery ADD gallery_has_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE gallery ADD CONSTRAINT FK_472B783A2993F28A FOREIGN KEY (gallery_has_user_id) REFERENCES gallery_has_user (id)');
        $this->addSql('CREATE INDEX IDX_472B783A2993F28A ON gallery (gallery_has_user_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6499A72C43B');
        $this->addSql('DROP INDEX IDX_8D93D6499A72C43B ON user');
        $this->addSql('ALTER TABLE user DROP status_users, CHANGE gallerys_id gallery_has_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6492993F28A FOREIGN KEY (gallery_has_user_id) REFERENCES gallery_has_user (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6492993F28A ON user (gallery_has_user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gallery DROP FOREIGN KEY FK_472B783A2993F28A');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6492993F28A');
        $this->addSql('DROP TABLE gallery_has_user');
        $this->addSql('DROP INDEX IDX_472B783A2993F28A ON gallery');
        $this->addSql('ALTER TABLE gallery DROP gallery_has_user_id');
        $this->addSql('DROP INDEX IDX_8D93D6492993F28A ON user');
        $this->addSql('ALTER TABLE user ADD status_users VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE gallery_has_user_id gallerys_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6499A72C43B FOREIGN KEY (gallerys_id) REFERENCES gallery (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6499A72C43B ON user (gallerys_id)');
    }
}
