<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\laporan_kehilangan_sim;
use App\Models\perpanjangan_sim;
use App\Models\pembuatan_sim;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        // ------------------ dashboard admin sim -----------------

        if (auth()->user()->roles->pluck('name')->first() === 'admin sim') {
            $users = User::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');
    
            $months = User::select(DB::raw("Month(created_at)as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');
    
            $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
            foreach($months as $index => $month)
            {
                $datas[$month-1] = $users[$index];
            }
           
    // bar chart
            $items1 = pembuatan_sim::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

            $months1 = pembuatan_sim::select(DB::raw("Month(created_at)as month1"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month1');
    
            $items2 = laporan_kehilangan_sim::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

            $months2 = laporan_kehilangan_sim::select(DB::raw("Month(created_at)as month2"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month2');
    
            $items3 = perpanjangan_sim::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

            $months3 = perpanjangan_sim::select(DB::raw("Month(created_at)as month3"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month3');
            
            $data1 = array(0,0,0,0,0,0,0,0,0,0,0,0);
            foreach($months1 as $index => $month1)
            {
                $data1[$month1-1] = $items1[$index];
            }

            $data2 = array(0,0,0,0,0,0,0,0,0,0,0,0);
            foreach($months2 as $index => $month2)
            {
                $data2[$month2-1] = $items2[$index];
            }

            $data3 = array(0,0,0,0,0,0,0,0,0,0,0,0);
            foreach($months3 as $index => $month3)
            {
                $data3[$month3-1] = $items3[$index];
            }

 

            return view('pengguna.pages.dashboard.sim', [
                'items1' => $items1,
                'items2' => $items2,
                'items3' => $items3,
            ], compact('datas', 'data1', 'data2', 'data3'));
            // return view('pengguna.pages.dashboard', [
            //     'title' => 'Dashboard'
            // ]);
        }
        // -------------------------------------


        // ------------------ dashboard stnk -----------------

        elseif (auth()->user()->roles->pluck('name')->first() === 'admin stnk') {
            return view('pengguna.pages.dashboard.stnk', [
                'title' => 'Dashboard'
            ]);
        }
        // -------------------------------------


        // ------------------ dashboard user -----------------

        elseif (auth()->user()->roles->pluck('name')->first() === 'user') {
            return view('pengguna.pages.dashboard.user', [
                'title' => 'Dashboard'
            ]);
        }
        // ------------------------------------
    }
}
