<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminsModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function process()
    {
        $admins = new AdminsModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataAdmin = $admins->where([
            'username' => $username,
        ])->first();
        if ($dataAdmin) {
            if (password_verify($password, $dataAdmin['password'])) {
                session()->set([
                    'username' => $dataAdmin['username'],
                    'name' => $dataAdmin['name'],
                    'logged_in' => TRUE
                ]);
                return redirect('admin/news');
            } else {
                session()->setFlashdata('error', 'Password Salah !');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username tidak ditemukan');
            return redirect()->back();
        }
    }

    function logout()
    {
        session()->destroy();
        return redirect('login');
    }
}
