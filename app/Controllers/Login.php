<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController
{
    protected $loginModel;
    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }
    public function index()
    {
        $login = $this->request->getPost('login');
        if ($login) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            if ($username == '' or $password == '') {
                $err = "Silakan masukkan username dan password";
            }
            if (empty($err)) {
                $dataAdmin = $this->loginModel->where("username", $username);
                if ($dataAdmin->countAllResults() == 0) {
                    $err = "Username tidak terdaftar";
                } else {
                    $dataAdmin = $dataAdmin->first();
                    if ($dataAdmin['password'] != md5($password)) {
                        $err = "Username dan password tidak sesuai";
                    }
                }
            }
            if (empty($err)) {
                $dataSesi = [
                    'username' => $dataAdmin['username'],
                    'nama_admin' => $dataAdmin['nama_admin'],
                    'id_role' => $dataAdmin['id_role']
                ];
                session()->set($dataSesi);
                return redirect()->to('/mahasiswa');
            }
            if ($err) {
                session()->setFlashdata('username', $username);
                session()->setFlashdata('error', $err);
                return redirect()->to('/login');
            }
        }
        return view('login');
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}