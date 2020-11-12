<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\GlobalSetting;
use DB;
use Auth;
use DataTables;
use Redirect;
class GlobalSettingController extends Controller
{
    /**
     *  Banners data
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      return view('globalSetting.index');
    }

    /**
    * Index datatable.
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function getGlobalSetting(Request $request)
    {
        $globalSetting = GlobalSetting::orderBy('id','desc')->get();
        // print_r($banners); exit();
        return DataTables::of($globalSetting)
        ->addIndexColumn()
        ->editColumn('setting_value', function ($globalSetting) {
          if ($globalSetting->id == "1") {
            return  $globalSetting->setting_value." Miles";
          }else {
            return  $globalSetting->setting_value;
          }
      })
        ->addColumn('action', function ($globalSetting) {
        return '<form action="'.route('globalSetting.destroy',$globalSetting->id).'" method="post" id='.$globalSetting->id.'>
            '.csrf_field() .'
            <input type="hidden" name="_method" value="DELETE">
            <a href="'. route('globalSetting.show', $globalSetting->id) .'" class="btn btn-sm btn-info"><i class="fa fa-eye" title="View"></i></a>
            <a href="'. route('globalSetting.edit', $globalSetting->id) .'" class="btn btn-sm btn-primary"><i class="fa fa-pencil" title="Edit"></i></a>
           </form>';
          })
        ->rawColumns(['action'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //   $status = unserialize(config('constants.status'));
      return view('globalSetting.add');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([

    //       'setting_value' => 'required|numeric',
    //     ]);
    //     $distance_covered = $request->input('distance_covered');
    //     $created_at = date('Y-m-d H:i:s');
    //     $data=array(
    //       'distance_covered'=>$distance_covered,
    //       "updated_by" => Auth::user()->id,
    //       "created_at" => $created_at,
    //     );
    //     $globalSetting = GlobalSetting::insert($data);
    //     return redirect()->route('globalSetting.index')->with('success', 'Global Setting added successfully.');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $globalSetting = GlobalSetting::find($id);
        return view('globalSetting.view',compact('globalSetting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $globalSetting = GlobalSetting::find($id);
        // $status = unserialize(config('constants.status'));
        return view('globalSetting.edit',compact('globalSetting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'setting_name' => 'required',
          'setting_value' => 'required',
        ];
        $this->validate($request, $rules);

        $globalSetting = GlobalSetting::find($id);
        

        $setting_value = $request->input('setting_value');
        $setting_name = $request->input('setting_name');

        $globalSetting->setting_name = $setting_name;
        $globalSetting->setting_value = $setting_value;
        $globalSetting->updated_by = Auth::user()->id;
        $globalSetting->save();

        return redirect()->route('globalSetting.index')->with('success', 'Setting updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $globalSetting = GlobalSetting::find($id);
    //     $globalSetting->delete();
    //     return redirect()->route('globalSetting.index')->with('success', 'Global Setting deleted successfully.');
    // }



}
