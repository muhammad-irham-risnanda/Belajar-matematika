<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class faktor_prima_model extends CI_Model {
    public function get($id) {
        return $this->db->get_where('faktor_prima', ['id' => $id])->row();
    }
    
    public function get_all() {
        return $this->db->get('faktor_prima')->result();
    }

    public function insert($data) {
        return $this->db->insert('faktor_prima', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('faktor_prima', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('faktor_prima');
    }
}