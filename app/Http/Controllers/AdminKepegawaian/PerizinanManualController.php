<?php

namespace App\Http\Controllers\AdminKepegawaian;

use Illuminate\Http\Request;
use App\Models\PerizinanManual;
use App\Http\Controllers\Controller;

class PerizinanManualController extends Controller
{
    public function index()
    {
        return view('admin.kepegawaian.perizinan_manual.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
