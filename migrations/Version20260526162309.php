<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260526162309 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reviews (id INT AUTO_INCREMENT NOT NULL, destination_id VARCHAR(50) NOT NULL, rating INT NOT NULL, comment LONGTEXT NOT NULL, created_at DATETIME NOT NULL, user_id INT NOT NULL, INDEX IDX_6970EB0FA76ED395 (user_id), INDEX idx_reviews_destination (destination_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, username VARCHAR(50) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE reviews ADD CONSTRAINT FK_6970EB0FA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY `comments_ibfk_1`');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY `comments_ibfk_2`');
        $this->addSql('ALTER TABLE destination_facts DROP FOREIGN KEY `destination_facts_ibfk_1`');
        $this->addSql('ALTER TABLE destination_sections DROP FOREIGN KEY `destination_sections_ibfk_1`');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE destinations');
        $this->addSql('DROP TABLE destination_facts');
        $this->addSql('DROP TABLE destination_sections');
        $this->addSql('DROP TABLE users');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, destination_id INT NOT NULL, username VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, content TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, created_at DATETIME DEFAULT \'current_timestamp()\' NOT NULL, INDEX destination_id (destination_id), INDEX username (username), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE destinations (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_general_ci`, title VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_general_ci`, hero_image VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_general_ci`, hero_tagline VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_general_ci`, quote_tagline VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_general_ci`, quote_text VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_general_ci`, UNIQUE INDEX slug (slug), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE destination_facts (id INT AUTO_INCREMENT NOT NULL, destination_id INT DEFAULT NULL, fact_title VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_general_ci`, fact_description TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, INDEX destination_id (destination_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE destination_sections (id INT AUTO_INCREMENT NOT NULL, destination_id INT DEFAULT NULL, section_title VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_general_ci`, section_text TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, image_url VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_general_ci`, is_reversed TINYINT DEFAULT 0, INDEX destination_id (destination_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE users (email VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_general_ci`, fullname VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_general_ci`, UNIQUE INDEX email (email), PRIMARY KEY (fullname)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (destination_id) REFERENCES destinations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (username) REFERENCES users (fullname) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE destination_facts ADD CONSTRAINT `destination_facts_ibfk_1` FOREIGN KEY (destination_id) REFERENCES destinations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE destination_sections ADD CONSTRAINT `destination_sections_ibfk_1` FOREIGN KEY (destination_id) REFERENCES destinations (id)');
        $this->addSql('ALTER TABLE reviews DROP FOREIGN KEY FK_6970EB0FA76ED395');
        $this->addSql('DROP TABLE reviews');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
