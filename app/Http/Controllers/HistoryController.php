<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        if (auth()->user()->roles->pluck('name')->first() !== 'user') {
            $data = History::latest()->where('admin', auth()->user()->username)->get();
        }
        return view('pengguna.pages.history.index', [
            'title' => 'History',
            'data' => $data
        ]);
    }
}
