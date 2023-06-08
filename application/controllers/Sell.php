<?php


class sell extends CI_Controller
{
	public function index(){


		$data['view_2'] = 'layouts/sell/create_sell';
		$data['get_shops'] = $this->shop_model->get_all_shops();
		$data['get_banks'] = $this->bank_account_model->get_all_bank_accounts();
		$data['get_cashes'] = $this->cash_model->get_all_cashes();;
		$this->load->view('main',$data);
	}

	public function insert(){

		$this->form_validation->set_rules('date_of_sell_insert','تاریخ فروش','required|trim');
		$this->form_validation->set_rules('ShopName_of_sell_insert','نام فروشگاه','required|trim');
		$this->form_validation->set_rules('MoneyPlace_of_sell_insert','محل پول','required|trim');
		if ($this->input->post('MoneyPlace_of_sell_insert') == -1){
			$this->form_validation->set_rules('WhichCash_of_sell_insert','در کدام صندوق','required|trim');
		}
		$this->form_validation->set_rules('price_of_sell_insert','مبلغ','required|trim');
		//message
		$this->form_validation->set_message('required','.فیلد {field} خالی می باشد');

		if ($this->form_validation->run() == false){
			$this->session->set_flashdata('insert_sell_errors',validation_errors());
			redirect('sell/index');
		}else{
			$data[0] = $this->input->post('date_of_sell_insert');
			$data[1] = $this->input->post('ShopName_of_sell_insert');
			$data[2] = $this->input->post('MoneyPlace_of_sell_insert');
			$data[3] = $this->input->post('price_of_sell_insert');
			if ($data[2] == -1){$data[4] = $this->input->post('WhichCash_of_sell_insert');}

			if ($this->sell_model->insert($data)){
				$this->session->set_flashdata('insert_sell_success','.فروش ثبت شد');
				redirect('sell/index');
			}else{
				$this->session->set_flashdata('insert_sell_fail','.فروش ثبت نشد');
				redirect('sell/index');
			}
		}

	}

	public function delete(){
		$this->form_validation->set_rules('date_of_sell_delete','تاریخ فروش','required|trim');
		$this->form_validation->set_rules('ShopName_of_sell_delete','نام فروشگاه','required|trim');
		$this->form_validation->set_rules('MoneyPlace_of_sell_delete','محل پول','required|trim');
		if ($this->input->post('MoneyPlace_of_sell_delete') == -1){
			$this->form_validation->set_rules('WhichCash_of_sell_delete','در کدام صندوق','required|trim');
		}
		//message
		$this->form_validation->set_message('required','.فیلد {field} خالی می باشد');

		if ($this->form_validation->run() == false){
			$this->session->set_flashdata('delete_sell_errors',validation_errors());
			redirect('sell/index');
		}else{
			$data[0] = $this->input->post('date_of_sell_delete');
			$data[1] = $this->input->post('ShopName_of_sell_delete');
			$data[2] = $this->input->post('MoneyPlace_of_sell_delete');
			if ($data[2] == -1){$data[3] = $this->input->post('WhichCash_of_sell_delete');}

			if ($this->sell_model->delete($data)){
				$this->session->set_flashdata('delete_sell_success','.فروش حذف شد');
				redirect('sell/index');
			}else{
				$this->session->set_flashdata('delete_sell_fail','.همچین فروشی وجود ندارد');
				redirect('sell/index');
			}
		}
	}




	public function delete_sell($id,$cash_id,$shop_id){
		if($this->sell_model->delete_sell_by_id_cash_sell($id)){
			$this->session->set_flashdata('delete_sell_in_cash_sell_by_id_success','.فروش حذف شد');
			redirect('cash/show_sell_in_cashes/'.$cash_id.'/'.$shop_id);
		}else{
			$this->session->set_flashdata('delete_sell_in_cash_sell_by_id_fail','.فروش حذف نشد');
			redirect('cash/show_sell_in_cashes/'.$cash_id.'/'.$shop_id);
		}
	}
	public function delete_sell_from_bank($id,$bank_id){
		if ($this->sell_model->delete_sell_from_bank($id)){
			$this->session->set_flashdata('delete_sell_in_bank_sell_by_id_success','.حذف فروش از بانک انجام شد');
			redirect('bank/show_sells_of_bank/'.$bank_id);
		}else{
			$this->session->set_flashdata('delete_sell_in_bank_sell_by_id_fail','.حذف فروش از بانک انجام نشد');
			redirect();
		}
	}
}
