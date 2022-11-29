<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221105170821 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE balance (id INT AUTO_INCREMENT NOT NULL, vehiculo_id INT NOT NULL, movimiento_id INT NOT NULL, precio_compra DOUBLE PRECISION NOT NULL, precio_venta DOUBLE PRECISION NOT NULL, gastos DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_ACF41FFE25F7D575 (vehiculo_id), UNIQUE INDEX UNIQ_ACF41FFE58E7D5A2 (movimiento_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cita (id INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, vehiculo_id INT NOT NULL, fecha DATETIME NOT NULL, INDEX IDX_3E379A62DB38439E (usuario_id), INDEX IDX_3E379A6225F7D575 (vehiculo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, imagenes LONGBLOB NOT NULL, videos LONGBLOB NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movimiento (id INT AUTO_INCREMENT NOT NULL, tipo_id INT NOT NULL, oferta_id INT NOT NULL, INDEX IDX_C8FF107AA9276E6C (tipo_id), UNIQUE INDEX UNIQ_C8FF107AFAFBF624 (oferta_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oferta (id INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, vehiculo_id INT NOT NULL, cantidad DOUBLE PRECISION NOT NULL, INDEX IDX_7479C8F2DB38439E (usuario_id), INDEX IDX_7479C8F225F7D575 (vehiculo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE balance ADD CONSTRAINT FK_ACF41FFE25F7D575 FOREIGN KEY (vehiculo_id) REFERENCES vehiculo (id)');
        $this->addSql('ALTER TABLE balance ADD CONSTRAINT FK_ACF41FFE58E7D5A2 FOREIGN KEY (movimiento_id) REFERENCES movimiento (id)');
        $this->addSql('ALTER TABLE cita ADD CONSTRAINT FK_3E379A62DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE cita ADD CONSTRAINT FK_3E379A6225F7D575 FOREIGN KEY (vehiculo_id) REFERENCES vehiculo (id)');
        $this->addSql('ALTER TABLE movimiento ADD CONSTRAINT FK_C8FF107AA9276E6C FOREIGN KEY (tipo_id) REFERENCES tipo_movimiento (id)');
        $this->addSql('ALTER TABLE movimiento ADD CONSTRAINT FK_C8FF107AFAFBF624 FOREIGN KEY (oferta_id) REFERENCES oferta (id)');
        $this->addSql('ALTER TABLE oferta ADD CONSTRAINT FK_7479C8F2DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE oferta ADD CONSTRAINT FK_7479C8F225F7D575 FOREIGN KEY (vehiculo_id) REFERENCES vehiculo (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE balance DROP FOREIGN KEY FK_ACF41FFE58E7D5A2');
        $this->addSql('ALTER TABLE movimiento DROP FOREIGN KEY FK_C8FF107AFAFBF624');
        $this->addSql('DROP TABLE balance');
        $this->addSql('DROP TABLE cita');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE movimiento');
        $this->addSql('DROP TABLE oferta');
    }
}
