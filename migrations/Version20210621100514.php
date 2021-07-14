<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210621100514 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article_keyword (article_id INT NOT NULL, keyword_id INT NOT NULL, PRIMARY KEY(article_id, keyword_id))');
        $this->addSql('CREATE INDEX IDX_B741358C7294869C ON article_keyword (article_id)');
        $this->addSql('CREATE INDEX IDX_B741358C115D4552 ON article_keyword (keyword_id)');
        $this->addSql('ALTER TABLE article_keyword ADD CONSTRAINT FK_B741358C7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE article_keyword ADD CONSTRAINT FK_B741358C115D4552 FOREIGN KEY (keyword_id) REFERENCES keyword (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE article_keyword');
    }
}
