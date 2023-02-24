<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230223002842 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE auteur_ouvrage (auteur_id INT NOT NULL, ouvrage_id INT NOT NULL, INDEX IDX_EC8A08BD60BB6FE6 (auteur_id), INDEX IDX_EC8A08BD15D884B5 (ouvrage_id), PRIMARY KEY(auteur_id, ouvrage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE auteur_ouvrage ADD CONSTRAINT FK_EC8A08BD60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE auteur_ouvrage ADD CONSTRAINT FK_EC8A08BD15D884B5 FOREIGN KEY (ouvrage_id) REFERENCES ouvrage (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE auteur_ouvrage DROP FOREIGN KEY FK_EC8A08BD60BB6FE6');
        $this->addSql('ALTER TABLE auteur_ouvrage DROP FOREIGN KEY FK_EC8A08BD15D884B5');
        $this->addSql('DROP TABLE auteur_ouvrage');
    }
}
