<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\WaliMurid;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $query = siswa::with('kelas', 'wali_murid');

        if($search){
            $query->where('nama_murid', 'like', "%{$search}%")
                    ->orWhere('NIS', 'like', "%{$search}%")
                    ->orWhere('tempat_lahir', 'like', "%{$search}%")
                    ->orWhere('tanggal_lahir', 'like', "%{$search}%");
        }

        $siswas = $query->paginate(10);

        return view('siswa', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        $wali_murid = WaliMurid::all();

        return view('siswa_create', compact('kelas', 'wali_murid'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Siswa::create($request->all());

        return redirect()->route('siswa.index')->with('success', 'Siswa Berhasil Ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::all();
        $wali_murid = WaliMurid::all();

        return view('siswa_edit', compact('kelas', 'wali_murid', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data Siswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data Siswa Berhasil Dihapus');
    }
}
