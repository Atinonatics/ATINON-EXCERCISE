<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';

    protected $allowedFields    = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'age',
        'gender_id',
        'email',
        'password',
    ];

}
