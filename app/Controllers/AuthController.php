<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function registerPage()
    {
        return view('auth/register');
    }

    public function loginPage()
    {
        return view('auth/login');
    }

    public function register()
{
    $userModel = new UserModel();

    $data = [
        'full_name'    => $this->request->getPost('full_name'),
        'phone_number' => $this->request->getPost('phone_number'),
        'address'      => $this->request->getPost('address'),
        'email'        => $this->request->getPost('email'),
        'password'     => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT)
    ];

    $userModel->insert($data);

    return redirect()->to('/login')->with('success', 'Akun berhasil dibuat!');
}


   public function login()
   {
      $session = session();
      $userModel = new UserModel();
      $email = $this->request->getPost('email');
      $password = $this->request->getPost('password');

      $user = $userModel->where('email', $email)->first();

      if ($user && password_verify($password, $user['password'])) {
         $session->set('user_id', $user['id']);
         return $this->response->setJSON(['success' => true]);
      } else {
         return $this->response->setJSON(['success' => false]);
      }
   }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
