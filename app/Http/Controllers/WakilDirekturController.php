<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WakilDirekturController extends Controller
{
    public function index()
    {
        $wadir = User::where('role_khusus_1', "=", 'Wadir')->paginate(8);
        return view('admin.system.wakil_direktur.index', compact('wadir'));
    }
}
