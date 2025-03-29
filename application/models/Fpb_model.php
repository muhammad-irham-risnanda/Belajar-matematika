<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fpb_model extends CI_Model {
    public function get($id) {
        return $this->db->get_where('fpb', ['id' => $id])->row();
    }
    
    public function get_all() {
        return $this->db->get('fpb')->result();
    }

    public function insert($data) {
        return $this->db->insert('fpb', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('fpb', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('fpb');
    }
}