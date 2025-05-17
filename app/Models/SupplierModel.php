<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table            = 'supplier';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_supplier', 'alamat', 'telp'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;

    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $deletedField     = 'deleted_at';
}
