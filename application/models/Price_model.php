<?php
class price_model extends CI_Model{
	public function insert_price($data){
		if($this->db->where('name',$data['name'])->get('price')->num_rows() > 0){
			return false;
		}else{
			if ($this->db->insert('price',$data)){
				return true;
			}else{
				return false;
			}
		}
	}
	public function get_all_prices($limit,$start){
		return $this->db->limit($limit,$start)->order_by('name','asc')->get('price')->result();
	}
	public function fetch_prices($postData){
		$response = array();
		if ($postData['search']){

			$records = $this->db->query("select * from price where name like '%".$postData['search']."%'")->result();
			$response[] = array();
			$counter = 0;
			foreach ($records as $row){
				$response[$counter] = $row->name;
				$counter++;
			}
		}
		return $response;
	}
	public function delete_price($name){
		if ($this->db->where('name',$name)->get('price')->num_rows() > 0){
			if ($this->db->where('name',$name)->delete('price')){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}

	}
	public function increase_price($brandName,$percent,$user,$update_date){
		if ($this->db->query("select * from price where name like '%".$brandName."%'")->num_rows() > 0){
			if ($this->db->query("update price set who_updated = '$user',last_update_date = '$update_date',price_sell = price_sell + ((price_sell*$percent)/100),price_purchase = price_purchase + ((price_purchase*$percent)/100) where name like '%".$brandName."%'")){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	public function decrease_price($percent){
		if ($this->db->get('price')->num_rows() > 0){
			if ($this->db->query("update price set price_sell = price_sell - ((price_sell*$percent)/100)")){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	public function search_price($name){
		if ($this->db->query("select * from price where name like '%".$name."%'")->num_rows() > 0){
			return $this->db->query("select * from price where name like '%".$name."%' order by name asc")->result();
		}else{
			return false;
		}
	}
	public function deletebyid($id){
		return $this->db->where('id',$id)->delete('price');
	}
	public function edit_price($data,$id){
		if ($this->db->where('id',$id)->get('price')->num_rows() > 0){
			if ($this->db->where('id',$id)->update('price',$data)){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	public function get_count(){
		return $this->db->get('price')->num_rows();
	}
	public function get_name($id){
		return $this->db->where('id',$id)->get('price')->row('name');
	}
	public function change_price_by_FromDateToDate($data){
		$q = "UPDATE price set price.price_purchase = (price.price_purchase + ((price.price_purchase * ".$data['percent'].") / 100)),price.price_sell = (price.price_sell + ((price.price_sell * ".$data['percent'].") / 100)),who_updated = N'".$data['who_inserted']."', price.last_update_date = '".$data['last_update_date']."' WHERE price.id IN(SELECT t1.id from(select id,IFNULL(price.last_update_date,price.insert_date) as date FROM price WHERE IFNULL(price.last_update_date,price.insert_date) between '".$data['FromDate']."' and '".$data['ToDate']."') as t1)";
		
		if($this->db->query($q)){
			return true;
		}else{
			return false;
		}
	}
}
