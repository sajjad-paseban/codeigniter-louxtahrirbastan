<?php 

class password_model extends CI_Model{

    public function change_password($user_id,$hashed_password){
        return $this->db->where('id',$user_id)->update('users',['password'=>$hashed_password]);
    }
}