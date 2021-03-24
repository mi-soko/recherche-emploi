<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210324043021 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE offer (id BIGINT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_offer (offer_id BIGINT NOT NULL, skills_id BIGINT NOT NULL, INDEX IDX_CFE140253C674EE (offer_id), INDEX IDX_CFE14027FF61858 (skills_id), PRIMARY KEY(offer_id, skills_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jobseeker_offer (offer_id BIGINT NOT NULL, jobseeker_id BIGINT NOT NULL, INDEX IDX_2C7B733753C674EE (offer_id), INDEX IDX_2C7B73374CF2B5A9 (jobseeker_id), PRIMARY KEY(offer_id, jobseeker_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skills (id BIGINT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id BIGINT AUTO_INCREMENT NOT NULL, full_name VARCHAR(70) NOT NULL, phone_number VARCHAR(20) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, discr VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE skill_offer ADD CONSTRAINT FK_CFE140253C674EE FOREIGN KEY (offer_id) REFERENCES offer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_offer ADD CONSTRAINT FK_CFE14027FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jobseeker_offer ADD CONSTRAINT FK_2C7B733753C674EE FOREIGN KEY (offer_id) REFERENCES offer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jobseeker_offer ADD CONSTRAINT FK_2C7B73374CF2B5A9 FOREIGN KEY (jobseeker_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skill_offer DROP FOREIGN KEY FK_CFE140253C674EE');
        $this->addSql('ALTER TABLE jobseeker_offer DROP FOREIGN KEY FK_2C7B733753C674EE');
        $this->addSql('ALTER TABLE skill_offer DROP FOREIGN KEY FK_CFE14027FF61858');
        $this->addSql('ALTER TABLE jobseeker_offer DROP FOREIGN KEY FK_2C7B73374CF2B5A9');
        $this->addSql('DROP TABLE offer');
        $this->addSql('DROP TABLE skill_offer');
        $this->addSql('DROP TABLE jobseeker_offer');
        $this->addSql('DROP TABLE skills');
        $this->addSql('DROP TABLE user');
    }
}
