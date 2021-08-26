<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
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
				'kd_product'       => [
						'type'       => 'VARCHAR',
						'constraint' => '50',
				],
				'nm_product' => [
						'type' => 'VARCHAR',
						'constraint' => '255',
				],
				'stok' => [
						'type' => 'INT',
						'constraint' => '11',
				],
				'kategori' => [
						'type' => 'VARCHAR',
						'constraint' => '255',
				],
				'harga' => [
						'type' => 'DOUBLE'
				],
				'gambar' => [
						'type' => 'VARCHAR',
						'constraint' => '255'
				],
				'created_at' => [
						'type'=> 'DATETIME'
				],
				'updated_at' => [
						'type'=> 'DATETIME'
				]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('product');
	}

	public function down()
	{
		//
	}
}
