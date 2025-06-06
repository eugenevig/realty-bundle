<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250606140228 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE building ADD project_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE building ADD CONSTRAINT FK_E16F61D4166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_E16F61D4166D1F9C ON building (project_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE real_estate_object ADD building_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE real_estate_object ADD CONSTRAINT FK_4F1DF1F4D2A7E12 FOREIGN KEY (building_id) REFERENCES building (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_4F1DF1F4D2A7E12 ON real_estate_object (building_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE real_estate_object DROP FOREIGN KEY FK_4F1DF1F4D2A7E12
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_4F1DF1F4D2A7E12 ON real_estate_object
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE real_estate_object DROP building_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE building DROP FOREIGN KEY FK_E16F61D4166D1F9C
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_E16F61D4166D1F9C ON building
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE building DROP project_id
        SQL);
    }
}
