<?php

declare(strict_types=1);

/*
 * Appytrac API
 * (c) MesierAS <i@gobinath.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 *
 * Github : https://github.com/mesieras/appytrac-api
 */

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180225075440 extends AbstractMigration {
    public function up(Schema $schema) {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE dog (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(32) NOT NULL, type VARCHAR(32) DEFAULT NULL, age INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE dog');
    }
}
