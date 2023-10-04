<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogActivity;

class LogActivityController extends Controller
{
    public function index()
    {
        $dt = LogActivity::all();
        return view('admin.activity', compact('dt'));
    }

    public function destroy($id)
    {
        $destroy = LogActivity::findOrFail($id);
        $destroy->delete();
        return redirect()->back();
    }
}
