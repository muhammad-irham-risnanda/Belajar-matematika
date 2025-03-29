<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluation_model extends CI_Model {
    public function get_all() {
        return $this->db->get('evaluasi')->result();
    }

    public function get($id) {
        return $this->db->get_where('evaluasi', ['id' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('evaluasi', $data);
    }

    public function update($id, $data) {
        return $this->db->update('evaluasi', $data, ['id' => $id]);
    }

    public function delete($id) {
        return $this->db->delete('evaluasi', ['id' => $id]);
    }

    public function insert_result($data) {
        return $this->db->insert('siswa_evaluasi', $data);
    }
}
?>