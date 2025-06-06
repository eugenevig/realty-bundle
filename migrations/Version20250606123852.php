<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250606123852 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE attribute (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, input_type VARCHAR(50) NOT NULL, is_filterable TINYINT(1) DEFAULT 0 NOT NULL, sort_order INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE attribute_value (id INT AUTO_INCREMENT NOT NULL, attribute_id INT NOT NULL, real_estate_object_id INT NOT NULL, value VARCHAR(255) DEFAULT NULL, INDEX IDX_FE4FBB82B6E62EFA (attribute_id), INDEX IDX_FE4FBB82BD213A23 (real_estate_object_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE building (id INT AUTO_INCREMENT NOT NULL, internal_id VARCHAR(255) NOT NULL, external_id VARCHAR(255) DEFAULT NULL, section VARCHAR(255) NOT NULL, building_number VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, district VARCHAR(255) NOT NULL, street VARCHAR(255) NOT NULL, coordinates VARCHAR(255) DEFAULT NULL, building_type VARCHAR(255) DEFAULT NULL, year_built DATE DEFAULT NULL, planned_delivery_date DATE DEFAULT NULL, gallery JSON DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, real_estate_object_id INT NOT NULL, title VARCHAR(255) NOT NULL, file_path VARCHAR(255) NOT NULL, INDEX IDX_D8698A76BD213A23 (real_estate_object_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE listing_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE object_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, internal_id VARCHAR(255) NOT NULL, external_id VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, gallery JSON DEFAULT NULL, seo_title VARCHAR(255) DEFAULT NULL, seo_description LONGTEXT DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE real_estate_object (id INT AUTO_INCREMENT NOT NULL, external_id VARCHAR(255) DEFAULT NULL, internal_id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, object_id VARCHAR(255) NOT NULL, floor INT DEFAULT NULL, orientation JSON DEFAULT NULL, area_total DOUBLE PRECISION DEFAULT NULL, ceiling_height DOUBLE PRECISION DEFAULT NULL, price NUMERIC(10, 2) DEFAULT NULL, price_per_sqm NUMERIC(10, 2) DEFAULT NULL, discount NUMERIC(10, 2) DEFAULT NULL, discount_valid_until DATETIME DEFAULT NULL, currency VARCHAR(10) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE renovation_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE room (id INT AUTO_INCREMENT NOT NULL, real_estate_object_id INT NOT NULL, room_definition_id INT NOT NULL, custom_name VARCHAR(255) DEFAULT NULL, area DOUBLE PRECISION DEFAULT NULL, gallery JSON DEFAULT NULL, INDEX IDX_729F519BBD213A23 (real_estate_object_id), INDEX IDX_729F519BB8AE19F7 (room_definition_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE room_definition (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, has_gallery TINYINT(1) DEFAULT 1 NOT NULL, has_area TINYINT(1) DEFAULT 1 NOT NULL, sort_order INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE attribute_value ADD CONSTRAINT FK_FE4FBB82B6E62EFA FOREIGN KEY (attribute_id) REFERENCES attribute (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE attribute_value ADD CONSTRAINT FK_FE4FBB82BD213A23 FOREIGN KEY (real_estate_object_id) REFERENCES real_estate_object (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE document ADD CONSTRAINT FK_D8698A76BD213A23 FOREIGN KEY (real_estate_object_id) REFERENCES real_estate_object (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE room ADD CONSTRAINT FK_729F519BBD213A23 FOREIGN KEY (real_estate_object_id) REFERENCES real_estate_object (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE room ADD CONSTRAINT FK_729F519BB8AE19F7 FOREIGN KEY (room_definition_id) REFERENCES room_definition (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE attribute_value DROP FOREIGN KEY FK_FE4FBB82B6E62EFA
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE attribute_value DROP FOREIGN KEY FK_FE4FBB82BD213A23
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE document DROP FOREIGN KEY FK_D8698A76BD213A23
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE room DROP FOREIGN KEY FK_729F519BBD213A23
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE room DROP FOREIGN KEY FK_729F519BB8AE19F7
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE attribute
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE attribute_value
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE building
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE document
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE listing_type
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE object_type
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE project
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE real_estate_object
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE renovation_type
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE room
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE room_definition
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE status
        SQL);
    }
}
