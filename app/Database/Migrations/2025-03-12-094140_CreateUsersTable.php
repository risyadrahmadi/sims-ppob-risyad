<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
{
    $this->forge->addField([
        'id' => ['type' => 'INT', 'auto_increment' => true],
        'name' => ['type' => 'VARCHAR', 'constraint' => '100'],
        'email' => ['type' => 'VARCHAR', 'constraint' => '100', 'unique' => true],
        'password' => ['type' => 'VARCHAR', 'constraint' => '255'],
        'balance' => ['type' => 'DECIMAL', 'constraint' => '10,2', 'default' => 0.00],
        'profile_picture' => ['type' => 'TEXT', 'null' => true],
        'created_at' => ['type' => 'DATETIME', 'null' => true],
        'updated_at' => ['type' => 'DATETIME', 'null' => true],
    ]);
    $this->forge->addPrimaryKey('id');
    $this->forge->createTable('users');
}

    public function down()
    {
        //
    }
}
