<?php

namespace App\Controllers;
use App\Models\UserModel;

class Akun extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        
        // Ambil data user dari session (misalnya login sudah ada)
        $userID = session()->get('user_id');
        $user = $userModel->find($userID);

        return view('akun', ['user' => $user]);
    }

    public function update()
    {
        $userModel = new UserModel();

        // Ambil user ID dari session (sesuaikan dengan sistem login kamu)
        $userID = session()->get('user_id');

        // Ambil data dari form
        $data = [
            'full_name'    => $this->request->getPost('full_name'),
            'phone_number' => $this->request->getPost('phone_number'),
            'address'      => $this->request->getPost('address'),
            'email'        => $this->request->getPost('email'),
        ];
    

        // Update data user berdasarkan ID
        $userModel->update($userID, $data);

        return redirect()->to('/akun')->with('success', 'Profil berhasil diperbarui!');
    }
}
