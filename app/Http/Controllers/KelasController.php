<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $query = kelas::query();

        if($search){
            $query->where('nama_kelas', 'like', "%{$search}%");
        }

        $kelass = $query->paginate(10);

        return view('kelas', compact('kelass'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelas_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Kelas::create($request->all());

        return redirect()->route('kelas.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kela)
    {
        return view('kelas_edit', compact('kela'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kela)
    {
        $kela->update($request->all());

        return redirect()->route('kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kela)
    {
        if($kela->siswas()->count() > 0)
        {
            return redirect()->route('kelas.index')->with('error', 'Kelas Ini Masih Diisi Siswa!');
        }
        $kela->delete();

        return redirect()->route('kelas.index')->with('success', 'Kelas Ini Berhasil Dihapus');
    }
}
