<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_produk' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_produk' => [
                'type'           => 'VARCHAR',
                'constraint'     => 200,
            ],
            'harga' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'kategori' => [
                'type' => 'VARCHAR',
                'constraint'     => 10,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 11,
            ],
        ]);
        $this->forge->addKey('id_produk', true);
        $this->forge->createTable('produk');
    }

    public function down()
    {
        $this->forge->dropTable('produk');
    }
}
