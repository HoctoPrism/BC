<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210719105447 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product_order (id INT AUTO_INCREMENT NOT NULL, quantity INT NOT NULL, idProduct INT DEFAULT NULL, idOrder INT DEFAULT NULL, INDEX IDX_5475E8C4C3F36F5F (idProduct), INDEX IDX_5475E8C4E2EDD085 (idOrder), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_order ADD CONSTRAINT FK_5475E8C4C3F36F5F FOREIGN KEY (idProduct) REFERENCES product (idProduct)');
        $this->addSql('ALTER TABLE product_order ADD CONSTRAINT FK_5475E8C4E2EDD085 FOREIGN KEY (idOrder) REFERENCES orders (idOrder)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE product_order');
    }
}
