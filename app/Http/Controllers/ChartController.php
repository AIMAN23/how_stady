<?php

namespace App\Http\Controllers;

use App\Models\StudentRegister;
use Illuminate\Http\Request;
use App\Charts\UserLineChart;
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
        $chart = new UserLineChart;
        $chart->title('All Students in this year');
        $chart->labels(['Jan', 'Dec'])->load($api);
        return view('chartLine', compact('chart'));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function chartLineAjax(Request $request)

    {
        $year = $request->has('year') ? $request->year : date('Y');
        $year=date('Y');
        $users = StudentRegister::select(DB::raw("COUNT(*) as count"))
                    ->whereMonth('created_at', $year)
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');

        $chart = new UserLineChart;
        $chart->dataset('New Student Register Chart', 'line', $users)->options([
                    'fill' => 'true',
                    'borderColor' => '#51C1C0'
                ]);

        return $chart->api();
                
    }

    //  public function chartLineAjax2(Request $request)
    // {
    //     // my
    //     $year2 =$year++;
    //     $users2 = User::select(\DB::raw("COUNT(*) as count"))
    //                 ->whereYear('created_at', $year2)
    //                 ->groupBy(\DB::raw("Month(created_at)"))
    //                 ->pluck('count');

    //     $chart2 = new UserLineChart2;
    //     $chart2->dataset('New User R Chart', 'line', $users2)->options([
    //                 'fill' => 'true',
    //                 'borderColor' => '#ff00ff'
    //             ]);
    //     return $chart2->api();
    // }









}




