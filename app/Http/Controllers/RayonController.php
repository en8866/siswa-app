<?php
namespace App\Http\Controllers;

use App\Models\Rayon;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rayons = Rayon::all();
        return view('rayon.index', compact('rayons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rayon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:rayons,name',
        ]);

        Rayon::create([
            'name' => $request->name,
        ]);

        return redirect()->route('rayon.index')->with('success', 'Rayon berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rayon = Rayon::findOrFail($id);
        return view('rayon.edit', compact('rayon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:rayons,name,' . $id,
        ]);

        $rayon = Rayon::findOrFail($id);
        $rayon->update([
            'name' => $request->name,
        ]);

        return redirect()->route('rayon.index')->with('success', 'Rayon berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rayon = Rayon::findOrFail($id);
        $rayon->delete();
        return redirect()->route('rayon.index')->with('deleted', 'Rayon berhasil dihapus');
    }
}
