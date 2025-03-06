<?php

namespace App\Repositories\Eloquent;

use App\Models\Siswa;
use App\Repositories\Contracts\SiswaRepositoryInterface;

class SiswaRepository implements SiswaRepositoryInterface {
    protected $model;

    public function __construct(Siswa $model) {
        $this->model = $model;
    }

    public function getAll() {
        return $this->model->all();
    }

    public function findById($id) {
        return $this->model->findOrFail($id);
    }

    public function create(array $data) {
        return $this->model->create($data);
    }

    public function update($id, array $data) {
        $siswa = $this->findById($id);
        $siswa->update($data);
        return $siswa;
    }

    public function delete($id) {
        $siswa = $this->findById($id);
        $siswa->delete();
    }
}
