<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

    public function register($data) {
        return $this->db->insert('students', $data);
    }

    public function login($username, $class, $password) {
        $this->db->where('username', $username);
        $this->db->where('class', $class);
        $query = $this->db->get('students');

        if ($query->num_rows() == 1) {
            $student = $query->row();
            if (password_verify($password, $student->password)) {
                return $student;
            }
        }
        return false;
    }

    public function get_all_students() {
        $query = $this->db->get('students'); // Mengambil semua data dari tabel 'students'
        return $query->result(); // Mengembalikan hasil sebagai array objek
    }
    
    public function get_student_by_id($id) {
        $this->db->where('id', $id);
        return $this->db->get('students')->row();
    }
    
    public function update_student($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('students', $data);
    }

    public function delete_student($id) {
        $this->db->where('id', $id);
        return $this->db->delete('students');
    }

    public function student_exists($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('students');
        return $query->num_rows() > 0;
    }

    public function save_student_data($nama, $kelas, $skor) {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'skor' => $skor
        ];
        return $this->db->insert('siswa', $data);
    }

    public function update_skor($siswa_id, $skor) {
        $this->db->where('id', $siswa_id);
        return $this->db->update('siswa', ['skor' => $skor]);
    }

    public function login_fpb($username, $class, $password) {
        $this->db->where('username', $username);
        $this->db->where('class', $class);
        $query = $this->db->get('students');
    
        if ($query->num_rows() == 1) {
            $user = $query->row();
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }
        return false;
    }
    
    public function save_student_data_fpb($nama, $kelas, $skor, $table = 'siswa_fpb') {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'skor' => $skor
        ];
        return $this->db->insert($table, $data);
    }
    
    public function update_skor_fpb($siswa_id, $skor, $table = 'siswa_fpb') {
        $this->db->where('id', $siswa_id);
        return $this->db->update($table, ['skor' => $skor]);
    }

    public function login_faktor_prima($username, $class, $password) {
        $this->db->where('username', $username);
        $this->db->where('class', $class);
        $query = $this->db->get('students');
    
        if ($query->num_rows() == 1) {
            $user = $query->row();
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }
        return false;
    }
    
    public function save_student_data_faktor_prima($nama, $kelas, $skor, $table = 'siswa_fpb') {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'skor' => $skor
        ];
        return $this->db->insert($table, $data);
    }
    
    public function update_skor_faktor_prima($siswa_id, $skor, $table = 'siswa_fpb') {
        $this->db->where('id', $siswa_id);
        return $this->db->update($table, ['skor' => $skor]);
    }
    
    public function login_evaluasi($username, $class, $password) {
        $this->db->where('username', $username);
        $this->db->where('class', $class);
        $query = $this->db->get('students');
    
        if ($query->num_rows() == 1) {
            $user = $query->row();
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }
        return false;
    }
    
    public function save_student_data_evaluasi($nama, $kelas, $skor, $table = 'siswa_fpb') {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'skor' => $skor
        ];
        return $this->db->insert($table, $data);
    }
    
    public function update_skor_evaluasi($siswa_id, $skor, $table = 'siswa_fpb') {
        $this->db->where('id', $siswa_id);
        return $this->db->update($table, ['skor' => $skor]);
    }
}