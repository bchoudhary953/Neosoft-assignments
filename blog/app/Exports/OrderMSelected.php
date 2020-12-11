<?php

namespace App\Exports;

use App\Models\Orders;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\Support\Responsabl;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;


class OrderMSelected implements FromCollection,WithHeadings
{
    use Exportable;

    public function __construct($year,$month){
          $this->month = $month; 
          $this->year = $year;
    }
    public function collection()
    {
        return Orders::whereRaw('YEAR(created_at) = ' . $this->year . ' AND MONTH(created_at) = ' . $this->month)->get();
    }
    public function headings(): array{
        return[
            'Name',
            'Email',
            'Mobile Number',
            'Payment Method',
            'Total Amount',
            
        ];
    }
}