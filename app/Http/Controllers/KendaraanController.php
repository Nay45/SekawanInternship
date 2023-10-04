<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KendaraanController extends Controller
{
    public function index()
    {
        $data = Kendaraan::all();
        return view('admin.crud.kendaraan', compact('data'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required'
        ]);
        Kendaraan::create($validatedData);
        LogActivity::create([
            'user_name' => Auth::user()->name,
            'activity' => 'menambahkan kendaraan'
        ]);
        return redirect(route('kendaraan.index'));
    }
}
