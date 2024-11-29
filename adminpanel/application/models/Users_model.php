<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('users_tbl', $data);
    }

    public function get_all()
    {
        return $this->db->get('users_tbl')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('users_tbl', ['id' => $id])->row();
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('users_tbl', $data);
    }

    public function delete($id)
    {
        $this->db->delete('users_tbl', ['id' => $id]);
    }
}

