<?php


class user_model extends CI_Model
{
	public function insert($data){
		if ($this->db->where('email',$data['email'])->get('users')->num_rows() > 0){
			return false;
		}else{
			return $this->db->insert('users',$data);
		}
	}

	public function check_user($data){
		$query = $this->db->where('email',$data['email'])->get('users');
		if($query->num_rows() == 1){
			if (password_verify($data['password'],$query->row()->password)){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function get_user($email){
		return $this->db->where('email',$email)->get('users')->row();
	}

	public function update_user_state($email,$val){
		return $this->db->where('email',$email)->update('users',array('user_state'=>$val));
	}

	public function online_user(){
		return $this->db->where('user_state',1)->get('users')->result();
	}

}
