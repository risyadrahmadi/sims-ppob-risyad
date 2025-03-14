<?php
namespace App\Controllers;
use App\Models\TransactionModel;

class TransactionController extends BaseController
{
    public function index()
    {
        $model = new TransactionModel();
        $data['transactions'] = $model->findAll(); // Ambil semua data

        return view('transaction', $data);
    }

    public function store()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('transactions');

        $data = [
            'amount' => $this->request->getPost('amount'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        if ($builder->insert($data)) {
            return redirect()->to('/transaction');
        } else {
            echo "Gagal menyimpan data!";
            die();
        }
    }


}

