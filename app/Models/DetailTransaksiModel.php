<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailTransaksiModel extends Model
{
    protected $table      = 'detail_transaksi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_transaksi', 'id_barang', 'jumlah', 'harga_satuan'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}
?>