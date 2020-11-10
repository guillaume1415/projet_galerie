<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201110100835 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gallery DROP FOREIGN KEY FK_472B783A2993F28A');
        $this->addSql('DROP INDEX IDX_472B783A2993F28A ON gallery');
        $this->addSql('ALTER TABLE gallery DROP gallery_has_user_id');
        $this->addSql('ALTER TABLE gallery_has_user ADD user_id INT DEFAULT NULL, ADD gallery_id INT DEFAULT NULL, CHANGE status_users status_user VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE gallery_has_user ADD CONSTRAINT FK_E542DFADA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE gallery_has_user ADD CONSTRAINT FK_E542DFAD4E7AF8F FOREIGN KEY (gallery_id) REFERENCES gallery (id)');
        $this->addSql('CREATE INDEX IDX_E542DFADA76ED395 ON gallery_has_user (user_id)');
        $this->addSql('CREATE INDEX IDX_E542DFAD4E7AF8F ON gallery_has_user (gallery_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6492993F28A');
        $this->addSql('DROP INDEX IDX_8D93D6492993F28A ON user');
        $this->addSql('ALTER TABLE user DROP gallery_has_user_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gallery ADD gallery_has_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE gallery ADD CONSTRAINT FK_472B783A2993F28A FOREIGN KEY (gallery_has_user_id) REFERENCES gallery_has_user (id)');
        $this->addSql('CREATE INDEX IDX_472B783A2993F28A ON gallery (gallery_has_user_id)');
        $this->addSql('ALTER TABLE gallery_has_user DROP FOREIGN KEY FK_E542DFADA76ED395');
        $this->addSql('ALTER TABLE gallery_has_user DROP FOREIGN KEY FK_E542DFAD4E7AF8F');
        $this->addSql('DROP INDEX IDX_E542DFADA76ED395 ON gallery_has_user');
        $this->addSql('DROP INDEX IDX_E542DFAD4E7AF8F ON gallery_has_user');
        $this->addSql('ALTER TABLE gallery_has_user DROP user_id, DROP gallery_id, CHANGE status_user status_users VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user ADD gallery_has_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6492993F28A FOREIGN KEY (gallery_has_user_id) REFERENCES gallery_has_user (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6492993F28A ON user (gallery_has_user_id)');
    }
}
