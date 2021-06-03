<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\faq;
use App\Models\laporan_kehilangan_sim;
use App\Models\laporan_kehilangan_stnk;
use App\Models\pembuatan_sim;
use App\Models\pembuatan_stnk;
use App\Models\PerpanjanganStnk;
use App\Models\perpanjangan_sim;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $users = User::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        $months = User::select(DB::raw("Month(created_at)as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');

        $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        foreach ($months as $index => $month) {
            $datas[$month - 1] = $users[$index];
        }

        // ------------------ dashboard admin sim -----------------

        if (auth()->user()->roles->pluck('name')->first() === 'admin sim') {

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

            $data1 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($months1 as $index => $month1) {
                $data1[$month1 - 1] = $items1[$index];
            }

            $data2 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($months2 as $index => $month2) {
                $data2[$month2 - 1] = $items2[$index];
            }

            $data3 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($months3 as $index => $month3) {
                $data3[$month3 - 1] = $items3[$index];
            }

            return view('pengguna.pages.dashboard.sim', [
                'title' => 'Dashboard SIM',
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

            // bar chart
            $items11 = pembuatan_stnk::select(DB::raw("COUNT(*) as count"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count');

            $months11 = pembuatan_stnk::select(DB::raw("Month(created_at)as month11"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('month11');

            $items21 = laporan_kehilangan_stnk::select(DB::raw("COUNT(*) as count"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count');

            $months21 = laporan_kehilangan_stnk::select(DB::raw("Month(created_at)as month21"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('month21');

            $items31 = PerpanjanganStnk::select(DB::raw("COUNT(*) as count"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count');

            $months31 = PerpanjanganStnk::select(DB::raw("Month(created_at)as month31"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('month31');

            $data11 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($months11 as $index => $month11) {
                $data11[$month11 - 1] = $items11[$index];
            }

            $data21 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($months21 as $index => $month21) {
                $data21[$month21 - 1] = $items21[$index];
            }

            $data31 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($months31 as $index => $month31) {
                $data31[$month31 - 1] = $items31[$index];
            }

            return view('pengguna.pages.dashboard.stnk', [
                'title' => 'Dashboard STNK',
                'items11' => $items11,
                'items21' => $items21,
                'items31' => $items31,
            ], compact('datas', 'data11', 'data21', 'data31'));
        }
        // -------------------------------------

        // ------------------ dashboard user -----------------

        elseif (auth()->user()->roles->pluck('name')->first() === 'user') {
            $faq = faq::latest()->paginate(5);
            return view('pengguna.pages.dashboard.user', compact('faq'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
        // ------------------------------------
    }
}
