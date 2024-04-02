<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240401193821 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appointment (id INT AUTO_INCREMENT NOT NULL, place VARCHAR(255) NOT NULL, scheduled_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE appointment_medical_report (appointment_id INT NOT NULL, medical_report_id INT NOT NULL, INDEX IDX_990CC263E5B533F9 (appointment_id), INDEX IDX_990CC263BEA1FA7A (medical_report_id), PRIMARY KEY(appointment_id, medical_report_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medical_report (id INT AUTO_INCREMENT NOT NULL, prescription_id INT DEFAULT NULL, medical_content LONGTEXT NOT NULL, attachements LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_AF71C02B93DB413D (prescription_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prescription (id INT AUTO_INCREMENT NOT NULL, prescription_content LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speciality (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(255) NOT NULL, speciality_name VARCHAR(150) NOT NULL, speciality_content LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_of_acts (id INT AUTO_INCREMENT NOT NULL, appointment_id INT NOT NULL, act_name VARCHAR(150) NOT NULL, price INT NOT NULL, INDEX IDX_E70941B1E5B533F9 (appointment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_medical_report (id INT AUTO_INCREMENT NOT NULL, id_user INT NOT NULL, id_medical_report INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_speciality (id INT AUTO_INCREMENT NOT NULL, id_user INT NOT NULL, idspeciality INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appointment_medical_report ADD CONSTRAINT FK_990CC263E5B533F9 FOREIGN KEY (appointment_id) REFERENCES appointment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE appointment_medical_report ADD CONSTRAINT FK_990CC263BEA1FA7A FOREIGN KEY (medical_report_id) REFERENCES medical_report (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medical_report ADD CONSTRAINT FK_AF71C02B93DB413D FOREIGN KEY (prescription_id) REFERENCES prescription (id)');
        $this->addSql('ALTER TABLE type_of_acts ADD CONSTRAINT FK_E70941B1E5B533F9 FOREIGN KEY (appointment_id) REFERENCES appointment (id)');
        $this->addSql('ALTER TABLE user ADD birth_date VARCHAR(255) DEFAULT NULL, ADD rppsnumber VARCHAR(255) DEFAULT NULL, ADD cv_user VARCHAR(255) DEFAULT NULL, CHANGE fone_user phone_number INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appointment_medical_report DROP FOREIGN KEY FK_990CC263E5B533F9');
        $this->addSql('ALTER TABLE appointment_medical_report DROP FOREIGN KEY FK_990CC263BEA1FA7A');
        $this->addSql('ALTER TABLE medical_report DROP FOREIGN KEY FK_AF71C02B93DB413D');
        $this->addSql('ALTER TABLE type_of_acts DROP FOREIGN KEY FK_E70941B1E5B533F9');
        $this->addSql('DROP TABLE appointment');
        $this->addSql('DROP TABLE appointment_medical_report');
        $this->addSql('DROP TABLE medical_report');
        $this->addSql('DROP TABLE prescription');
        $this->addSql('DROP TABLE speciality');
        $this->addSql('DROP TABLE type_of_acts');
        $this->addSql('DROP TABLE user_medical_report');
        $this->addSql('DROP TABLE user_speciality');
        $this->addSql('ALTER TABLE user DROP birth_date, DROP rppsnumber, DROP cv_user, CHANGE phone_number fone_user INT DEFAULT NULL');
    }
}
