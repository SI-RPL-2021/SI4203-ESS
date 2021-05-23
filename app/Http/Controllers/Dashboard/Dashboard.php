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

            $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($months as $index => $month) {
                $datas[$month] = $users[$index];
            }

            $items1 = pembuatan_sim::select(DB::raw("COUNT(*) as count"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count');

            $items2 = laporan_kehilangan_sim::orderBy('created_at', 'desc')
                ->where('user_id', auth()->id())->get();
            $items3 = perpanjangan_sim::orderBy('created_at', 'desc')
                ->where('id', auth()->id())->get();

            return view('pengguna.pages.dashboard.sim', [
                'title' => 'Dashboard SIM',
                'items1' => $items1,
                'items2' => $items2,
                'items3' => $items3,
            ], compact('datas'));
        }
        // -----------------------------------


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
