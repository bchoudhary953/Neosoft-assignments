<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\Support\Responsabl;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;


class UserYSelected implements FromCollection,WithHeadings
{
    use Exportable;

    public function __construct($year){
          
          $this->year = $year;
    }
    public function collection()
    {
        return User::whereRaw('YEAR(created_at) = ' . $this->year)->get();
    }
    public function headings(): array{
        return[
            'First Name',
            'Last Name',
            'Email',
            'Mobile Number',
        ];
    }
}
