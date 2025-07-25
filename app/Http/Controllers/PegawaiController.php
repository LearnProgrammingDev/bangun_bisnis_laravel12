<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        // ambil data pegawai dari database
        // dan kirim ke view pegawai.index
        $pegawai = Pegawai::all();
        return view('pegawai.index', compact('pegawai'));
    }
    public function show($id)
    {
        // ambil data pegawai berdasarkan id
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.show', compact('pegawai'));
    }
    public function destroy($id)
    {
        // hapus data pegawai berdasarkan id
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        // redirect ke halaman pegawai.index dengan pesan sukses
        return redirect()->route('pegawai.index')->with('success', 'Pegawai deleted successfully');
    }
}
