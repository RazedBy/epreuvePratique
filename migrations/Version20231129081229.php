<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231129081229 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE indications_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE medecin_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE medicamen_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE prescription_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE indications (id INT NOT NULL, medicament_id INT DEFAULT NULL, prescription_id INT DEFAULT NULL, posologie VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_368D819AB0D61F7 ON indications (medicament_id)');
        $this->addSql('CREATE INDEX IDX_368D81993DB413D ON indications (prescription_id)');
        $this->addSql('CREATE TABLE medecin (id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE medicamen (id INT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE prescription (id INT NOT NULL, date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE indications ADD CONSTRAINT FK_368D819AB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicamen (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE indications ADD CONSTRAINT FK_368D81993DB413D FOREIGN KEY (prescription_id) REFERENCES prescription (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE indications_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE medecin_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE medicamen_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE prescription_id_seq CASCADE');
        $this->addSql('ALTER TABLE indications DROP CONSTRAINT FK_368D819AB0D61F7');
        $this->addSql('ALTER TABLE indications DROP CONSTRAINT FK_368D81993DB413D');
        $this->addSql('DROP TABLE indications');
        $this->addSql('DROP TABLE medecin');
        $this->addSql('DROP TABLE medicamen');
        $this->addSql('DROP TABLE prescription');
    }
}
