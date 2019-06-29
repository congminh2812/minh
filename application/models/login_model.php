<?php
    Class Login_Model extends CI_Model{
        
        function login($username,$password){
            $this->db->where('username',$username);
            $this->db->where('password',$password);
            $query = $this->db->get('account');

            return $query->result_array();
        }
       
    }
?>