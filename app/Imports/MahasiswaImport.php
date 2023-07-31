<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;

class MahasiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mahasiswa([
            'nama' =>$row[1],
            'nim' =>$row[2],
            'fakultas' =>$row[3],
            'semester' =>$row[4],
            'no_handphone' =>$row[5],
            'email' =>$row[6],
        ]);
    }
}
