<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\pemesanan;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ApproveController extends Controller
{

    public function list()
    {
        $data = User::where('role', '=', 'approval')->get();
        return view('admin.list', compact('data'));
    }
    public function setStatus($id)
    {
        $dtUser = Auth::user()->name;
        $pesan = pemesanan::findOrFail($id);
        if ($pesan->approved == 0) {
            $pesan->approved = 1;
            $activity = 'approve pemesanan';
        } else {
            $pesan->approved = 0;
            $activity = 'close pemesanan';
        }
        $pesan->save();
        History::create([
            'user_name' => $dtUser,
            'activity_name' => $activity
        ]);

        return redirect()->route('manage.index');
    }
}
