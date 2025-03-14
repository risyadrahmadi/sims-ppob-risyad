<?php
namespace App\Controllers;
use App\Models\TransactionModel;
use App\Models\UserModel;

class TopUpController extends BaseController
{

    public function index()
    {
        return view('topup');
    }

    public function store() 
    {
        $transactionModel = new TransactionModel();
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $nominal = $this->request->getPost('nominal');

        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Anda harus login!');
        }

        if (!$nominal || $nominal <= 0) {
            return redirect()->to('/topup')->with('error', 'Nominal tidak valid!');
        }

        // Simpan transaksi top up
        $transactionModel->insert([
            'user_id' => $userId,
            'nominal' => $nominal,
            'tanggal' => date('Y-m-d H:i:s')
        ]);

        // Update saldo user
        $user = $userModel->find($userId);
        $newSaldo = $user['saldo'] + $nominal;
        $userModel->update($userId, ['saldo' => $newSaldo]);

        return redirect()->to('/transaction')->with('success', 'Top Up berhasil!');
    }
}
