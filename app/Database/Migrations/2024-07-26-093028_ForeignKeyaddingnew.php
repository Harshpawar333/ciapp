<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ForeignKeyaddingnew extends Migration
{
    public function up()
    {
        $this->forge->addForeignKey("users_id", "users", "id", "CASCADE", "CASCADE", "article_users_id_fk");
        $this->forge->processIndexes("article");
    }

    public function down()
    {
        $this ->forge->dropForeignKey("article","article_users_id_fk");
        
    }
}
