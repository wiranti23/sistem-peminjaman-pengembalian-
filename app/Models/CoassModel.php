<?php

namespace App\Models;

use CodeIgniter\Model;

class CoassModel extends Model
{
    protected $table      = 'coass_doc';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id', 'coass_name', 'coass_number', 'phone', 'service_id'
    ];
}
