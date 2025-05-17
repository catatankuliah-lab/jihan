<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table      = 'transaksi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_user', 'jenis_transaksi', 'tanggal', 'total_harga'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}
?>