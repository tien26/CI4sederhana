<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'constraint'     => 11,
                                'unsigned'       => true,
                                'auto_increment' => true,
                        ],
                        'nama'       => [
                                'type'       => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'username' => [
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'password' => [
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'alamat' => [
                                'type' => 'text'
                        ],
                        'role_id' => [
                                'type' => 'INT',
                                'constraint' => '1',
                        ],
                        'created_at' => [
                                'type'=> 'DATETIME'
                        ],
                        'updated_at' => [
                                'type'=> 'DATETIME'
                        ]
                ]);
                $this->forge->addKey('id', true);
                $this->forge->createTable('users');
        }

        public function down()
        {
                $this->forge->dropTable('users');
        }
}
