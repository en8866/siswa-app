<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Rayon;
use App\Models\User;
use Illuminate\Http\Request;
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $siswa = Siswa::with('rayon')->get();
        return view('siswa.index', compact('siswa'));

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $rayons = Rayon::all(); // Ambil semua data rayon
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
            'NIS' => 'required|unique:siswa,NIS',
            'rayon_id' => 'required|exists:rayons,id',
            'rombel' => 'required',
        ]);
        $proses = Siswa::create([
            'name' => $request->name,
            'NIS' => $request->NIS,
            'rayon_id' => $request->rayon_id,
            'rombel' => $request->rombel,
        ]);
        if ($proses) {
            return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan');
        } else {
            return redirect()->back()->with('failed', 'Data siswa gagal ditambahkan');
        }
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
        $siswa = Siswa::where('id', $id)->first();
        return view('siswa.edit', compact('siswa'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'NIS' => 'required',
            'rayon_id' => 'required',
            'rombel' => 'required',
        ]);
        $siswa = Siswa::where('id', $id)->first();
        $siswa->update([
            'name' => $request->name,
            'NIS' => $request->NIS,
            'rayon_id' => $request->rayon_id,
            'rombel' => $request->rombel,
        ]);
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diubah');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Siswa::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Data siswa berhasil dihapus');
    }
}