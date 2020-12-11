<?php

namespace App\Exports;

use App\Models\Orders;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\Support\Responsabl;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;


class OrdersExport implements FromCollection,WithHeadings
{
    use Exportable;

    public function __construct($date){
          
          $this->date = $date;
    }
    public function collection()
    {
        return Orders::whereRaw('created_at = ' . $this->date)->get();
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
