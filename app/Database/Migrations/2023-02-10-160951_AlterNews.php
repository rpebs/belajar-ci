<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterNews extends Migration
{
    public function up()
    {
        $this->forge->addColumn('news', ['slug VARCHAR(100) unique']);
    }

    public function down()
    {
        $this->forge->dropColumn('news', 'slug');
    }
}
