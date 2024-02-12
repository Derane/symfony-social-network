<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240212192902 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE user_id_seq1 CASCADE');
        $this->addSql('DROP SEQUENCE user_profile_id_seq1 CASCADE');
        $this->addSql('ALTER TABLE comment ADD author_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CF675F31B FOREIGN KEY (author_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9474526CF675F31B ON comment (author_id)');
        $this->addSql('ALTER TABLE micro_post ADD author_id INT NOT NULL');
        $this->addSql('ALTER TABLE micro_post ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE micro_post ALTER created DROP DEFAULT');
        $this->addSql('ALTER TABLE micro_post ADD CONSTRAINT FK_2AEFE017F675F31B FOREIGN KEY (author_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_2AEFE017F675F31B ON micro_post (author_id)');
        $this->addSql('ALTER TABLE "user" ALTER id DROP DEFAULT');
        $this->addSql('ALTER INDEX user_email_key RENAME TO UNIQ_8D93D649E7927C74');
        $this->addSql('ALTER TABLE user_profile ALTER id DROP DEFAULT');
        $this->addSql('ALTER INDEX uniq_d95ab40598771930 RENAME TO UNIQ_D95AB405A76ED395');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE user_id_seq1 INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_profile_id_seq1 INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('ALTER TABLE micro_post DROP CONSTRAINT FK_2AEFE017F675F31B');
        $this->addSql('DROP INDEX IDX_2AEFE017F675F31B');
        $this->addSql('ALTER TABLE micro_post DROP author_id');
        $this->addSql('CREATE SEQUENCE micro_post_id_seq');
        $this->addSql('SELECT setval(\'micro_post_id_seq\', (SELECT MAX(id) FROM micro_post))');
        $this->addSql('ALTER TABLE micro_post ALTER id SET DEFAULT nextval(\'micro_post_id_seq\')');
        $this->addSql('ALTER TABLE micro_post ALTER created SET DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526CF675F31B');
        $this->addSql('DROP INDEX IDX_9474526CF675F31B');
        $this->addSql('ALTER TABLE comment DROP author_id');
        $this->addSql('CREATE SEQUENCE user_id_seq');
        $this->addSql('SELECT setval(\'user_id_seq\', (SELECT MAX(id) FROM "user"))');
        $this->addSql('ALTER TABLE "user" ALTER id SET DEFAULT nextval(\'user_id_seq\')');
        $this->addSql('ALTER INDEX uniq_8d93d649e7927c74 RENAME TO user_email_key');
        $this->addSql('CREATE SEQUENCE user_profile_id_seq');
        $this->addSql('SELECT setval(\'user_profile_id_seq\', (SELECT MAX(id) FROM user_profile))');
        $this->addSql('ALTER TABLE user_profile ALTER id SET DEFAULT nextval(\'user_profile_id_seq\')');
        $this->addSql('ALTER INDEX uniq_d95ab405a76ed395 RENAME TO uniq_d95ab40598771930');
    }
}
