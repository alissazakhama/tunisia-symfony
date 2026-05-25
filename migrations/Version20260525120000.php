<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260525120000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create reviews table for star ratings and comments on destinations';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE reviews (
            id INT AUTO_INCREMENT NOT NULL,
            destination_id VARCHAR(50) NOT NULL,
            user_id INT NOT NULL,
            rating INT NOT NULL,
            comment LONGTEXT NOT NULL,
            created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
            INDEX idx_reviews_destination (destination_id),
            INDEX IDX_697BEF1FA76ED395 (user_id),
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reviews ADD CONSTRAINT FK_697BEF1FA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE reviews DROP FOREIGN KEY FK_697BEF1FA76ED395');
        $this->addSql('DROP TABLE reviews');
    }
}
