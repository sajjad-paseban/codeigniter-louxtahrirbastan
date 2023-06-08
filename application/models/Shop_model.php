<?php


class shop_model extends CI_Model
{
	public function insert($shop_name){
		if ($this->db->where('name',$shop_name)->get('shops')->num_rows() > 0){
			return false;
		}else{
			return $this->db->insert('shops',array('name'=>$shop_name));
		}
	}

	public function get_all_shops(){
		return $this->db->get('shops')->result();
	}

	public function delete($id){
		return $this->db->where('id',$id)->delete('shops');
	}
}
