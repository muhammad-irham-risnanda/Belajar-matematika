<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_fpb_model extends CI_Model {
    public function update_skor($id, $skor) {
        $this->db->where('id', $id);
        $this->db->update('siswa_fpb', ['skor' => $skor]);
    }

    public function get_siswa_by_id($id) {
        return $this->db->get_where('siswa_fpb', ['id' => $id])->row();
    }
    
    public function get_all() {
        return $this->db->get('siswa_fpb')->result();
    }
}