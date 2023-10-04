<?php

namespace App\Http\Controllers;

use App\Models\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dtKendaraan = DB::table('pemesanan')
            ->select('kendaraan', DB::raw('count(DISTINCT created_at) as total'))
            ->groupBy('kendaraan')
            ->get();
        $status = DB::table('pemesanan')
            ->select('approved', DB::raw('count(*) as tstatus'))
            ->groupBy('approved')
            ->get();
        return view('admin.dashboard', compact(
            ['dtKendaraan', 'status']
        ));
    }
}
