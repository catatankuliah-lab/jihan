<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'id_supplier',
        'nama_barang',
        'kode_rak',
        'tanggal_kadaluarsa',
        'stok',
        'harga',
        'satuan'
    ];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;

    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $deletedField     = 'deleted_at';

    protected $returnType = 'array';

    public function findAllBarang()
    {
        return $this->select('barang.*, supplier.nama_supplier, supplier.alamat, supplier.telp')
            ->join('supplier', 'supplier.id = barang.id_supplier', 'left')
            ->where('barang.deleted_at', null)
            ->findAll();
    }

    public function findBarang($id)
    {
        return $this->select('barang.*, supplier.nama_supplier, supplier.alamat, supplier.telp')
            ->join('supplier', 'supplier.id = barang.id_supplier', 'left')
            ->where('barang.id', $id)
            ->where('barang.deleted_at', null)
            ->first();
    }
}
