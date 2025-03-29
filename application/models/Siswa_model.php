<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {
    public function update_skor($id, $skor) {
        $this->db->where('id', $id);
        $this->db->update('siswa', ['skor' => $skor]);
    }

    public function get_siswa_by_id($id) {
        return $this->db->get_where('siswa', ['id' => $id])->row();
    }
    
    public function get_all() {
        return $this->db->get('siswa')->result();
    }
}