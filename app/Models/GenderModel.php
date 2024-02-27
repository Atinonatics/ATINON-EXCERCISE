<?php

namespace App\Models;

use CodeIgniter\Model;

class GenderModel extends Model
{
    protected $table            = 'genders';
    protected $primaryKey       = 'gender_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';

    protected $allowedFields    = [
        'gender_id',
        'gender',
    ];

}
