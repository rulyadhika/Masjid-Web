<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAppRequiredTables extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();
		//menu_admin_page
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'auto_increment' => true,
			],
			'nama'       => [
				'type'       => 'VARCHAR',
				'constraint' => 25,
			],
			'icon'       => [
				'type'       => 'VARCHAR',
				'constraint' => 25,
			],
			'url'       => [
				'type'       => 'VARCHAR',
				'constraint' => 50,
			],
			'urutan' => [
				'type' => 'INT',
				'constraint' => 3
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('menu_admin_page');

		// sub_menu_admin_page
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => true,
			],
			'parent_id' => [
				'type' => 'INT',
				'constraint' => 11,
			],
			'nama' => [
				'type' => 'VARCHAR',
				'constraint' => 25,
			],
			'icon' => [
				'type' => 'VARCHAR',
				'constraint' => 25
			],
			'url' => [
				'type' => 'VARCHAR',
				'constraint' => 100
			]
		]);
		$this->forge->addKey("id", true);
		$this->forge->addForeignKey('parent_id', 'menu_admin_page', 'id');
		$this->forge->createTable('submenu_admin_page');

		// tb_banner
		$this->forge->addField([
			'id' => [
				'type' => "INT",
				'constraint' => 11,
				'auto_increment' => true
			],
			'gambar' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'judul' => [
				'type' => 'VARCHAR',
				'constraint' => 75,
			],
			'keterangan' => [
				'type' => 'VARCHAR',
				'constraint' => 150,
			],
			'created_at' => [
				'type' => 'DATETIME'
			],
			'updated_at' => [
				'type' => 'DATETIME'
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('tb_banner');

		// tb_galeri
		$this->forge->addField([
			'id' => [
				'type' => "INT",
				'constraint' => 11,
				'auto_increment' => true
			],
			'gambar' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'keterangan' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
			],
			'created_at' => [
				'type' => 'DATETIME'
			],
			'updated_at' => [
				'type' => 'DATETIME'
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('tb_galeri');

		// tb_kepengurusan
		$this->forge->addField([
			'id' => [
				'type' => "INT",
				'constraint' => 11,
				'auto_increment' => true
			],
			'nama' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
			],
			'jabatan' => [
				'type' => 'VARCHAR',
				'constraint' => 25,
			],
			'created_at' => [
				'type' => 'DATETIME'
			],
			'updated_at' => [
				'type' => 'DATETIME'
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('tb_kepengurusan');

		// tb_keuangan
		$this->forge->addField([
			'id' => [
				'type' => "INT",
				'constraint' => 11,
				'auto_increment' => true
			],
			'keterangan' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
			],
			'nominal' => [
				'type' => "INT",
				'constraint' => 11,
			],
			'status'  => [
				'type'        => 'ENUM',
				'constraint'  => ['pemasukan', 'pengeluaran'],
			],
			'tanggal' => [
				'type' => 'DATE'
			],
			'created_at' => [
				'type' => 'DATETIME'
			],
			'updated_at' => [
				'type' => 'DATETIME'
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('tb_keuangan');

		// tb_kontak
		$this->forge->addField([
			'id' => [
				'type' => "INT",
				'constraint' => 11,
				'auto_increment' => true
			],
			'nama' => [
				'type' => 'VARCHAR',
				'constraint' => 25,
			],
			'icon' => [
				'type' => 'VARCHAR',
				'constraint' => 25,
			],
			'isi' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
			],
			'link' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'created_at' => [
				'type' => 'DATETIME'
			],
			'updated_at' => [
				'type' => 'DATETIME'
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('tb_kontak');

		// tb_postingan
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => true,
			],
			'id_penulis' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true
			],
			'kategori'  => [
				'type'        => 'ENUM',
				'constraint'  => ['berita', 'pengajian', 'kegiatan', 'pengumuman'],
			],
			'judul' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
			],
			'slug' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
			],
			'isi' => [
				'type' => 'TEXT',
			],
			'thumbnail' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'data_status'  => [
				'type'        => 'ENUM',
				'constraint'  => ['ditampilkan', 'diarsipkan'],
			],
			'created_at' => [
				'type' => 'DATETIME'
			],
			'updated_at' => [
				'type' => 'DATETIME'
			]
		]);
		$this->forge->addKey("id", true);
		$this->forge->addForeignKey('id_penulis', 'users', 'id');
		$this->forge->createTable('tb_postingan');

		// tb_profile
		$this->forge->addField([
			'id' => [
				'type' => "INT",
				'constraint' => 11,
				'auto_increment' => true
			],
			'isi' => [
				'type' => 'TEXT',
			],
			'created_at' => [
				'type' => 'DATETIME'
			],
			'updated_at' => [
				'type' => 'DATETIME'
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('tb_profile');

		$this->db->enableForeignKeyChecks();
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
