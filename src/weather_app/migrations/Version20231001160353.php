<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231001160353 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE weather_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE weather (id BIGINT NOT NULL, time TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, location TEXT NOT NULL, temperature_temperature DOUBLE PRECISION NOT NULL, temperature_unit VARCHAR(2) NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE weather_seq CASCADE');
        $this->addSql('DROP TABLE weather');
    }
}
