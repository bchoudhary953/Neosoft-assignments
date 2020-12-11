<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Exports\OrdersExport;
use App\Models\User;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;


class UsersExportController extends Controller
{
	private $excel;
    public function export(){
    	return Excel::download(new UsersExport,'users.xlsx');
    }
    public function salesExport(){
    	return Excel::download(new OrdersExport,'sales.xlsx');
    }
    /*public function __construct(Excel $excel){
    	$this->excel = $excel;
    }
    public function export(){
    	return $this->excel->download(new UsersExport, 'users.xslx');
    }*/
    function index(){
    	$users = User::get();
    	return view('Backend.exports.users')->with(compact('users',$users));
    }
    function excel(){
    	$users = User::get();
    	//dd($users);die;
    	$users_array[] = array('First Name','Last Name','Email');
    	foreach($users as $user){
    		//dd($user->email);die;
    		$users_array[] = array(
    			'id' => $user->id,
    			'First Name' => $user->first_name,
    			'Last Name' =>$user->last_name,
    			'Email'=>$user->email,
    		);
    	}
    	return Excel::download(new UsersExport,'data.xlsx');
    	Excel::create	('User Data',function($excel) use($users_array){
    		$excel->setTitle('User Data');
    		$excel->sheet('User Data',function($sheet) use($users_array){
    			$sheet->fromArray($users_array,null,'A1',false,false);
    		});
    	})->download('data.xlsx');
    }
    function exxcel(){
    	//echo "controller code";
    	return Excel::download(new ProductExport,'userdata.xlsx');
    }

}
/**
 * 
 */
class ProductExport implements FromCollection
{
	public function collection(){
		return Product::all();
	}
}