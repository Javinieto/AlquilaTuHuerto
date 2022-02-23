<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220211131652 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE huerto CHANGE huerto_producto_id huerto_producto_id INT DEFAULT NULL, CHANGE id_usuario id_usuario INT DEFAULT NULL');
        $this->addSql('ALTER TABLE producto CHANGE huerto_producto_id huerto_producto_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE huerto CHANGE huerto_producto_id huerto_producto_id INT DEFAULT NULL, CHANGE id_usuario id_usuario INT DEFAULT NULL');
        $this->addSql('ALTER TABLE producto CHANGE huerto_producto_id huerto_producto_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
