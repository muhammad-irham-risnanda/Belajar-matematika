<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_faktor_prima_model extends CI_Model {
    public function insert($data) {
        $this->db->insert('siswa_faktor_prima', $data);
        return $this->db->insert_id();
    }

    public function update_skor($id, $skor) {
        $this->db->where('id', $id);
        $this->db->update('siswa_faktor_prima', ['skor' => $skor]);
    }

    public function get_siswa_by_id($id) {
        return $this->db->get_where('siswa_faktor_prima', ['id' => $id])->row();
    }
    
    public function get_all() {
        return $this->db->get('siswa_faktor_prima')->result();
    }
}