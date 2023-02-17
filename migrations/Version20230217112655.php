<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230217112655 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE image_link_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE trick_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE image_link (id INT NOT NULL, trick_id INT NOT NULL, content VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C496736FB281BE2E ON image_link (trick_id)');
        $this->addSql('CREATE TABLE trick (id INT NOT NULL, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, trickgroup VARCHAR(255) NOT NULL, image_link VARCHAR(255) NOT NULL, video_link VARCHAR(255) NOT NULL, author VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, modifed_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, discussion_channel VARCHAR(255) NOT NULL, deleted BOOLEAN NOT NULL, slug VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D8F0A91E989D9B62 ON trick (slug)');
        $this->addSql('COMMENT ON COLUMN trick.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN trick.modifed_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE image_link ADD CONSTRAINT FK_C496736FB281BE2E FOREIGN KEY (trick_id) REFERENCES trick (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE image_link_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE trick_id_seq CASCADE');
        $this->addSql('ALTER TABLE image_link DROP CONSTRAINT FK_C496736FB281BE2E');
        $this->addSql('DROP TABLE image_link');
        $this->addSql('DROP TABLE trick');
    }
}
