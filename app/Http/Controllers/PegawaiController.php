<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        // Fetch all employees from the database
        $pegawai = Pegawai::all();
        return view('pegawai.index', compact('pegawai'));
    }
}
