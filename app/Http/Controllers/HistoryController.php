<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $data = History::latest()->where('username', auth()->user()->username)->get();
        return view('pengguna.pages.history.index', [
            'title' => 'History',
            'data' => $data
        ]);
    }
}
