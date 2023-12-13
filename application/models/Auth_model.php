<?php
class Auth_model extends CI_Model {

    public function checklogin($email, $password)
    {
        $query = $this->db->query("SELECT * FROM `users` WHERE status=1 ");

        $md5_password = md5($password);

        foreach ($query->result() as $row)
        {
            if($row->email == $email && $row->password == $md5_password){
                return true;
            }
        }
        
        return false;
    }


}