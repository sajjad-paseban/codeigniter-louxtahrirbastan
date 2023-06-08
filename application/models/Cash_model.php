<?php


class cash_model extends CI_Model
{
	public function insert($data){
		if ($this->db->where('name',$data['name'])->get('cashes')->num_rows() > 0){
			return false;
		}else{
			return $this->db->insert('cashes',$data);
		}
	}
	public function get_all_cashes(){
//		return $this->db->order_by('id','desc')->get('cashes')->result();
		return $this->db->select('cashes.id as c_id,cashes.name as c_name,shops.name as s_name,shops.id as s_id')->from('cashes')->join('shops','shops.id = cashes.shop_id')->get()->result();

	}
	public function delete($id){
		return $this->db->where('id',$id)->delete('cashes');
	}
}
