<?php

class cash extends CI_Controller
{
	public function index(){
		$this->form_validation->set_rules('name_of_cash_create','نام صندوق','required|trim');
		$this->form_validation->set_rules('name_of_forshop_create','برای فروشگاه','required|trim');
		$this->form_validation->set_message('required','.فیلد {field} خالی می باشد');

		if ($this->form_validation->run() == false){
			$this->session->set_flashdata('create_cash_errors',validation_errors());
			$data['view_1'] = 'layouts/cash/create_cash' ;
			$data['view_2'] = 'layouts/cash/current_cash' ;
			$data['get_shops'] = $this->shop_model->get_all_shops();
			$data['get_cashes'] = $this->cash_model->get_all_cashes();
			$this->load->view('main',$data);
		}else{
			$data = array(
				'name'=>$this->input->post('name_of_cash_create'),
				'shop_id'=>$this->input->post('name_of_forshop_create')
			);
			if ($this->cash_model->insert($data)){
				$this->session->set_flashdata('create_cash_success','.صندوق با موفقیت ایجاد شد');
				redirect('cash/index');
			}else{
				$this->session->set_flashdata('create_cash_fail','.همچین صندوقی با این نام از قبل ایجاد شده است');
				redirect('cash/index');
			}
		}

	}

	public function delete($id){
		if ($this->cash_model->delete($id)){
			$this->session->set_flashdata('delete_cash_success','.حذف صندوق انجام شد');
			redirect('cash/index');
		}else{
			$this->session->set_flashdata('delete_cash_fail','.حذف صندوق انجام نشد');
			redirect('cash/index');
		}
	}

	public function show_sell_in_cashes($cash_id,$shop_id){

		$config = array();
		$config["base_url"] = base_url() . "cash/show_sell_in_cashes/".$cash_id.'/'.$shop_id;
		$config["total_rows"] = $this->sell_model->get_count($cash_id,$shop_id);
		$config["per_page"] = 1;
		$config["uri_segment"] = 5;
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
		$config['cur_tag_close'] = '</a></li>';
		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		$data['links'] = $this->pagination->create_links();
		$data['view_1'] = 'layouts/cash/create_cash' ;
		$data['view_2'] = 'layouts/cash/current_cash' ;
		$data['view_4'] = 'layouts/cash/current_cash_sells';
		$data['get_shops'] = $this->shop_model->get_all_shops();
		$data['get_cashes'] = $this->cash_model->get_all_cashes();
		$data['get_specific_cashes'] = $this->sell_model->get_specific_cashes($cash_id,$shop_id,$config['per_page'],$page);
		$this->load->view('main',$data);
	}


}
