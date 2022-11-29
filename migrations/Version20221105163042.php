<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221105163042 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vehiculo (id INT AUTO_INCREMENT NOT NULL, detalle_id INT NOT NULL, matricula VARCHAR(8) NOT NULL, UNIQUE INDEX UNIQ_C9FA16039EA59ED2 (detalle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehiculo_estado_vehiculo (vehiculo_id INT NOT NULL, estado_vehiculo_id INT NOT NULL, INDEX IDX_2BDE852525F7D575 (vehiculo_id), INDEX IDX_2BDE85251FFB3C25 (estado_vehiculo_id), PRIMARY KEY(vehiculo_id, estado_vehiculo_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vehiculo ADD CONSTRAINT FK_C9FA16039EA59ED2 FOREIGN KEY (detalle_id) REFERENCES detalle_vehiculo (id)');
        $this->addSql('ALTER TABLE vehiculo_estado_vehiculo ADD CONSTRAINT FK_2BDE852525F7D575 FOREIGN KEY (vehiculo_id) REFERENCES vehiculo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vehiculo_estado_vehiculo ADD CONSTRAINT FK_2BDE85251FFB3C25 FOREIGN KEY (estado_vehiculo_id) REFERENCES estado_vehiculo (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehiculo_estado_vehiculo DROP FOREIGN KEY FK_2BDE852525F7D575');
        $this->addSql('DROP TABLE vehiculo');
        $this->addSql('DROP TABLE vehiculo_estado_vehiculo');
    }
}
