<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220117124220 extends AbstractMigration
{
    public function getDescription(): stringx
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("insert into Huerto (id, name, image, size, disponibilidad) values (1, 'Emmy', 'https://static.diariofemenino.com/media/7515/huertoensuenos.jpg', 58, true)");
        $this->addSql("insert into Huerto (id, name, image, size, disponibilidad) values (2, 'Heriberto', 'https://static.diariofemenino.com/media/7515/huertoensuenos.jpg', 6, false)");
        $this->addSql("insert into Huerto (id, name, image, size, disponibilidad) values (3, 'Devland', 'https://static.diariofemenino.com/media/7515/huertoensuenos.jpg', 60, false)");
        $this->addSql("insert into Huerto (id, name, image, size, disponibilidad) values (4, 'Gretchen', 'https://static.diariofemenino.com/media/7515/huertoensuenos.jpg;', 30, false)");
        $this->addSql("insert into Huerto (id, name, image, size, disponibilidad) values (5, 'Dalli', 'https://static.diariofemenino.com/media/7515/huertoensuenos.jpg', 40, false)");
        $this->addSql("insert into Huerto (id, name, image, size, disponibilidad) values (6, 'Yasmeen', 'https://static.diariofemenino.com/media/7515/huertoensuenos.jpg', 92, false)");
        $this->addSql("insert into Huerto (id, name, image, size, disponibilidad) values (7, 'Corena', 'https://static.diariofemenino.com/media/7515/huertoensuenos.jpg', 27, true)");
        $this->addSql("insert into Huerto (id, name, image, size, disponibilidad) values (8, 'Ogdan', 'https://static.diariofemenino.com/media/7515/huertoensuenos.jpg', 22, true)");
        $this->addSql("insert into Huerto (id, name, image, size, disponibilidad) values (9, 'Bernadina', 'https://static.diariofemenino.com/media/7515/huertoensuenos.jpg', 69, false)");
        $this->addSql("insert into Huerto (id, name, image, size, disponibilidad) values (10, 'Austina', 'https://static.diariofemenino.com/media/7515/huertoensuenos.jpg', 40, false)");
        
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE huerto CHANGE id_usuario id_usuario INT DEFAULT NULL');
    }
}
