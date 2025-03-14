<?php
namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transactions'; // Sesuaikan dengan nama tabel
    protected $primaryKey = 'id';
    protected $allowedFields = ['amount', 'created_at']; // Pastikan created_at ada
}
