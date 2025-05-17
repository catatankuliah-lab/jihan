<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use CodeIgniter\API\ResponseTrait;

class BarangController extends BaseController
{
    use ResponseTrait;

    protected $model;

    public function __construct()
    {
        $this->model = new BarangModel();
    }

    public function index()
    {
        return $this->respond($this->model->findAllBarang());
    }

    public function show($id = null)
    {
        $data = $this->model->findBarang($id);
        if (!$data) return $this->failNotFound('Barang tidak ditemukan');
        return $this->respond($data);
    }

    public function create()
    {
        $data = $this->request->getJSON(true);
        if (!$this->model->insert($data)) {
            return $this->failValidationErrors($this->model->errors());
        }
        return $this->respondCreated($data);
    }

    public function update($id = null)
    {
        if (!$this->model->find($id)) return $this->failNotFound('Barang tidak ditemukan');
        $data = $this->request->getJSON(true);
        if (!$this->model->update($id, $data)) {
            return $this->failValidationErrors($this->model->errors());
        }
        return $this->respond(['status' => 'updated']);
    }

    public function delete($id = null)
    {
        if (!$this->model->find($id)) return $this->failNotFound('Barang tidak ditemukan');
        $this->model->delete($id);
        return $this->respondDeleted(['status' => 'deleted']);
    }
}
