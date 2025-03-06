<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\SiswaRepositoryInterface;
use App\Models\Rayon;
use Illuminate\Http\Request;


class SiswaController extends Controller {
    protected $siswaRepository;

    public function __construct(SiswaRepositoryInterface $siswaRepository) {
        $this->siswaRepository = $siswaRepository;
    }

    /**
     * Tampilkan semua siswa.
     */
    public function index() {
        $siswa = $this->siswaRepository->getAll();
        return view('siswa.index', compact('siswa'));
    }

    /**
     * Tampilkan form tambah siswa.
     */
    public function create() {
        $rayons = Rayon::all(); // Ambil semua rayon
        return view('siswa.create', compact('rayons'));
    }

    /**
     * Simpan data siswa baru.
     */
    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'NIS' => 'required|unique:siswa,NIS',
            'rayon_id' => 'required|exists:rayons,id',
            'rombel' => 'required',
        ]);

        $this->siswaRepository->create($data);
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan');
    }

    /**
     * Tampilkan detail siswa (opsional).
     */
    public function show($id) {
        $siswa = $this->siswaRepository->findById($id);
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Tampilkan form edit siswa.
     */
    public function edit($id) {
        $siswa = $this->siswaRepository->findById($id);
        $rayons = Rayon::all();
        return view('siswa.edit', compact('siswa', 'rayons'));
    }

    /**
     * Perbarui data siswa.
     */
    public function update(Request $request, $id) {
        $data = $request->validate([
            'name' => 'required',
            'NIS' => 'required',
            'rayon_id' => 'required',
            'rombel' => 'required',
        ]);

        $this->siswaRepository->update($id, $data);
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diubah');
    }

    /**
     * Hapus siswa.
     */
    public function destroy($id) {
        $this->siswaRepository->delete($id);
        return redirect()->back()->with('deleted', 'Data siswa berhasil dihapus');
    }
}
