<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Rayon;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $siswas = Siswa::with('rayon')->get();
        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $rayons = Rayon::all();
        return view('siswa.create', compact('rayons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'NIS' => 'required',
            'rayon_id' => 'required',
            'rombel' => 'required',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $siswa = Siswa::findOrFail($id);
        $rayons = Rayon::all();
        return view('siswa.edit', compact('siswa', 'rayons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'NIS' => 'required|unique:siswa,NIS,' . $id,
            'rayon_id' => 'required',
            'rombel' => 'required',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());


        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $siswa = Siswa::find($id);
        if (!$siswa) {
            return redirect()->route('siswa.index')->with('deleted', 'Data siswa tidak ditemukan');
        }
        $siswa->delete();
        return redirect()->route('siswa.index')->with('deleted', 'Data siswa berhasil dihapus');
    }
}
