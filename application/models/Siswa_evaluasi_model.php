<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_evaluasi_model extends CI_Model {
    public function insert($data) {
        $this->db->insert('siswa_evaluasi', $data);
        return $this->db->insert_id();
    }

    public function update_skor($id, $skor) {
        $this->db->where('id', $id);
        $this->db->update('siswa_evaluasi', ['skor' => $skor]);
    }

    public function get_siswa_by_id($id) {
        return $this->db->get_where('siswa_evaluasi', ['id' => $id])->row();
    }
    
    public function get_all() {
        return $this->db->get('siswa_evaluasi')->result();
    }
}