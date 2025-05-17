<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class UserController extends ResourceController
{
    protected $modelName = 'App\Models\UserModel';
    protected $format    = 'json';

    // GET /api/users
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    // GET /api/users/admingudang
    public function indexadmingudang()
    {
        return $this->respond($this->model->findAdminGudang());
    }

    // GET /api/users/kasir
    public function indexkasir()
    {
        return $this->respond($this->model->findKasir());
    }

    // GET /api/users/{id}
    public function show($id = null)
    {
        $data = $this->model->find($id);
        return $data ? $this->respond($data) : $this->failNotFound("User tidak ditemukan");
    }

    // POST /api/users
    public function create()
    {
        $userModel = new UserModel();

        $data = $this->request->getJSON(true);

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        if (!$userModel->insert($data)) {
            return $this->response->setStatusCode(400)->setJSON([
                'status' => 'error',
                'message' => $userModel->errors()
            ]);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'User registered successfully'
        ]);
    }

    // PUT /api/users/{id}
    public function update($id = null)
    {
        $data = $this->request->getJSON(true);
        $user = $this->model->find($id);

        if (!$user) {
            return $this->failNotFound("User tidak ditemukan");
        }

        // Kalau ada password baru, hash
        if (!empty($data['password'])) {
            // Cek apakah password beda dari sebelumnya (plaintext vs hash tidak akan pernah sama)
            if (!password_verify($data['password'], $user['password'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            } else {
                // Password dikirim tapi isinya hash yang sama → diabaikan
                unset($data['password']);
            }
        } else {
            // Gak dikirim → jangan update
            unset($data['password']);
        }

        if ($this->model->update($id, $data)) {
            return $this->respond(['status' => 'updated']);
        }

        return $this->failValidationErrors($this->model->errors());
    }

    // DELETE /api/users/{id}
    public function delete($id = null)
    {
        if ($this->model->delete($id)) {
            return $this->respondDeleted(['id' => $id]);
        }
        return $this->failNotFound("User tidak ditemukan");
    }
}
