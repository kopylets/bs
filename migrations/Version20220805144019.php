<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220805144019 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contact (id INT NOT NULL, telegram_id INT NOT NULL, name VARCHAR(30) NOT NULL, surname VARCHAR(30) DEFAULT NULL, phone VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE contract_country (id INT NOT NULL, code VARCHAR(100) NOT NULL, active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE contract_language (id INT NOT NULL, code VARCHAR(30) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE contractor (id INT NOT NULL, team_id INT DEFAULT NULL, manager_id INT NOT NULL, interface_language_id INT NOT NULL, primary_contract_language_id INT NOT NULL, primary_contract_country_id INT NOT NULL, location_id INT DEFAULT NULL, telegram_id INT DEFAULT NULL, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, patronymic VARCHAR(30) NOT NULL, email VARCHAR(100) NOT NULL, phone VARCHAR(30) NOT NULL, status INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_437BD2EF296CD8AE ON contractor (team_id)');
        $this->addSql('CREATE INDEX IDX_437BD2EF783E3463 ON contractor (manager_id)');
        $this->addSql('CREATE INDEX IDX_437BD2EF590AB055 ON contractor (interface_language_id)');
        $this->addSql('CREATE INDEX IDX_437BD2EF16FA5288 ON contractor (primary_contract_language_id)');
        $this->addSql('CREATE INDEX IDX_437BD2EF96FCC6F9 ON contractor (primary_contract_country_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_437BD2EF64D218E ON contractor (location_id)');
        $this->addSql('CREATE TABLE contractors_contract_languages (contractor_id INT NOT NULL, contract_language_id INT NOT NULL, PRIMARY KEY(contractor_id, contract_language_id))');
        $this->addSql('CREATE INDEX IDX_2AD018F4B0265DC7 ON contractors_contract_languages (contractor_id)');
        $this->addSql('CREATE INDEX IDX_2AD018F4C05A6339 ON contractors_contract_languages (contract_language_id)');
        $this->addSql('CREATE TABLE contractor_team (id INT NOT NULL, leader_id INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3CEC6C6F73154ED4 ON contractor_team (leader_id)');
        $this->addSql('CREATE TABLE file (id INT NOT NULL, path VARCHAR(10000) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE interface_language (id INT NOT NULL, code VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE location (id INT NOT NULL, latitude NUMERIC(11, 8) NOT NULL, longitude NUMERIC(11, 8) NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE manager (id INT NOT NULL, telegram_id INT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE manager_communicate_request (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE resume (id INT NOT NULL, contractor_id INT DEFAULT NULL, type_id INT DEFAULT NULL, condition_id INT DEFAULT NULL, status INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_60C1D0A0B0265DC7 ON resume (contractor_id)');
        $this->addSql('CREATE INDEX IDX_60C1D0A0C54C8C93 ON resume (type_id)');
        $this->addSql('CREATE INDEX IDX_60C1D0A0887793B6 ON resume (condition_id)');
        $this->addSql('CREATE TABLE resume_condition (id INT NOT NULL, resume_type_id INT DEFAULT NULL, active BOOLEAN NOT NULL, rank INT NOT NULL, block BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_70AF69FAF30C337B ON resume_condition (resume_type_id)');
        $this->addSql('CREATE TABLE resume_condition_history_entry (id INT NOT NULL, old_condition_id INT DEFAULT NULL, new_condition_id INT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1BC4FA2914F2FA40 ON resume_condition_history_entry (old_condition_id)');
        $this->addSql('CREATE INDEX IDX_1BC4FA29D63B6509 ON resume_condition_history_entry (new_condition_id)');
        $this->addSql('CREATE TABLE resume_field (id INT NOT NULL, resume_type_id INT NOT NULL, required BOOLEAN NOT NULL, multiple BOOLEAN NOT NULL, mask VARCHAR(255) DEFAULT NULL, rank INT NOT NULL, public BOOLEAN NOT NULL, active BOOLEAN NOT NULL, type INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C7028530F30C337B ON resume_field (resume_type_id)');
        $this->addSql('CREATE TABLE resume_field_option (id INT NOT NULL, field_id INT NOT NULL, active BOOLEAN NOT NULL, rank INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D4F142D5443707B0 ON resume_field_option (field_id)');
        $this->addSql('CREATE TABLE resume_field_value (id INT NOT NULL, field_id INT DEFAULT NULL, resume_id INT DEFAULT NULL, option_id INT DEFAULT NULL, location_id INT DEFAULT NULL, contact_id INT DEFAULT NULL, file_id INT DEFAULT NULL, value VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D4DAC4A9443707B0 ON resume_field_value (field_id)');
        $this->addSql('CREATE INDEX IDX_D4DAC4A9D262AF09 ON resume_field_value (resume_id)');
        $this->addSql('CREATE INDEX IDX_D4DAC4A9A7C41D6F ON resume_field_value (option_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D4DAC4A964D218E ON resume_field_value (location_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D4DAC4A9E7A1254A ON resume_field_value (contact_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D4DAC4A993CB796C ON resume_field_value (file_id)');
        $this->addSql('CREATE TABLE resume_type (id INT NOT NULL, code VARCHAR(100) NOT NULL, active BOOLEAN NOT NULL, rank INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE contractor ADD CONSTRAINT FK_437BD2EF296CD8AE FOREIGN KEY (team_id) REFERENCES contractor_team (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contractor ADD CONSTRAINT FK_437BD2EF783E3463 FOREIGN KEY (manager_id) REFERENCES manager (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contractor ADD CONSTRAINT FK_437BD2EF590AB055 FOREIGN KEY (interface_language_id) REFERENCES interface_language (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contractor ADD CONSTRAINT FK_437BD2EF16FA5288 FOREIGN KEY (primary_contract_language_id) REFERENCES contract_language (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contractor ADD CONSTRAINT FK_437BD2EF96FCC6F9 FOREIGN KEY (primary_contract_country_id) REFERENCES contract_country (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contractor ADD CONSTRAINT FK_437BD2EF64D218E FOREIGN KEY (location_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contractors_contract_languages ADD CONSTRAINT FK_2AD018F4B0265DC7 FOREIGN KEY (contractor_id) REFERENCES contractor (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contractors_contract_languages ADD CONSTRAINT FK_2AD018F4C05A6339 FOREIGN KEY (contract_language_id) REFERENCES contract_language (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contractor_team ADD CONSTRAINT FK_3CEC6C6F73154ED4 FOREIGN KEY (leader_id) REFERENCES contractor (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE resume ADD CONSTRAINT FK_60C1D0A0B0265DC7 FOREIGN KEY (contractor_id) REFERENCES contractor (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE resume ADD CONSTRAINT FK_60C1D0A0C54C8C93 FOREIGN KEY (type_id) REFERENCES resume_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE resume ADD CONSTRAINT FK_60C1D0A0887793B6 FOREIGN KEY (condition_id) REFERENCES resume_condition (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE resume_condition ADD CONSTRAINT FK_70AF69FAF30C337B FOREIGN KEY (resume_type_id) REFERENCES resume_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE resume_condition_history_entry ADD CONSTRAINT FK_1BC4FA2914F2FA40 FOREIGN KEY (old_condition_id) REFERENCES resume_condition (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE resume_condition_history_entry ADD CONSTRAINT FK_1BC4FA29D63B6509 FOREIGN KEY (new_condition_id) REFERENCES resume_condition (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE resume_field ADD CONSTRAINT FK_C7028530F30C337B FOREIGN KEY (resume_type_id) REFERENCES resume_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE resume_field_option ADD CONSTRAINT FK_D4F142D5443707B0 FOREIGN KEY (field_id) REFERENCES resume_field (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE resume_field_value ADD CONSTRAINT FK_D4DAC4A9443707B0 FOREIGN KEY (field_id) REFERENCES resume_field (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE resume_field_value ADD CONSTRAINT FK_D4DAC4A9D262AF09 FOREIGN KEY (resume_id) REFERENCES resume (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE resume_field_value ADD CONSTRAINT FK_D4DAC4A9A7C41D6F FOREIGN KEY (option_id) REFERENCES resume_field_option (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE resume_field_value ADD CONSTRAINT FK_D4DAC4A964D218E FOREIGN KEY (location_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE resume_field_value ADD CONSTRAINT FK_D4DAC4A9E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE resume_field_value ADD CONSTRAINT FK_D4DAC4A993CB796C FOREIGN KEY (file_id) REFERENCES file (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE resume_field_value DROP CONSTRAINT FK_D4DAC4A9E7A1254A');
        $this->addSql('ALTER TABLE contractor DROP CONSTRAINT FK_437BD2EF96FCC6F9');
        $this->addSql('ALTER TABLE contractor DROP CONSTRAINT FK_437BD2EF16FA5288');
        $this->addSql('ALTER TABLE contractors_contract_languages DROP CONSTRAINT FK_2AD018F4C05A6339');
        $this->addSql('ALTER TABLE contractors_contract_languages DROP CONSTRAINT FK_2AD018F4B0265DC7');
        $this->addSql('ALTER TABLE contractor_team DROP CONSTRAINT FK_3CEC6C6F73154ED4');
        $this->addSql('ALTER TABLE resume DROP CONSTRAINT FK_60C1D0A0B0265DC7');
        $this->addSql('ALTER TABLE contractor DROP CONSTRAINT FK_437BD2EF296CD8AE');
        $this->addSql('ALTER TABLE resume_field_value DROP CONSTRAINT FK_D4DAC4A993CB796C');
        $this->addSql('ALTER TABLE contractor DROP CONSTRAINT FK_437BD2EF590AB055');
        $this->addSql('ALTER TABLE contractor DROP CONSTRAINT FK_437BD2EF64D218E');
        $this->addSql('ALTER TABLE resume_field_value DROP CONSTRAINT FK_D4DAC4A964D218E');
        $this->addSql('ALTER TABLE contractor DROP CONSTRAINT FK_437BD2EF783E3463');
        $this->addSql('ALTER TABLE resume_field_value DROP CONSTRAINT FK_D4DAC4A9D262AF09');
        $this->addSql('ALTER TABLE resume DROP CONSTRAINT FK_60C1D0A0887793B6');
        $this->addSql('ALTER TABLE resume_condition_history_entry DROP CONSTRAINT FK_1BC4FA2914F2FA40');
        $this->addSql('ALTER TABLE resume_condition_history_entry DROP CONSTRAINT FK_1BC4FA29D63B6509');
        $this->addSql('ALTER TABLE resume_field_option DROP CONSTRAINT FK_D4F142D5443707B0');
        $this->addSql('ALTER TABLE resume_field_value DROP CONSTRAINT FK_D4DAC4A9443707B0');
        $this->addSql('ALTER TABLE resume_field_value DROP CONSTRAINT FK_D4DAC4A9A7C41D6F');
        $this->addSql('ALTER TABLE resume DROP CONSTRAINT FK_60C1D0A0C54C8C93');
        $this->addSql('ALTER TABLE resume_condition DROP CONSTRAINT FK_70AF69FAF30C337B');
        $this->addSql('ALTER TABLE resume_field DROP CONSTRAINT FK_C7028530F30C337B');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE contract_country');
        $this->addSql('DROP TABLE contract_language');
        $this->addSql('DROP TABLE contractor');
        $this->addSql('DROP TABLE contractors_contract_languages');
        $this->addSql('DROP TABLE contractor_team');
        $this->addSql('DROP TABLE file');
        $this->addSql('DROP TABLE interface_language');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE manager');
        $this->addSql('DROP TABLE manager_communicate_request');
        $this->addSql('DROP TABLE resume');
        $this->addSql('DROP TABLE resume_condition');
        $this->addSql('DROP TABLE resume_condition_history_entry');
        $this->addSql('DROP TABLE resume_field');
        $this->addSql('DROP TABLE resume_field_option');
        $this->addSql('DROP TABLE resume_field_value');
        $this->addSql('DROP TABLE resume_type');
    }
}
