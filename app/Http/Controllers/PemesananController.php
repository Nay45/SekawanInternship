<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use App\Models\History;
use App\Models\Kendaraan;
use App\Models\pemesanan;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PemesananController extends Controller
{
    public function index()
    {
        $activities = DB::table('history_pemesanan')
            ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as waktu'), DB::raw('count(*) as total_aktivitas'))
            ->groupBy('waktu')
            ->orderBy('waktu')
            ->get();

        foreach ($activities as $activity) {
            DB::table('laporan_periodik')
                ->updateOrInsert(
                    ['waktu' => $activity->waktu],
                    ['total_aktivitas' => $activity->total_aktivitas]
                );
        }

        $history = History::all();
        $data = pemesanan::all();
        $checkApproval = User::where('id', Auth::user()->id)->first();
        return view('admin.crud.index', compact(['data', 'checkApproval', 'history']));
    }
    public function create()
    {
        if (Auth::user()->role === 'admin') {
            $data = User::where('role', '=', 'approval')->get();
            $kendaraan = Kendaraan::all();
            return view('admin.crud.create', compact(['data', 'kendaraan']));
        } else {
            return redirect()->route('dashboard');
        }
    }
    public function store(Request $request)
    {
        try {
            $confirmed =  pemesanan::create(
                [
                    'kendaraan' => $request['kendaraan'],
                    'driver' => $request['driver'],
                    'approval_id' => $request['approval_id']
                ]
            );
            if ($confirmed) {
                return redirect(route('manage.index'));
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
    public function destroy($id)
    {
        $pesan = History::findOrFail($id);
        $pesan->delete();

        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new LaporanExport, 'laporan.xlsx');
    }
}
