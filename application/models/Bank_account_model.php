<?php


class bank_account_model extends CI_Model
{
	public function insert($name_of_bank){
		if ($this->db->where('name',$name_of_bank)->get('banks')->num_rows() > 0){
			return false;
		}else{
			return $this->db->insert('banks',array('name'=>$name_of_bank));
		}
	}

	public function get_all_bank_accounts(){
		return $this->db->order_by('id','desc')->get('banks')->result();
	}

	public function delete($id){
		return $this->db->where('id',$id)->delete('banks');
	}

	public function get_specefic_bank_accounts_sells($id,$limit,$start){
		return $this->db->limit($limit,$start)->select('bank_sell.date as bs_date,bank_sell.id as bs_id,shops.name as s_name,banks.name as b_name,bank_sell.price as bs_price')->from('bank_sell')->where('bank_sell.bank_id',$id)->join('shops','bank_sell.shop_id = shops.id')->join('banks','banks.id ='.$id)->order_by('bank_sell.date','desc')->order_by('bank_sell.id','desc')->get()->result();
	}
	public function get_count($id){
		return $this->db->select('bank_sell.date as bs_date,bank_sell.id as bs_id,shops.name as s_name,banks.name as b_name,bank_sell.price as bs_price')->from('bank_sell')->where('bank_sell.bank_id',$id)->join('shops','bank_sell.shop_id = shops.id')->join('banks','banks.id ='.$id)->order_by('bank_sell.date','desc')->order_by('bank_sell.id','desc')->get()->num_rows();
	}
}
