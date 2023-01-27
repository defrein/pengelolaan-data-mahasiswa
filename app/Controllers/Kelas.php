<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;


class Kelas extends BaseController
{
    protected $mahasiswaModel;
    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
    }
    public function index()
    {
        $data = [
            'current_page' => 'kelas',
            'title' => 'Data Kelas',
            'kelas' => $this->mahasiswaModel->getKelas()
        ];
        return view('kelas/data_kelas', $data);
    }

}