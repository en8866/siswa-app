<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\RayonRepositoryInterface;
use Illuminate\Http\Request;

class RayonController extends Controller {
    protected $rayonRepository;

    public function __construct(RayonRepositoryInterface $rayonRepository) {
        $this->rayonRepository = $rayonRepository;
    }

    /**
     * Tampilkan semua rayon.
     */
    public function index() {
        $rayons = $this->rayonRepository->getAll();
        return view('rayon.index', compact('rayons'));
    }

    /**
     * Tampilkan form tambah rayon.
     */
    public function create() {
        return view('rayon.create');
    }

    /**
     * Simpan data rayon baru.
     */
    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|unique:rayons,name',
        ]);

        $this->rayonRepository->create($data);
        return redirect()->route('rayon.index')->with('success', 'Rayon berhasil ditambahkan');
    }

    /**
     * Tampilkan form edit rayon.
     */
    public function edit($id) {
        $rayon = $this->rayonRepository->findById($id);
        return view('rayon.edit', compact('rayon'));
    }

    /**
     * Perbarui data rayon.
     */
    public function update(Request $request, $id) {
        $data = $request->validate([
            'name' => 'required|unique:rayons,name,' . $id,
        ]);

        $this->rayonRepository->update($id, $data);
        return redirect()->route('rayon.index')->with('success', 'Rayon berhasil diperbarui');
    }

    /**
     * Hapus rayon.
     */
    public function destroy($id) {
        $this->rayonRepository->delete($id);
        return redirect()->route('rayon.index')->with('deleted', 'Rayon berhasil dihapus');
    }
}
