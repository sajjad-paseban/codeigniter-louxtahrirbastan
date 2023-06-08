<?php


class sell_model extends CI_Model
{
	public function insert($data){
		if ($data[2] == -1){
			//cash_sell table
			$DATA['date'] = $data[0];
			$DATA['shop_id'] = $data[1];
			$DATA['cashes_id'] = $data[4];
			$DATA['price'] = $data[3];
			return $this->db->insert('cash_sell',$DATA);
		}else{
			//bank_sell table
			$DATA['date'] = $data[0];
			$DATA['shop_id'] = $data[1];
			$DATA['bank_id'] = $data[2];
			$DATA['price'] = $data[3];
			return $this->db->insert('bank_sell',$DATA);
		}
	}

	public function delete($data){
		if ($data[2] == -1){
			//cash_sell table
			$DATA['date'] = $data[0];
			$DATA['shop_id'] = $data[1];
			$DATA['cashes_id'] = $data[3];
			if ($this->db->where($DATA)->get('cash_sell')->num_rows() > 0)
			 	return $this->db->where($DATA)->delete('cash_sell');
			else{
				return false;
			}
		}else{
			//bank_sell table
			$DATA['date'] = $data[0];
			$DATA['shop_id'] = $data[1];
			$DATA['bank_id'] = $data[2];
			return $this->db->where($DATA)->delete('bank_sell');
		}
	}
	public function get_specific_cashes($cash_id,$shop_id,$limit,$start){
		$where = array(
			'cash_sell.shop_id'=>$shop_id,
			'cash_sell.cashes_id'=>$cash_id,
			'cashes.id'=>$cash_id,
			'cashes.shop_id'=>$shop_id,
			'shops.id'=>$shop_id

		);
		return $this->db->limit($limit,$start)->select('cash_sell.id,cash_sell.date,cash_sell.price,cashes.name as c_name,shops.name as s_name')->from('cash_sell,cashes,shops')->where($where)->order_by('cash_sell.date','desc')->order_by('cash_sell.id','desc')->get()->result();
	}

	public function get_count($cash_id,$shop_id){
		$where = array(
			'cash_sell.shop_id'=>$shop_id,
			'cash_sell.cashes_id'=>$cash_id,
			'cashes.id'=>$cash_id,
			'cashes.shop_id'=>$shop_id,
			'shops.id'=>$shop_id

		);
		return $this->db->select('cash_sell.id,cash_sell.date,cash_sell.price,cashes.name as c_name,shops.name as s_name')->from('cash_sell,cashes,shops')->where($where)->order_by('cash_sell.date','desc')->order_by('cash_sell.id','desc')->get()->num_rows();
	}





	public function delete_sell_by_id_cash_sell($id){
		if ($this->db->where('id',$id)->get('cash_sell')->num_rows() > 0){
			return $this->db->where('id',$id)->delete('cash_sell');
		}else{
			return false;
		}
	}

	public function delete_sell_from_bank($id){
		if ($this->db->where('id',$id)->get('bank_sell')->num_rows() > 0){
			return $this->db->where('id',$id)->delete('bank_sell');
		}else{
			return false;
		}
	}
}
