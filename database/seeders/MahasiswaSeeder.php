<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswas')->insert([
            'nama' => 'Gabriel Adelfina',
            'NIM' => '221011400246',
            'fakultas' => 'Ilmu Komputer',
            'semester' => '2',
            'no_handphone' => '089659499905',
            'email' => 'gabrielaadel04@gmail.com',
        ]);
    }
}
