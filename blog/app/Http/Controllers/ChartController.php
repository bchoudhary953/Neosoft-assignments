<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = DB::table('orders')
                  ->select('created_at', DB::raw('count(*) as total'))
                  ->groupBy('created_at')
                  ->pluck('total', 'created_at')->all();
        // Generate random colours for the groups
        for ($i=0; $i<=count($groups); $i++) {
                    $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
                }
        // Prepare the data for returning with the view
        $chart = new Chart;
                $chart->labels = (array_keys($groups));
                $chart->dataset = (array_values($groups));
                $chart->colours = $colours;
        return view('charts.index', compact('chart'));    
    }

   
    public function chart()
    {
        $data['month_list'] = $this->fetch_year();
       return view('Backend.chart')->with($data);
    }            
    public function fetch_year(){
        $data = DB::table('orders')
                  ->select('created_at', DB::raw('count(*) as total'))
                  ->groupBy('created_at')
                  ->pluck('total', 'created_at')->all();
                  return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function show(Chart $chart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function edit(Chart $chart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chart $chart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chart $chart)
    {
        //
    }
}
