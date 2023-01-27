<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;


class Prodi extends BaseController
{
    protected $mahasiswaModel;
    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
    }
    public function index()
    {
        $data = [
            'current_page' => 'prodi',
            'title' => 'Data Prodi',
            'prodi' => $this->mahasiswaModel->getProdi()
        ];
        return view('prodi/data_prodi', $data);
    }

}