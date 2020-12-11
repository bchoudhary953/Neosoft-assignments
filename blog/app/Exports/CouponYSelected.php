<?php

namespace App\Exports;

use App\Models\Coupons;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;


class CouponYSelected implements FromCollection, WithHeadings
{
	use Exportable;

    public function __construct($year){
          
          $this->year = $year;
    }
    public function collection()
    {
        return Coupons::whereRaw('YEAR(created_at) = ' . $this->year)->get();
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
