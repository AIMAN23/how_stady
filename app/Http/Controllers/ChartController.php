<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use App\Charts\UserLineChart;
use App\Models\StudentRegister;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function chartLine()
    {
        $api = url('/chart-line-ajax');
        $api2 = url('/chart-line-ajax2');
        $api3 = url('/chart-line-ajax3');
        
        $chart = new UserLineChart;
        $chart->title('All Students in this year');
        $chart->type('bar');
        $chart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])->load($api);
        // $chart->labels(['1','2','3','4','5','6','7','8','9','10','11','12'])->load($api);

        $chart2 = new UserLineChart;
        $chart2->title('All classrooms in this year');
        $chart2->type('bar');
        $chart2->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])->load($api2);

        $chart3 = new UserLineChart;
        $chart3->title('All Supervisor in this year');
        $chart3->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])->load($api3);
        $chart3->type('bar');
        return view('chartLine', compact('chart','chart2','chart3'));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function chartLineAjax(Request $request)

    {
        $year = $request->has('year') ? $request->year : date('Y');
        // $year=date('Y');
        $users = StudentRegister::selectRaw("COUNT(*) as count")
                    ->whereYear('created_at', $year)
                    ->groupByRaw("Month(created_at)")
                    ->pluck('count');

        $chart = new UserLineChart;

        $chart->dataset('New Student Register Chart', 'bar', $users)->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ]);
        


        return $chart->api();
                
    }

    public function chartLineAjaxClassroms(Request $request)
    {
        // my
        $year = $request->has('year') ? $request->year : date('Y');
        $users = Classroom::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', $year)
                    // ->groupBy(DB::raw("Month(created_at)"))
                    ->groupByRaw('Month(created_at)')
                    ->pluck('count');

        $chart = new UserLineChart;
        $chart->dataset('all classrooms Chart', 'bar', $users)->options([
                    'fill' => 'true',
                    'borderColor' => '#ff00ff'
                ]);
        return $chart->api();
    }
    public function chartLineAjaxSupervisor(Request $request)
    {
        // my
        $year = $request->has('year') ? $request->year : date('Y');
        $usercreated_at = Supervisor::selectRaw("COUNT(*) as count")
                    ->whereYear('created_at', $year)
                    ->groupByRaw('Month(created_at)')
                    ->pluck('count');
        $userupdated_at = Supervisor::selectRaw("COUNT(*) as count")
                    ->whereYear('updated_at', $year)
                    ->groupByRaw('Month(updated_at)')
                    ->pluck('count');

        $chart = new UserLineChart;
        
        $chart->dataset('Supervisor Register Chart', 'bar', $usercreated_at)->options([
            'fill' => 'true',
            'borderColor' => '#ff98760'
        ]);
        $chart->dataset('Supervisor Updated Chart', 'bar', $userupdated_at)->options([
            'fill' => 'true',
            'borderColor' => '#ff00ff'
        ]);
        return $chart->api();
    }









}




