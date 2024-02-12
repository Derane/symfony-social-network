<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240211130806 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE "user" (
    id SERIAL PRIMARY KEY,
    email VARCHAR(180) NOT NULL,
    roles JSONB NOT NULL,
    password VARCHAR(255) NOT NULL,
    UNIQUE (email))');
        $this->addSql('CREATE TABLE user_profile (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255),
    bio VARCHAR(1024),
    website_url VARCHAR(255),
    twitter_username VARCHAR(255),
    company VARCHAR(255),
    location VARCHAR(255),
    date_of_birth DATE
)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE user_profile');
    }
}
