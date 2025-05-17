<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\TransaksiModel;

class TransaksiController extends ResourceController
{
    protected $modelName = 'App\\Models\\TransaksiModel';
    protected $format    = 'json';
}
?>