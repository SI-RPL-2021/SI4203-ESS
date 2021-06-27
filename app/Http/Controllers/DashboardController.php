<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\laporan_kehilangan_sim;
use App\Models\perpanjangan_sim;
use App\Models\pembuatan_sim;
use App\Models\History;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
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


        $items1 = pembuatan_sim::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        $items2 = laporan_kehilangan_sim::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        $items3 = perpanjangan_sim::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        return view('pengguna.pages.dashboard', [
            'items1' => $items1,
            'items2' => $items2,
            'items3' => $items3,
        ], compact('datas'));
        // return view('pengguna.pages.dashboard', [
        //     'title' => 'Dashboard'
        // ]);
    }
}
