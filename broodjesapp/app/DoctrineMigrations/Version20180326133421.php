<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180326133421 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bestelling (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, userId INT NOT NULL, datum DATETIME NOT NULL, soep TINYINT(1) NOT NULL, soepbroodWit TINYINT(1) NOT NULL, INDEX IDX_3114F8A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE soep (id INT AUTO_INCREMENT NOT NULL, soep VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE supplement (id INT AUTO_INCREMENT NOT NULL, Supplement VARCHAR(255) NOT NULL, Prijs NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brood (id INT AUTO_INCREMENT NOT NULL, beleg_id INT DEFAULT NULL, isGroot TINYINT(1) NOT NULL, isWit TINYINT(1) NOT NULL, opmerking LONGTEXT NOT NULL, INDEX IDX_FD7E5133F77FF69 (beleg_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE broodje_supplement (brood_id INT NOT NULL, supplement_id INT NOT NULL, INDEX IDX_8C2BCBE6439F98C8 (brood_id), INDEX IDX_8C2BCBE67793FA21 (supplement_id), PRIMARY KEY(brood_id, supplement_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bestelling_broodje (brood_id INT NOT NULL, bestelling_id INT NOT NULL, INDEX IDX_56EDDEE0439F98C8 (brood_id), INDEX IDX_56EDDEE0A2E63037 (bestelling_id), PRIMARY KEY(brood_id, bestelling_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, naam VARCHAR(255) NOT NULL, voornaam VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, potje INT NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE beleg (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, prijsKlein NUMERIC(10, 2) NOT NULL, prijsGroot NUMERIC(10, 2) NOT NULL, naam VARCHAR(255) NOT NULL, omschrijving LONGTEXT NOT NULL, INDEX IDX_A3B98D5C12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bestelling ADD CONSTRAINT FK_3114F8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE brood ADD CONSTRAINT FK_FD7E5133F77FF69 FOREIGN KEY (beleg_id) REFERENCES beleg (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE broodje_supplement ADD CONSTRAINT FK_8C2BCBE6439F98C8 FOREIGN KEY (brood_id) REFERENCES brood (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE broodje_supplement ADD CONSTRAINT FK_8C2BCBE67793FA21 FOREIGN KEY (supplement_id) REFERENCES supplement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bestelling_broodje ADD CONSTRAINT FK_56EDDEE0439F98C8 FOREIGN KEY (brood_id) REFERENCES brood (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bestelling_broodje ADD CONSTRAINT FK_56EDDEE0A2E63037 FOREIGN KEY (bestelling_id) REFERENCES bestelling (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE beleg ADD CONSTRAINT FK_A3B98D5C12469DE2 FOREIGN KEY (category_id) REFERENCES categorie (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bestelling_broodje DROP FOREIGN KEY FK_56EDDEE0A2E63037');
        $this->addSql('ALTER TABLE beleg DROP FOREIGN KEY FK_A3B98D5C12469DE2');
        $this->addSql('ALTER TABLE broodje_supplement DROP FOREIGN KEY FK_8C2BCBE67793FA21');
        $this->addSql('ALTER TABLE broodje_supplement DROP FOREIGN KEY FK_8C2BCBE6439F98C8');
        $this->addSql('ALTER TABLE bestelling_broodje DROP FOREIGN KEY FK_56EDDEE0439F98C8');
        $this->addSql('ALTER TABLE bestelling DROP FOREIGN KEY FK_3114F8A76ED395');
        $this->addSql('ALTER TABLE brood DROP FOREIGN KEY FK_FD7E5133F77FF69');
        $this->addSql('DROP TABLE bestelling');
        $this->addSql('DROP TABLE soep');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE supplement');
        $this->addSql('DROP TABLE brood');
        $this->addSql('DROP TABLE broodje_supplement');
        $this->addSql('DROP TABLE bestelling_broodje');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE beleg');
    }
}
