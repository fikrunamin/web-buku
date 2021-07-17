<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Books extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'auto_increment' => true,
				'constraint' => '11',
			],
			'slug'  => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'judul'  => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'penulis'  => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'isi'  => [
				'type'       => 'text',
			],
			'sampul'  => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'views' => [
				'type'           => 'INT',
				'unsigned'       => true,
				'constraint' => '11',
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => true,
			],
			'updated_at' => [
				'type' => 'TIMESTAMP',
				'null' => true,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('books');
	}

	public function down()
	{
		$this->forge->dropTable('books');
	}
}
