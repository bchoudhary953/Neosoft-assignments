<?php

namespace App\Exports;

use App\Models\Coupons;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;


class CouponMSelected implements FromCollection, WithHeadings
{
	use Exportable;

    public function __construct($month , $year){
          $this->month = $month;
          $this->year = $year;
    }
    public function collection()
    {
        return Coupons::whereRaw('YEAR(created_at) = ' . $this->year . ' AND MONTH(created_at) = ' . $this->month)->get();
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
