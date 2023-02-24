<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230220114020 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ouvrage_auteur (ouvrage_id INT NOT NULL, auteur_id INT NOT NULL, INDEX IDX_3E39E6E815D884B5 (ouvrage_id), INDEX IDX_3E39E6E860BB6FE6 (auteur_id), PRIMARY KEY(ouvrage_id, auteur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ouvrage_auteur ADD CONSTRAINT FK_3E39E6E815D884B5 FOREIGN KEY (ouvrage_id) REFERENCES ouvrage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ouvrage_auteur ADD CONSTRAINT FK_3E39E6E860BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE exemplaire ADD ouvrage_id INT NOT NULL, ADD emprunteur_id INT NOT NULL, ADD bibliotheque_id INT NOT NULL');
        $this->addSql('ALTER TABLE exemplaire ADD CONSTRAINT FK_5EF83C9215D884B5 FOREIGN KEY (ouvrage_id) REFERENCES ouvrage (id)');
        $this->addSql('ALTER TABLE exemplaire ADD CONSTRAINT FK_5EF83C92F0840037 FOREIGN KEY (emprunteur_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE exemplaire ADD CONSTRAINT FK_5EF83C924419DE7D FOREIGN KEY (bibliotheque_id) REFERENCES bibliotheque (id)');
        $this->addSql('CREATE INDEX IDX_5EF83C9215D884B5 ON exemplaire (ouvrage_id)');
        $this->addSql('CREATE INDEX IDX_5EF83C92F0840037 ON exemplaire (emprunteur_id)');
        $this->addSql('CREATE INDEX IDX_5EF83C924419DE7D ON exemplaire (bibliotheque_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ouvrage_auteur DROP FOREIGN KEY FK_3E39E6E815D884B5');
        $this->addSql('ALTER TABLE ouvrage_auteur DROP FOREIGN KEY FK_3E39E6E860BB6FE6');
        $this->addSql('DROP TABLE ouvrage_auteur');
        $this->addSql('ALTER TABLE exemplaire DROP FOREIGN KEY FK_5EF83C9215D884B5');
        $this->addSql('ALTER TABLE exemplaire DROP FOREIGN KEY FK_5EF83C92F0840037');
        $this->addSql('ALTER TABLE exemplaire DROP FOREIGN KEY FK_5EF83C924419DE7D');
        $this->addSql('DROP INDEX IDX_5EF83C9215D884B5 ON exemplaire');
        $this->addSql('DROP INDEX IDX_5EF83C92F0840037 ON exemplaire');
        $this->addSql('DROP INDEX IDX_5EF83C924419DE7D ON exemplaire');
        $this->addSql('ALTER TABLE exemplaire DROP ouvrage_id, DROP emprunteur_id, DROP bibliotheque_id');
    }
}
