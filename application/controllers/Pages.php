<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('TimeLimit_model');
        $this->load->model('Student_model');
        $this->load->model('Siswa_model');
        $this->load->model('Kpk_model');
        $this->load->model('Siswa_fpb_model');
        $this->load->model('Fpb_model');
        $this->load->model('Siswa_faktor_prima_model');
        $this->load->model('Faktor_prima_model');
        $this->load->model('Siswa_evaluasi_model');
        $this->load->model('Evaluation_model');
    }

    public function index()
    {
        if (!$this->session->userdata('student_id')) {
            redirect('auth/login_siswa');
        }
        $data['username'] = $this->session->userdata('username');
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/home', $data);
        $this->load->view('student/footer');
    }

    public function home()
    {
        if (!$this->session->userdata('student_id')) {
            redirect('auth/login_siswa');
        }
        $data['username'] = $this->session->userdata('username');
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/home', $data);
        $this->load->view('student/footer');
    }


    public function tujuan()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/tujuan');
        $this->load->view('student/footer');
    }

    public function info()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/pembuat');
        $this->load->view('student/footer');
    }

    public function materi()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/materi');
        $this->load->view('student/footer');
    }

    public function kpk_materi()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/kpk/materi');
        $this->load->view('student/footer');
    }

    public function kpk_latihan()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/kpk/latihan');
        $this->load->view('student/footer');
    }

    public function kpk_materi2()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/kpk/materi2');
        $this->load->view('student/footer');
    }

    public function kpk_latihan2()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/kpk/latihan2');
        $this->load->view('student/footer');
    }

    public function kpk_materi3()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/kpk/materi3');
        $this->load->view('student/footer');

    }

    public function kpk_latihan3()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/kpk/latihan3');
        $this->load->view('student/footer');
    }

    public function video_kpk()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/kpk/video');
        $this->load->view('student/footer');
    }

    public function kpk()
    {
        $this->load->view('student/kpk/daftar_view');
    }

    public function authenticate()
    {
        $username = $this->input->post('username');
        $kelas = $this->input->post('kelas');
        $password = $this->input->post('password');

        // Cek apakah akun ada
        $user = $this->Student_model->login($username, $kelas, $password);

        if ($user) {
            // Jika login berhasil, simpan ID siswa ke session
            $this->session->set_userdata('siswa_id', $user->id);

            // Simpan data siswa ke tabel siswa
            $nama = $user->username; // Asumsikan username adalah nama siswa
            $skor = 0; // Set skor awal ke 0
            $this->Student_model->save_student_data($nama, $kelas, $skor);

            redirect('pages/soal_kpk/1'); // Arahkan ke halaman soal KPK
        } else {
            // Jika login gagal, kembali ke halaman login dengan pesan error
            $this->session->set_flashdata('error', 'Login gagal! Username, kelas, atau password salah.');
            redirect('pages/kpk');
        }
    }

    public function soal_kpk($id)
    {
        // Cek apakah pengguna sudah login
        if (!$this->session->userdata('siswa_id')) {
            redirect('auth/login');
        }

        // Ambil data waktu limit berdasarkan ID
        $data['time_limit'] = $this->TimeLimit_model->get_time_limit($id);
        // Pastikan data diambil dengan benar
        if (!$data['time_limit']) {
            // Jika tidak ada data, Anda bisa mengarahkan ke halaman lain atau menampilkan pesan
            show_404(); // Menampilkan halaman 404 jika tidak ditemukan
        }
        // Muat view dengan data yang diambil
        $data['kpks'] = $this->Kpk_model->get_all(); // Ambil semua soal KPK

        // Pastikan soal KPK diambil dengan benar
        if (!$data['kpks']) {
            show_404(); // Menampilkan halaman 404 jika tidak ditemukan
        }

        // Muat view dengan data yang diambil
        $this->load->view('student/kpk/soal_view', $data);
    }

    public function submit_soal_kpk()
    {
        // Check if the user is logged in
        if (!$this->session->userdata('siswa_id')) {
            // Redirect to login if not logged in
            redirect('auth/login');
        }

        $score = 0;
        $questions = $this->Kpk_model->get_all();

        foreach ($questions as $question) {
            // Check if the answer is provided
            if ($this->input->post('answer_' . $question->id) !== null) {
                if ($this->input->post('answer_' . $question->id) == $question->answer) {
                    $score++;
                }
            }
        }

        // Ambil ID siswa dari session
        $siswa_id = $this->session->userdata('siswa_id');

        // Update skor di tabel siswa
        if ($this->Student_model->update_skor($siswa_id, $score)) {
            $data['score'] = $score;
            $data['total_questions'] = count($questions); // Total soal untuk ditampilkan
            $this->load->view('student/kpk/hasil_view', $data);
        } else {
            // Handle error in updating score
            $this->session->set_flashdata('error', 'Gagal memperbarui skor. Silakan coba lagi.');
            redirect('pages/soal_kpk'); // Redirect back to the quiz
        }
    }

    public function fpb_materi()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/fpb/materi');
        $this->load->view('student/footer');
    }
    public function fpb_latihan()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/fpb/latihan');
        $this->load->view('student/footer');
    }
    public function fpb_materi2()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/fpb/materi2');
        $this->load->view('student/footer');
    }

    public function fpb_latihan2()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/fpb/latihan2');
        $this->load->view('student/footer');
    }
    public function fpb_materi3()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/fpb/materi3');
        $this->load->view('student/footer');
    }
    public function fpb_latihan3()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/fpb/latihan3');
        $this->load->view('student/footer');
    }
    public function video_fpb()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/fpb/video');
        $this->load->view('student/footer');
    }

    public function fpb()
    {
        $this->load->view('student/fpb/daftar_view'); // Mengubah nama view sesuai konteks
    }

    public function authenticate_fpb()
    {
        $username = $this->input->post('username');
        $kelas = $this->input->post('kelas');
        $password = $this->input->post('password');

        // Cek apakah akun ada
        $user = $this->Student_model->login_fpb($username, $kelas, $password);

        if ($user) {
            // Jika login berhasil, simpan ID siswa ke session
            $this->session->set_userdata('siswa_id', $user->id);

            // Simpan data siswa ke tabel siswa_fpb
            $nama = $user->username; // Asumsikan username adalah nama siswa
            $skor = 0; // Set skor awal ke 0
            $this->Student_model->save_student_data_fpb($nama, $kelas, $skor, 'siswa_fpb'); // Menambahkan parameter untuk tabel

            redirect('pages/soal_fpb/1'); // Arahkan ke halaman soal FPB
        } else {
            // Jika login gagal, kembali ke halaman login dengan pesan error
            $this->session->set_flashdata('error', 'Login gagal! Username, kelas, atau password salah.');
            redirect('pages/fpb');
        }
    }

    public function soal_fpb($id)
    {
        if (!$this->session->userdata('siswa_id')) {
            redirect('auth/login');
        }

        // Ambil data waktu limit berdasarkan ID
        $data['time_limit'] = $this->TimeLimit_model->get_time_limit($id);
        // Pastikan data diambil dengan benar
        if (!$data['time_limit']) {
            // Jika tidak ada data, Anda bisa mengarahkan ke halaman lain atau menampilkan pesan
            show_404(); // Menampilkan halaman 404 jika tidak ditemukan
        }
        // Muat view dengan data yang diambil
        $data['fpbs'] = $this->Fpb_model->get_all(); // Ambil semua soal FPB
        $this->load->view('student/fpb/soal_view', $data);


    }

    public function submit_soal_fpb()
    {
        // Check if the user is logged in
        if (!$this->session->userdata('siswa_id')) {
            // Redirect to login if not logged in
            redirect('auth/login');
        }

        $score = 0;
        $questions = $this->Fpb_model->get_all();

        foreach ($questions as $question) {
            // Check if the answer is provided
            if ($this->input->post('answer_' . $question->id) !== null) {
                if ($this->input->post('answer_' . $question->id) == $question->answer) {
                    $score++;
                }
            }
        }

        // Ambil ID siswa dari session
        $siswa_id = $this->session->userdata('siswa_id');

        // Update skor di tabel siswa_fpb
        if ($this->Student_model->update_skor_fpb($siswa_id, $score, 'siswa_fpb')) {
            $data['score'] = $score;
            $data['total_questions'] = count($questions); // Total soal untuk ditampilkan
            $this->load->view('student/fpb/hasil_view', $data);
        } else {
            // Handle error in updating score
            $this->session->set_flashdata('error', 'Gagal memperbarui skor. Silakan coba lagi.');
            redirect('pages/soal_fpb'); // Redirect back to the quiz
        }
    }

    public function faktor_prima_materi()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/faktor_prima/materi');
        $this->load->view('student/footer');
    }

    public function faktor_prima_latihan()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/faktor_prima/latihan');
        $this->load->view('student/footer');
    }

    public function faktor_prima_materi2()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/faktor_prima/materi2');
        $this->load->view('student/footer');
    }

    public function faktor_prima_latihan2()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/faktor_prima/latihan2');
        $this->load->view('student/footer');
    }

    public function video_faktor_prima()
    {
        $this->load->view('student/header');
        $this->load->view('student/sidebar');
        $this->load->view('student/faktor_prima/video');
        $this->load->view('student/footer');
    }

    public function faktor_prima()
    {
        $this->load->view('student/faktor_prima/daftar_view');
    }

    public function authenticate_faktor_prima()
    {
        $username = $this->input->post('username');
        $kelas = $this->input->post('kelas');
        $password = $this->input->post('password');

        // Cek apakah akun ada
        $user = $this->Student_model->login_faktor_prima($username, $kelas, $password);

        if ($user) {
            // Jika login berhasil, simpan ID siswa ke session
            $this->session->set_userdata('siswa_id', $user->id);

            // Simpan data siswa ke tabel siswa_fpb
            $nama = $user->username; // Asumsikan username adalah nama siswa
            $skor = 0; // Set skor awal ke 0
            $this->Student_model->save_student_data_faktor_prima($nama, $kelas, $skor, 'siswa_faktor_prima'); // Menambahkan parameter untuk tabel

            redirect('pages/soal_faktor_prima/1'); // Arahkan ke halaman soal FPB
        } else {
            // Jika login gagal, kembali ke halaman login dengan pesan error
            $this->session->set_flashdata('error', 'Login gagal! Username, kelas, atau password salah.');
            redirect('pages/faktor_prima');
        }
    }

    public function soal_faktor_prima($id)
    {
        $data['time_limit'] = $this->TimeLimit_model->get_time_limit($id);
        // Pastikan data diambil dengan benar
        if (!$data['time_limit']) {
            // Jika tidak ada data, Anda bisa mengarahkan ke halaman lain atau menampilkan pesan
            show_404(); // Menampilkan halaman 404 jika tidak ditemukan
        }
        $data['faktor_primas'] = $this->Faktor_prima_model->get_all(); // Ambil semua soal FPB
        $this->load->view('student/faktor_prima/soal_view', $data);
    }

    public function submit_soal_faktor_prima()
    {
        // Check if the user is logged in
        if (!$this->session->userdata('siswa_id')) {
            // Redirect to login if not logged in
            redirect('auth/login');
        }

        $score = 0;
        $questions = $this->Faktor_prima_model->get_all();

        foreach ($questions as $question) {
            // Check if the answer is provided
            if ($this->input->post('answer_' . $question->id) !== null) {
                if ($this->input->post('answer_' . $question->id) == $question->answer) {
                    $score++;
                }
            }
        }

        // Ambil ID siswa dari session
        $siswa_id = $this->session->userdata('siswa_id');

        // Update skor di tabel siswa_fpb
        if ($this->Student_model->update_skor_faktor_prima($siswa_id, $score, 'siswa_fpb')) {
            $data['score'] = $score;
            $data['total_questions'] = count($questions); // Total soal untuk ditampilkan
            $this->load->view('student/faktor_prima/hasil_view', $data);
        } else {
            // Handle error in updating score
            $this->session->set_flashdata('error', 'Gagal memperbarui skor. Silakan coba lagi.');
            redirect('pages/soal_faktor_prima'); // Redirect back to the quiz
        }
    }

    public function evaluasi()
    {
        $this->load->view('student/evaluasi/daftar_view');
    }

    public function authenticate_evaluasi()
    {
        $username = $this->input->post('username');
        $kelas = $this->input->post('kelas');
        $password = $this->input->post('password');

        // Cek apakah akun ada
        $user = $this->Student_model->login_evaluasi($username, $kelas, $password);

        if ($user) {
            // Jika login berhasil, simpan ID siswa ke session
            $this->session->set_userdata('siswa_id', $user->id);

            // Simpan data siswa ke tabel siswa_fpb
            $nama = $user->username; // Asumsikan username adalah nama siswa
            $skor = 0; // Set skor awal ke 0
            $this->Student_model->save_student_data_evaluasi($nama, $kelas, $skor, 'siswa_faktor_prima'); // Menambahkan parameter untuk tabel

            redirect('pages/soal_evaluasi/1'); // Arahkan ke halaman soal FPB
        } else {
            // Jika login gagal, kembali ke halaman login dengan pesan error
            $this->session->set_flashdata('error', 'Login gagal! Username, kelas, atau password salah.');
            redirect('pages/evaluasi');
        }
    }

    public function soal_evaluasi($id)
    {
        $data['time_limit'] = $this->TimeLimit_model->get_time_limit($id);
        // Pastikan data diambil dengan benar
        if (!$data['time_limit']) {
            // Jika tidak ada data, Anda bisa mengarahkan ke halaman lain atau menampilkan pesan
            show_404(); // Menampilkan halaman 404 jika tidak ditemukan
        }
        $data['evaluations'] = $this->Evaluation_model->get_all(); // Ambil semua soal FPB
        $this->load->view('student/evaluasi/soal_view', $data);
    }

    public function submit_soal_evaluation()
    {
        // Check if the user is logged in
        if (!$this->session->userdata('siswa_id')) {
            // Redirect to login if not logged in
            redirect('auth/login');
        }

        $score = 0;
        $questions = $this->Evaluation_model->get_all();

        foreach ($questions as $question) {
            // Check if the answer is provided
            if ($this->input->post('answer_' . $question->id) !== null) {
                if ($this->input->post('answer_' . $question->id) == $question->answer) {
                    $score++;
                }
            }
        }

        // Ambil ID siswa dari session
        $siswa_id = $this->session->userdata('siswa_id');

        // Update skor di tabel siswa_fpb
        if ($this->Student_model->update_skor_evaluasi($siswa_id, $score, 'siswa_fpb')) {
            $data['score'] = $score;
            $data['total_questions'] = count($questions); // Total soal untuk ditampilkan
            $this->load->view('student/evaluasi/hasil_view', $data);
        } else {
            // Handle error in updating score
            $this->session->set_flashdata('error', 'Gagal memperbarui skor. Silakan coba lagi.');
            redirect('pages/soal_evaluasi'); // Redirect back to the quiz
        }
    }
}