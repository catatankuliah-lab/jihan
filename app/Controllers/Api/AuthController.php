<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function register()
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

    public function login()
    {
        $session = session();
        $userModel = new UserModel();
        $data = $this->request->getJSON(true);

        $user = $userModel->where('username', $data['username'])->first();

        if (!$user) {
            return $this->response->setStatusCode(401)->setJSON([
                'status' => 'error',
                'message' => 'Username tidak ditemukan'
            ]);
        }

        if (!password_verify($data['password'], $user['password'])) {
            return $this->response->setStatusCode(401)->setJSON([
                'status' => 'error',
                'message' => 'Password salah'
            ]);
        }

        // ✅ Set session
        $session->set([
            'id_user' => $user['id'],
            'username' => $user['username'],
            'role' => $user['role'],
            'isLoggedIn' => true
        ]);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Login berhasil',
            'data' => [
                'id' => $user['id'],
                'username' => $user['username'],
                'nama_lengkap' => $user['nama_lengkap'],
                'alamat' => $user['alamat'],
                'role' => $user['role']
            ]
        ]);
    }
}
