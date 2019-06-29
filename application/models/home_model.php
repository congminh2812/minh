<?php
    Class Home_Model extends CI_Model{
        
        function insert($data){
            $sql = "INSERT INTO account (username,password,email,displayname,status)
            VALUES ('$data->username','$data->password','$data->email','$data->displayname',$data->status)";
            $this->db->trans_start();
            $this->db->query($sql);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                return false;
            } else {
                return true;
            }
            // $this->db->set($data);
            // $this->db->insert('account');
        }

        function update($data){
            $sql = "UPDATE account set email = ?, displayname = ?, status = ? WHERE id = ?";
            $this->db->trans_start();
            $this->db->query($sql);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                return false;
            } else {
                return true;
            }
        }

        function getList($tableName){
            $query = $this->db->get($tableName);
            return $query->result_array();
        }
    }
?>