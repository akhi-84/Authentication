<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    public function get_all_categories() {
        $query = $this->db->get('categories');
        return $query->num_rows() > 0 ? $query->result() : [];
    }
    public function get_category($id) {
        $query = $this->db->get_where('categories', ['id' => $id]);
        return $query->row();
    }
    public function create_category($data) {
        if ($this->db->insert('categories', $data)) {
            return $this->db->insert_id();  // Return the insert ID on success
        }
        return false;
    }

    // Update an existing category
    public function update_category($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('categories', $data);
    }
    public function delete_category($id) {
        $this->db->where('id', $id);
        return $this->db->delete('categories');
    }
    public function soft_delete_category($id) {
        $this->db->where('id', $id);
        return $this->db->update('categories', ['deleted' => 1]);
    }
}




