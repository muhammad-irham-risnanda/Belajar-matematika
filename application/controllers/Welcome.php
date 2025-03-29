<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('TimeLimit_model');
        $this->load->model('Student_model');
        $this->load->model('User_model');
        $this->load->model('Siswa_model');
        $this->load->model('Kpk_model');
        $this->load->model('Siswa_fpb_model');
        $this->load->model('Fpb_model');
        $this->load->model('Siswa_Faktor_prima_model');
        $this->load->model('Faktor_prima_model');
        $this->load->model('Siswa_evaluasi_model');
        $this->load->model('Evaluation_model');
        // Pastikan pengguna sudah login
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['title'] = 'Dashboard';
        $data['username'] = $this->session->userdata('username');
        $data['students'] = $this->Student_model->get_all_students();
        $data['users'] = $this->User_model->get_all_users();
        $this->load->view('guru/layouts', $data);
    }

    public function list_guru_siswa() {
        $data['title'] = 'List Guru dan Siswa';
        $data['username'] = $this->session->userdata('username');
        $data['students'] = $this->Student_model->get_all_students();
        $data['users'] = $this->User_model->get_all_users();
        $this->load->view('guru/layouts', $data);
    }

    public function list_soal() {
        $data['title'] = 'List Soal';
        $data['username'] = $this->session->userdata('username');    
        $data['kpks'] = $this->Kpk_model->get_all();
        $data['fpbs'] = $this->Fpb_model->get_all();
        $data['faktor_primas'] = $this->Faktor_prima_model->get_all();
        $data['evaluations'] = $this->Evaluation_model->get_all();
        $data['time_limits'] = $this->TimeLimit_model->get_all();
        $this->load->view('guru/layouts_soal', $data);
    }
    
    public function list_nilai() {
        $data['title'] = 'List Nilai';
        $data['username'] = $this->session->userdata('username');    
        $data['siswa'] = $this->Siswa_model->get_all();
        $data['siswa_fpb'] = $this->Siswa_fpb_model->get_all();
        $data['siswa_faktor_prima'] = $this->Siswa_Faktor_prima_model->get_all();
        $data['siswa_evaluasi'] = $this->Siswa_evaluasi_model->get_all();
        $this->load->view('guru/layouts_nilai', $data);
    }
    
    public function edit_guru($id) {
        $data['user'] = $this->User_model->get_user_by_id($id);
        $this->load->view('guru/buat-edit/edit_guru_view', $data);
    }

    // Fungsi untuk mengupdate data guru
    public function update_guru() {
        $id = $this->input->post('id');
        $data = array(
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT) // Hash password
        );
        $this->User_model->update_user($id, $data);
        redirect('welcome/list_guru_siswa');
    }

    // Fungsi untuk menghapus data guru
    public function delete_guru($id) {
        $this->User_model->delete_user($id);
        redirect('welcome/list_guru_siswa');
    }

    // Fungsi untuk mengedit data siswa
    public function edit_siswa($id) {
        $data['student'] = $this->Student_model->get_student_by_id($id);
        $this->load->view('guru/buat-edit/edit_siswa_view', $data);
    }

    // Fungsi untuk mengupdate data siswa
    public function update_siswa() {
        $id = $this->input->post('id');
        $data = array(
            'username' => $this->input->post('username'),
            'class' => $this->input->post('class'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT) // Hash password
        );
        $this->Student_model->update_student($id, $data);
        redirect('welcome/buat-edit/list_guru_siswa');
    }

    // Fungsi untuk menghapus data siswa
    public function delete_siswa($id) {
        $this->Student_model->delete_student($id);
        redirect('welcome/list_guru_siswa');
    }

    public function create_waktu() {
        if ($this->input->post()) {
            // Ambil data dari form
            $limit_hours = $this->input->post('limit_hours');
            $limit_minutes = $this->input->post('limit_minutes');
    
            // Konversi jam dan menit menjadi total menit
            $total_minutes = ($limit_hours * 60) + $limit_minutes;
    
            // Siapkan data untuk disimpan
            $data = [
                'time_limit' => $total_minutes // Pastikan kolom di database adalah time_limit
            ];
    
            // Simpan data ke database
            $this->TimeLimit_model->insert_time_limit($data);
            redirect('welcome/list_soal');
        }
        $this->load->view('guru/buat-edit/create_time_limit');
    }

    public function edit_waktu($id) {
        $this->load->model('TimeLimit_model');
        
        // Ambil data batas waktu berdasarkan ID
        $data['time_limit'] = $this->TimeLimit_model->get_time_limit($id);
        
        if ($this->input->post()) {
            // Ambil data dari form
            $limit_hours = $this->input->post('limit_hours');
            $limit_minutes = $this->input->post('limit_minutes');
    
            // Konversi jam dan menit menjadi total menit
            $total_minutes = ($limit_hours * 60) + $limit_minutes;
    
            // Siapkan data untuk diperbarui
            $update_data = [
                'time_limit' => $total_minutes // Pastikan kolom di database adalah time_limit
            ];
    
            // Update data di database
            $this->TimeLimit_model->update_time_limit($id, $update_data);
            redirect('welcome/list_soal');
        }
        
        $this->load->view('guru/buat-edit/edit_time_limit', $data);
    }

    public function delete_waktu($id) {
        $this->load->model('TimeLimit_model');
        $this->TimeLimit_model->delete_time_limit($id);
        redirect('welcome/list_soal');
    }

    public function create_kpk() {
        $this->load->view('guru/buat-edit/create_kpk');
    }

    public function store_kpk() {
        $data = [
            'question' => $this->input->post('question'),
            'option_a' => $this->input->post('option_a'),
            'option_b' => $this->input->post('option_b'),
            'option_c' => $this->input->post('option_c'),
            'option_d' => $this->input->post('option_d'),
            'answer' => $this->input->post('answer')
        ];
        $this->Kpk_model->insert($data);
        redirect('welcome/buat-edit/list_soal');
    }

    public function edit_kpk($id) {
        $data['kpk'] = $this->Kpk_model->get($id);
        $this->load->view('guru/buat-edit/edit_kpk', $data);
    }

    public function update_kpk($id) {
        $data = [
            'question' => $this->input->post('question'),
            'option_a' => $this->input->post('option_a'),
            'option_b' => $this->input->post('option_b'),
            'option_c' => $this->input->post('option_c'),
            'option_d' => $this->input->post('option_d'),
            'answer' => $this->input->post('answer')
        ];
        $this->Kpk_model->update($id, $data);
        redirect('welcome/buat-edit/list_soal');
    }

    public function delete_kpk($id) {
        $this->Kpk_model->delete($id);
        redirect('welcome');
    }

    public function create_fpb() {
        $this->load->view('guru/buat-edit/create_fpb');
    }

    public function store_fpb() {
        $data = [
            'question' => $this->input->post('question'),
            'option_a' => $this->input->post('option_a'),
            'option_b' => $this->input->post('option_b'),
            'option_c' => $this->input->post('option_c'),
            'option_d' => $this->input->post('option_d'),
            'answer' => $this->input->post('answer')
        ];
        $this->Fpb_model->insert($data);
        redirect('welcome/list_soal');
    }

    public function edit_fpb($id) {
        $data['fpb'] = $this->Fpb_model->get($id);
        $this->load->view('guru/buat-edit/edit_fpb', $data);
    }

    public function update_fpb($id) {
        $data = [
            'question' => $this->input->post('question'),
            'option_a' => $this->input->post('option_a'),
            'option_b' => $this->input->post('option_b'),
            'option_c' => $this->input->post('option_c'),
            'option_d' => $this->input->post('option_d'),
            'answer' => $this->input->post('answer')
        ];
        $this->Fpb_model->update($id, $data);
        redirect('welcome');
    }

    public function delete_fpb($id) {
        $this->Fpb_model->delete($id);
        redirect('welcome');
    }

    public function create_faktor_prima() {
        $this->load->view('guru/buat-edit/create_faktor_prima');
    }

    public function store_faktor_prima() {
        $data = [
            'question' => $this->input->post('question'),
            'option_a' => $this->input->post('option_a'),
            'option_b' => $this->input->post('option_b'),
            'option_c' => $this->input->post('option_c'),
            'option_d' => $this->input->post('option_d'),
            'answer' => $this->input->post('answer')
        ];
        $this->Faktor_prima_model->insert($data);
        redirect('welcome/list_soal');
    }

    public function edit_faktor_prima($id) {
        $data['faktor_prima'] = $this->Faktor_prima_model->get($id);
        $this->load->view('guru/buat-edit/edit_faktor_prima', $data);
    }

    public function update_faktor_prima($id) {
        $data = [
            'question' => $this->input->post('question'),
            'option_a' => $this->input->post('option_a'),
            'option_b' => $this->input->post('option_b'),
            'option_c' => $this->input->post('option_c'),
            'option_d' => $this->input->post('option_d'),
            'answer' => $this->input->post('answer')
        ];
        $this->Faktor_prima_model->update($id, $data);
        redirect('welcome/list_soal');
    }

    public function delete_faktor_prima($id) {
        $this->Faktor_prima_model->delete($id);
        redirect('welcome/faktor_prima');
    }

    public function create_evaluasi() {
        $this->load->view('guru/buat-edit/create_evaluation');
    }

    public function store_evaluasi() {
        $data = [
            'question' => $this->input->post('question'),
            'option_a' => $this->input->post('option_a'),
            'option_b' => $this->input->post('option_b'),
            'option_c' => $this->input->post('option_c'),
            'option_d' => $this->input->post('option_d'),
            'answer' => $this->input->post('answer')
        ];
        $this->Evaluation_model->insert($data);
        redirect('welcome/list_soal');
    }

    public function edit_evaluasi($id) {
        $data['evaluation'] = $this->Evaluation_model->get($id);
        $this->load->view('guru/buat-edit/edit_evaluation', $data);
    }

    public function update_evaluasi($id) {
        $data = [
            'question' => $this->input->post('question'),
            'option_a' => $this->input->post('option_a'),
            'option_b' => $this->input->post('option_b'),
            'option_c' => $this->input->post('option_c'),
            'option_d' => $this->input->post('option_d'),
            'answer' => $this->input->post('answer')
        ];
        $this->Evaluation_model->update($id, $data);
        redirect('welcome/list_soal');
    }

    public function delete_evaluasi($id) {
        $this->Evaluation_model->delete($id);
        redirect('welcome');
    }
}