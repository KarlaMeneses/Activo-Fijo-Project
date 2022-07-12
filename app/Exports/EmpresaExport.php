<?php

namespace App\Exports;

use App\Models\Article;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmpresaExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'id',
            'Nombre',
            'NIT',
        ];
    }
    public function collection()
    {
         $empresas = DB::table('empresa')->select('id','nombre', 'nit')->get();
         return $empresas;

    }
}
