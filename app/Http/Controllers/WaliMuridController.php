<?php

namespace App\Http\Controllers;

use App\Models\WaliMurid;
use Illuminate\Http\Request;

class WaliMuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $query = WaliMurid::query();

        if($search){
            $query->where('nama_wali', 'like', "%{$search}%")
                    ->orWhere('kontak', 'like', "%{$search}%");
        }

        $wali_murids = $query->paginate(10);

        return view('wali_murid', compact('wali_murids'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wali_murid_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        WaliMurid::create($request->all());

        return redirect()->route('wali_murid.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WaliMurid $wali_murid)
    {
        return view('wali_murid_edit', compact('wali_murid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WaliMurid $wali_murid)
    {
        $wali_murid->update($request->all());

        return redirect()->route('wali_murid.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WaliMurid $wali_murid)
    {
        if($wali_murid->siswas()->count() > 0)
        {
            return redirect()->route('wali_murid.index')->with('error', 'Orang tua masih diisi siswa!');
        }
        $wali_murid->delete();

        return redirect()->route('wali_murid.index')->with('success','Nama Orang Tua Berhasil Dihapus');
    }
}
