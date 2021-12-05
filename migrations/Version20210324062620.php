<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210324062620 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id BIGINT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id BIGINT AUTO_INCREMENT NOT NULL, job_seeker_id BIGINT DEFAULT NULL, description LONGTEXT NOT NULL, started_at DATETIME NOT NULL, finished_at DATETIME NOT NULL, INDEX IDX_590C103C2C5BAA3 (job_seeker_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offer (id BIGINT AUTO_INCREMENT NOT NULL, compagnie_id BIGINT DEFAULT NULL, categories_id BIGINT DEFAULT NULL, job_description LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_29D6873E52FBE437 (compagnie_id), INDEX IDX_29D6873EA21214B7 (categories_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_offer (offer_id BIGINT NOT NULL, skills_id BIGINT NOT NULL, INDEX IDX_CFE140253C674EE (offer_id), INDEX IDX_CFE14027FF61858 (skills_id), PRIMARY KEY(offer_id, skills_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jobseeker_offer (offer_id BIGINT NOT NULL, jobseeker_id BIGINT NOT NULL, INDEX IDX_2C7B733753C674EE (offer_id), INDEX IDX_2C7B73374CF2B5A9 (jobseeker_id), PRIMARY KEY(offer_id, jobseeker_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_job (id INT AUTO_INCREMENT NOT NULL, offer_id BIGINT NOT NULL, skills_id BIGINT NOT NULL, posted_at DATETIME NOT NULL, INDEX IDX_88B2D1653C674EE (offer_id), INDEX IDX_88B2D167FF61858 (skills_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skills (id BIGINT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skills_jobseeker (skills_id BIGINT NOT NULL, jobseeker_id BIGINT NOT NULL, INDEX IDX_DCAABB607FF61858 (skills_id), INDEX IDX_DCAABB604CF2B5A9 (jobseeker_id), PRIMARY KEY(skills_id, jobseeker_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id BIGINT AUTO_INCREMENT NOT NULL, category_id BIGINT DEFAULT NULL, full_name VARCHAR(70) NOT NULL, phone_number VARCHAR(20) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, discr VARCHAR(255) NOT NULL, INDEX IDX_8D93D64912469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C103C2C5BAA3 FOREIGN KEY (job_seeker_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E52FBE437 FOREIGN KEY (compagnie_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873EA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE skill_offer ADD CONSTRAINT FK_CFE140253C674EE FOREIGN KEY (offer_id) REFERENCES offer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_offer ADD CONSTRAINT FK_CFE14027FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jobseeker_offer ADD CONSTRAINT FK_2C7B733753C674EE FOREIGN KEY (offer_id) REFERENCES offer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jobseeker_offer ADD CONSTRAINT FK_2C7B73374CF2B5A9 FOREIGN KEY (jobseeker_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_job ADD CONSTRAINT FK_88B2D1653C674EE FOREIGN KEY (offer_id) REFERENCES offer (id)');
        $this->addSql('ALTER TABLE skill_job ADD CONSTRAINT FK_88B2D167FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id)');
        $this->addSql('ALTER TABLE skills_jobseeker ADD CONSTRAINT FK_DCAABB607FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skills_jobseeker ADD CONSTRAINT FK_DCAABB604CF2B5A9 FOREIGN KEY (jobseeker_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64912469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873EA21214B7');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64912469DE2');
        $this->addSql('ALTER TABLE skill_offer DROP FOREIGN KEY FK_CFE140253C674EE');
        $this->addSql('ALTER TABLE jobseeker_offer DROP FOREIGN KEY FK_2C7B733753C674EE');
        $this->addSql('ALTER TABLE skill_job DROP FOREIGN KEY FK_88B2D1653C674EE');
        $this->addSql('ALTER TABLE skill_offer DROP FOREIGN KEY FK_CFE14027FF61858');
        $this->addSql('ALTER TABLE skill_job DROP FOREIGN KEY FK_88B2D167FF61858');
        $this->addSql('ALTER TABLE skills_jobseeker DROP FOREIGN KEY FK_DCAABB607FF61858');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C103C2C5BAA3');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E52FBE437');
        $this->addSql('ALTER TABLE jobseeker_offer DROP FOREIGN KEY FK_2C7B73374CF2B5A9');
        $this->addSql('ALTER TABLE skills_jobseeker DROP FOREIGN KEY FK_DCAABB604CF2B5A9');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE offer');
        $this->addSql('DROP TABLE skill_offer');
        $this->addSql('DROP TABLE jobseeker_offer');
        $this->addSql('DROP TABLE skill_job');
        $this->addSql('DROP TABLE skills');
        $this->addSql('DROP TABLE skills_jobseeker');
        $this->addSql('DROP TABLE user');
    }
}
