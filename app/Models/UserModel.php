<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = true;
    protected $useTimestamps  = true;

    protected $allowedFields = [
        'username',
        'password',
        'nama_lengkap',
        'alamat',
        'role'
    ];

    public function findAdminGudang()
    {
        return $this->where('role', 'admin_gudang')
            ->where('deleted_at', null)
            ->findAll();
    }

    public function findKasir()
    {
        return $this->where('role', 'kasir_toko')
            ->where('deleted_at', null)
            ->findAll();
    }

    protected $returnType = 'array';
}
