<?php

class User extends CI_Model {

    function getByEmail($email = '')
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        
        $query = $this->db->get();
        return $query->result();
    }

    function getAll(){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->order_by('created_at', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
}