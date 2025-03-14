<?php

namespace App\Models;
use CodeIgniter\Model;

class TopupModel extends Model
{
    protected $table = 'topup_history';
    protected $primaryKey = 'id';
    protected $allowedFields = ['jumlah', 'tanggal'];

    //Method untuk menyimpan transaksi top-up
    public function saveTransaction($userId, $nominal)
    {
        return $this->insert([
            'user_id' => $userId,
            'nominal' => $nominal,
            'tanggal' => date('Y-m-d H:i:s')
        ]);
    }
}
