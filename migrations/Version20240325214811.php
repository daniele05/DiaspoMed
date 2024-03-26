<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240325214811 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE doctor_user_medical_report (doctor_user_id INT NOT NULL, medical_report_id INT NOT NULL, INDEX IDX_4425A52734C3B038 (doctor_user_id), INDEX IDX_4425A527BEA1FA7A (medical_report_id), PRIMARY KEY(doctor_user_id, medical_report_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE doctor_user_medical_report ADD CONSTRAINT FK_4425A52734C3B038 FOREIGN KEY (doctor_user_id) REFERENCES doctor_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE doctor_user_medical_report ADD CONSTRAINT FK_4425A527BEA1FA7A FOREIGN KEY (medical_report_id) REFERENCES medical_report (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE appointment ADD medical_report_id INT DEFAULT NULL, ADD patient_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F844BEA1FA7A FOREIGN KEY (medical_report_id) REFERENCES medical_report (id)');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F844FA0D867E FOREIGN KEY (patient_user_id) REFERENCES patient_user (id)');
        $this->addSql('CREATE INDEX IDX_FE38F844BEA1FA7A ON appointment (medical_report_id)');
        $this->addSql('CREATE INDEX IDX_FE38F844FA0D867E ON appointment (patient_user_id)');
        $this->addSql('ALTER TABLE medical_report ADD prescription_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE medical_report ADD CONSTRAINT FK_AF71C02B93DB413D FOREIGN KEY (prescription_id) REFERENCES prescription (id)');
        $this->addSql('CREATE INDEX IDX_AF71C02B93DB413D ON medical_report (prescription_id)');
        $this->addSql('ALTER TABLE speciality ADD id_speciality_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE speciality ADD CONSTRAINT FK_F3D7A08E8572D9B2 FOREIGN KEY (id_speciality_id) REFERENCES doctor_user (id)');
        $this->addSql('CREATE INDEX IDX_F3D7A08E8572D9B2 ON speciality (id_speciality_id)');
        $this->addSql('ALTER TABLE type_of_acts ADD appointment_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE type_of_acts ADD CONSTRAINT FK_E70941B1E5B533F9 FOREIGN KEY (appointment_id) REFERENCES appointment (id)');
        $this->addSql('CREATE INDEX IDX_E70941B1E5B533F9 ON type_of_acts (appointment_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE doctor_user_medical_report DROP FOREIGN KEY FK_4425A52734C3B038');
        $this->addSql('ALTER TABLE doctor_user_medical_report DROP FOREIGN KEY FK_4425A527BEA1FA7A');
        $this->addSql('DROP TABLE doctor_user_medical_report');
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F844BEA1FA7A');
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F844FA0D867E');
        $this->addSql('DROP INDEX IDX_FE38F844BEA1FA7A ON appointment');
        $this->addSql('DROP INDEX IDX_FE38F844FA0D867E ON appointment');
        $this->addSql('ALTER TABLE appointment DROP medical_report_id, DROP patient_user_id');
        $this->addSql('ALTER TABLE medical_report DROP FOREIGN KEY FK_AF71C02B93DB413D');
        $this->addSql('DROP INDEX IDX_AF71C02B93DB413D ON medical_report');
        $this->addSql('ALTER TABLE medical_report DROP prescription_id');
        $this->addSql('ALTER TABLE speciality DROP FOREIGN KEY FK_F3D7A08E8572D9B2');
        $this->addSql('DROP INDEX IDX_F3D7A08E8572D9B2 ON speciality');
        $this->addSql('ALTER TABLE speciality DROP id_speciality_id');
        $this->addSql('ALTER TABLE type_of_acts DROP FOREIGN KEY FK_E70941B1E5B533F9');
        $this->addSql('DROP INDEX IDX_E70941B1E5B533F9 ON type_of_acts');
        $this->addSql('ALTER TABLE type_of_acts DROP appointment_id');
    }
}
