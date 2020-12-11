<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\Support\Responsabl;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;


class UserMSelected implements FromCollection,WithHeadings
{
    use Exportable;

    public function __construct($month,$year){
          
          $this->month = $month;
          $this->year = $year;
    }
    public function collection()
    {
        return User::whereRaw('YEAR(created_at) = ' . $this->year . ' AND MONTH(created_at) = ' . $this->month)->get();
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
