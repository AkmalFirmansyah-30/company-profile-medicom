<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel; // Kita buat modelnya sebentar lagi

class AuthController extends BaseController
{
    public function index()
    {
        // Jika sudah login, lempar ke admin
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }
        return view('auth/login');
    }

    public function loginProcess()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('cms_users');
        
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $builder->getWhere(['username' => $username])->getRowArray();

        if ($user) {
            // Verifikasi Password Hash
            if (password_verify($password, $user['password'])) {
                // Set Session
                session()->set([
                    'isLoggedIn' => true,
                    'username' => $user['username'],
                ]);
                return redirect()->to('/admin');
            }
        }

        return redirect()->to('/login')->with('error', 'Username atau Password salah');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}