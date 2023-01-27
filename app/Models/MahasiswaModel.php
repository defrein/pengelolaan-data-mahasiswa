<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    protected $allowedFields = ['nama_mhs', 'alamat', 'telepon', 'id_prodi', 'id_kelas', 'id_semester', 'id_angkatan'];

    public function getMahasiswa($nim = false)
    {
        if ($nim == false) {
            $this->select('nim, mahasiswa.id_prodi, mahasiswa.id_kelas, mahasiswa.id_semester, mahasiswa.id_angkatan, nama_prodi, nama_kelas, nama_semester, tahun, nama_mhs, alamat, telepon ')
                ->join('prodi', 'prodi.id_prodi=mahasiswa.id_prodi')
                ->join('kelas', 'kelas.id_kelas=mahasiswa.id_kelas')
                ->join('semester', 'semester.id_semester=mahasiswa.id_semester')
                ->join('angkatan', 'angkatan.id_angkatan=mahasiswa.id_angkatan');
            return $this->findAll();
        }

        return $this->select('nim, mahasiswa.id_prodi, mahasiswa.id_kelas, mahasiswa.id_semester, mahasiswa.id_angkatan, nama_prodi, nama_kelas, nama_semester, tahun, nama_mhs, alamat, telepon ')
        ->join('prodi', 'prodi.id_prodi=mahasiswa.id_prodi')
        ->join('kelas', 'kelas.id_kelas=mahasiswa.id_kelas')
        ->join('semester', 'semester.id_semester=mahasiswa.id_semester')
        ->join('angkatan', 'angkatan.id_angkatan=mahasiswa.id_angkatan')
        ->where(['nim' => $nim])->first();
    }

    public function getProdi() {
        return $this->db->table('prodi')->get()->getResultArray();
    }
    public function getKelas() {
        return $this->db->table('kelas')->get()->getResultArray();
    }
    public function getSemester() {
        return $this->db->table('semester')->get()->getResultArray();
    }
    public function getAngkatan() {
        return $this->db->table('angkatan')->get()->getResultArray();
    }
}