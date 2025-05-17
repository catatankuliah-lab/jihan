<?php

namespace App\Controllers;

class KepalaGudangController extends BaseController
{
    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard',
            'total_stok' => 1200,
            'jumlah_barang' => 35,
            'jumlah_transaksi' => 78,
        ];

        return view('kepalagudang/dashboard/index', $data);
    }

    public function userAdmin()
    {
        $data = [
            'title' => 'Admin Gudang'
        ];

        return view('kepalagudang/user/admin/index', $data);
    }

    public function userAdminAdd()
    {
        $data = [
            'title' => 'Admin Gudang'
        ];

        return view('kepalagudang/user/admin/add', $data);
    }
    
    public function userAdminDetail($id)
    {
        return view('kepalagudang/user/admin/detail', ['id' => $id, 'title' => 'Kasir Toko']);
    }

    public function userKasir()
    {
        $data = [
            'title' => 'Kasir Toko'
        ];

        return view('kepalagudang/user/kasir/index', $data);
    }

    public function userKasirAdd()
    {
        $data = [
            'title' => 'Kasir Toko'
        ];

        return view('kepalagudang/user/kasir/add', $data);
    }

    public function userKasirDetail($id)
    {
        return view('kepalagudang/user/kasir/detail', ['id' => $id, 'title' => 'Kasir Toko']);
    }

    public function supplier()
    {
        $data = [
            'title' => 'Supplier'
        ];

        return view('kepalagudang/supplier/index', $data);
    }

    public function supplierAdd()
    {
        $data = [
            'title' => 'Supplier'
        ];

        return view('kepalagudang/supplier/add', $data);
    }

    public function supplierDetail($id)
    {
        return view('kepalagudang/supplier/detail', ['id' => $id, 'title' => 'Supplier']);
    }

    public function barang()
    {
        $data = [
            'title' => 'Barang'
        ];

        return view('kepalagudang/barang/index', $data);
    }

    public function barangDetail($id)
    {
        return view('kepalagudang/barang/detail', ['id' => $id, 'title' => 'Barang']);
    }
}
