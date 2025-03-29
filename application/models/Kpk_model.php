<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kpk_model extends CI_Model {
    public function get($id) {
        return $this->db->get_where('kpk', ['id' => $id])->row();
    }
    
    public function get_all() {
        return $this->db->get('kpk')->result();
    }

    public function insert($data) {
        return $this->db->insert('kpk', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('kpk', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('kpk');
    }
}