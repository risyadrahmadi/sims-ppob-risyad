<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard'); // Harus sesuai dengan file di app/Views/dashboard.php
    }
}
