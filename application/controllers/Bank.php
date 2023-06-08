<?php


class bank extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('user_loggedIn') != true){
			redirect('home/index');
		}
	}
	
	public function index(){

		$this->form_validation->set_rules('name_of_bank_create','نام حساب بانکی','required|trim');
		$this->form_validation->set_message('required','.فیلد {field} خالی می باشد');

		if ($this->form_validation->run() == false){
			$this->session->set_flashdata('create_bank_errors',validation_errors());
			$data['view_1'] = 'layouts/bank_accounts/create_bank_accounts' ;
			$data['view_2'] = 'layouts/bank_accounts/current_bank_accounts' ;
			$data['bank_accounts'] = $this->bank_account_model->get_all_bank_accounts() ;
			$this->load->view('main',$data);
		}else{
			if ($this->bank_account_model->insert($this->input->post('name_of_bank_create'))){
				$this->session->set_flashdata('create_bank_success','.حساب بانکی با موفقیت ایجاد شد');
				redirect('bank/index');
			}else{
				$this->session->set_flashdata('create_bank_fail','.حساب بانکی با این نام از قبل ایجاد شده است');
				redirect('bank/index');
			}
		}

	}

	public function delete($id){
		if ($this->bank_account_model->delete($id)){
			$this->session->set_flashdata('delete_bank_success','حذف حساب بانکی انجام شد');
			redirect('bank/index');
		}else{
			$this->session->set_flashdata('delete_bank_fail','.حذف حساب بانکی انجام نشد');
			redirect('bank/index');
		}
	}
	public function show_sells_of_bank($id){
		$config = array();
		$config["base_url"] = base_url() . "bank/show_sells_of_bank/".$id;
		$config["total_rows"] = $this->bank_account_model->get_count($id);
		$config["per_page"] = 3;
		$config["uri_segment"] = 4;
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
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['links'] = $this->pagination->create_links();
		$data['view_1'] = 'layouts/bank_accounts/create_bank_accounts' ;
		$data['view_2'] = 'layouts/bank_accounts/current_bank_accounts' ;
		$data['view_4'] = 'layouts/bank_accounts/current_bank_accounts_sells' ;
		$data['bank_accounts'] = $this->bank_account_model->get_all_bank_accounts();
		$data['sells_of_bank'] = $this->bank_account_model->get_specefic_bank_accounts_sells($id,$config['per_page'],$page);
		$this->load->view('main',$data);
	}
}
