<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddMigrationTimeToTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn("article",[
            "created_at"=> [
                "type"=> "DATETIME",
                "null"=> true,
            ],
            "updated_at"=> [
                "type"=> "DATETIME",
                "null"=> true,
            ]
            ]);
            $this->forge->addKey("created_at");
            $this->forge->processIndexes("article");
    }

    public function down()
    {
        $this->forge->dropColumn("article","created_at");
        $this->forge->dropColumn("article","updated_at");
    }
}
