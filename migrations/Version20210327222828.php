<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210327222828 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE jobseeker_skills');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE jobseeker_skills (jobseeker_id BIGINT NOT NULL, skills_id BIGINT NOT NULL, INDEX IDX_ACE803207FF61858 (skills_id), INDEX IDX_ACE803204CF2B5A9 (jobseeker_id), PRIMARY KEY(jobseeker_id, skills_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE jobseeker_skills ADD CONSTRAINT FK_ACE803204CF2B5A9 FOREIGN KEY (jobseeker_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jobseeker_skills ADD CONSTRAINT FK_ACE803207FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id) ON DELETE CASCADE');
    }
}
