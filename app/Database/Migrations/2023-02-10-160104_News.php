<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class News extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],

            'categories_id' => [
                'type' => 'INT',
                'null' => true,
                'unsigned' => true
            ],

            'author' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true

            ],
            'content' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'images' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('categories_id', 'categories', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('news', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('news');
    }
}
