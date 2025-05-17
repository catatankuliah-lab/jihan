<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\DetailTransaksiModel;

class DetailTransaksiController extends ResourceController
{
    protected $modelName = 'App\\Models\\DetailTransaksiModel';
    protected $format    = 'json';
}
?>