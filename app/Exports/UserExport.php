<?php

namespace App\Exports;

use App\Models\Article;
use App\Models\User;
use DB;
use GuzzleHttp\Psr7\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class UserExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            'id',
            'Nombre',
            'Email',
        ];
    }
    public function collection()
    {
         $users = DB::table('users')->select('id','name', 'email')->get();
         return $users;

    }
   /* public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function view(): View
    {
        return view('empresa.export', [
            'users' => User::all(),
            'lol' => $request,
        ]);
    }*/
   
}