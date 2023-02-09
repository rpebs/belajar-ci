<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '255',

            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('admins', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('admins');
    }
}
