<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;


class Mahasiswa extends BaseController
{
    protected $mahasiswaModel;
    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
    }
    public function index()
    {
        $data = [
            'current_page' => 'mahasiswa',
            'title' => 'Data Mahasiswa',
            'mahasiswa' => $this->mahasiswaModel->getMahasiswa()
        ];
        return view('mahasiswa/data_mahasiswa', $data);
    }

    public function detail($nim)
    {
        $data = [
            'current_page' => 'mahasiswa',
            'title' => 'Detail Mahasiswa',
            'mahasiswa' => $this->mahasiswaModel->getMahasiswa($nim)
        ];


        // jika mahasiswa tidak ada di tabel
        if (empty($data['mahasiswa'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Mahasiswa dengan NIM' . $nim . ' tidak ditemukan.');
        }
        return view('mahasiswa/detail', $data);
    }

    public function create()
    {
        helper(['form', 'url']);
        $data = [
            'current_page' => 'mahasiswa',
            'title' => 'Form Tambah Data Mahasiswa',
            'prodi' => $this->mahasiswaModel->getProdi(),
            'kelas' => $this->mahasiswaModel->getKelas(),
            'semester' => $this->mahasiswaModel->getSemester(),
            'angkatan' => $this->mahasiswaModel->getAngkatan(),
            
        ];
        return view('mahasiswa/create', $data);
    }

    public function save()
    {
        if (!$this->validate([

            'nama_mhs' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi.',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi.',
                ]
            ],
            'telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Telepon harus diisi.',
                ]
            ]
        ])) {

            return redirect()->to('/mahasiswa/create')->withInput();
        }

        $this->mahasiswaModel->save([
            'nama_mhs' => $this->request->getVar('nama_mhs'),
            'id_prodi' => $this->request->getVar('id_prodi'),
            'id_kelas' => $this->request->getVar('id_kelas'),
            'id_semester' => $this->request->getVar('id_semester'),
            'id_angkatan' => $this->request->getVar('id_angkatan'),
            'alamat' => $this->request->getVar('alamat'),
            'telepon' => $this->request->getVar('telepon'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/mahasiswa');
    }

    public function edit($nim)
    {
        $data = [
            'current_page' => 'mahasiswa',
            'title' => 'Form Edit Data Mahasiswa',
            'validation' => \Config\Services::validation(),
            'mahasiswa' => $this->mahasiswaModel->getMahasiswa($nim),
            'prodi' => $this->mahasiswaModel->getProdi(),
            'kelas' => $this->mahasiswaModel->getKelas(),
            'semester' => $this->mahasiswaModel->getSemester(),
            'angkatan' => $this->mahasiswaModel->getAngkatan(),
        ];

        return view('mahasiswa/edit', $data);
    }
    public function update($nim)
    {
        if (!$this->validate([

            'nama_mhs' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi.',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi.',
                ]
            ],
            'telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Telepon harus diisi.',
                ]
            ]
        ])) {

            return redirect()->to('/mahasiswa/edit/'. $this->request->getVar('nim'))->withInput();
        }
        
        $this->mahasiswaModel->save([
            'nim' => $this->request->getVar('nim'),
            'nama_mhs' => $this->request->getVar('nama_mhs'),
            'id_prodi' => $this->request->getVar('id_prodi'),
            'id_kelas' => $this->request->getVar('id_kelas'),
            'id_semester' => $this->request->getVar('id_semester'),
            'id_angkatan' => $this->request->getVar('id_angkatan'),
            'alamat' => $this->request->getVar('alamat'),
            'telepon' => $this->request->getVar('telepon'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/mahasiswa');
    }

    public function delete($nim)
    {

        $this->mahasiswaModel->delete($nim);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/mahasiswa');
    }

}