<?php

namespace App\Exports;

use App\Models\Students;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Students::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Email',
            'Alamat',
            'Tanggal Lahir',
            // tambah kolom lainnya sesuai kebutuhan
        ];
    }
}
