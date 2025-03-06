<?php

namespace App\Repositories\Eloquent;

use App\Models\Rayon;
use App\Repositories\Contracts\RayonRepositoryInterface;

class RayonRepository implements RayonRepositoryInterface {
    protected $model;

    public function __construct(Rayon $model) {
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
        $rayon = $this->findById($id);
        $rayon->update($data);
        return $rayon;
    }

    public function delete($id) {
        $rayon = $this->findById($id);
        $rayon->delete();
    }
}
