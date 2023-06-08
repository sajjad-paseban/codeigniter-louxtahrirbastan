<?php


class shop extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('user_loggedIn') != true){
			redirect('home/index');
		}
	}
	public function index(){

		$this->form_validation->set_rules('name_of_shop_create','نام فروشگاه','required|trim');
		$this->form_validation->set_message('required','.فیلد {field} خالی می باشد');
		if ($this->form_validation->run() == false){
			$this->session->set_flashdata('create_shop_errors',validation_errors());
			$data['view_2'] = 'layouts/shop/current_shops';
			$data['view_1'] = 'layouts/shop/create_shop';
			$data['created_shops'] = $this->shop_model->get_all_shops();
			$this->load->view('main',$data);
		}else{
			if ($this->shop_model->insert($this->input->post('name_of_shop_create'))){
				$this->session->set_flashdata('create_shop_success',".فروشگاه با موفقیت ایجاد شد");
				redirect('shop/index');
			}else{
				$this->session->set_flashdata('create_shop_fail','.فروشگاهی با این نام قبلا ایجاد شده است');
				redirect('shop/index');
			}
		}

	}

	public function delete($id){
		if ($this->shop_model->delete($id)){
			$this->session->set_flashdata('delete_shop_success',".فروشگاه با موفقیت حذف شد");
			redirect('shop/index');
		}else{
			$this->session->set_flashdata('delete_shop_fail',".حذف فروشگاه انجام نشد");
			redirect('shop/index');
		}
	}

	public function show_all_sells_of_shop($shop_id){
//		redirect('shop/index');
	}
}
