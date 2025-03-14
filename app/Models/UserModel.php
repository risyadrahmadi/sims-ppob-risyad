<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Sesuaikan dengan nama tabel di database
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'nomor_telepon', 'alamat', 'email', 'password'];
}
