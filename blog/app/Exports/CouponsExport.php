<?php

namespace App\Exports;

use App\Models\Coupons;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;


class CouponsExport implements FromCollection, WithHeadings
{
    use Exportable;

    public function __construct($date){
          
          $this->date = $date;
    }
    public function collection()
    {
        return Coupons::whereRaw('created_at = ' . $this->date)->get();
    }
    public function headings(): array{
        return[
            'Coupon Code',
            'Amount',
            'Expiry Date',
            'Amount Type',
        ];
    }
    
}
