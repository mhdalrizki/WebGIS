<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penduduk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nokk'       => [
                'type'       => 'VARCHAR',
                'null' => true,
                'constraint' => '100',
            ],
            'kepala_keluarga'       => [
                'type'       => 'VARCHAR',
                'null' => true,
                'constraint' => '100',
            ],
            'alamat'       => [
                'type'       => 'VARCHAR',
                'null' => true,
                'constraint' => '50',
            ],
            'jumlah_anggota'       => [
                'type'       => 'VARCHAR',
                'null' => true,
                'constraint' => '100',
            ],
            'penghasilan'       => [
                'type'       => 'VARCHAR',
                'null' => true,
                'constraint' => '100',
            ],
            'latitude'       => [
                'type'       => 'VARCHAR',
                'null' => true,
                'constraint' => '100',
            ], 
            'longitude'       => [
                'type'       => 'VARCHAR',
                'null' => true,
                'constraint' => '100',
            ],     
            'signed_at'       => [
                'type'       => 'VARCHAR',
                'null' => true,
                'type' => 'DATETIME',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('penduduk');
    }

    public function down()
    {
        $this->forge->dropTable('penduduk');
    }
}
