<?php


class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('user_loggedIn') == true){
			redirect('user/index');
		}
	}

	public function index(){

		$this->form_validation->set_rules('email_login','پست الکترونیکی','required|trim|valid_email');
		$this->form_validation->set_rules('password_login','گذرواژه','required|trim');
		//messages
		$this->form_validation->set_message('required','.فیلد {field} خالی می باشد');
		$this->form_validation->set_message('valid_email','.پست الکترونیکی معتبر نمی باشد');

		if ($this->form_validation->run() == false){
			$this->session->set_flashdata('log_errors',validation_errors());
			$this->load->view("layouts/home/login_page");
		}else{
			$data = array(
				'email'=>$this->input->post('email_login'),
				'password'=>$this->input->post('password_login')
			);
			if($this->user_model->check_user($data)){
				$info = $this->user_model->get_user($data['email']);
				$this->user_model->update_user_state($data['email'],1);
				$userdata = array(
					'id'=>$info->id,
					'fullname'=>$info->fullname,
					'email'=>$info->email,
					'type'=>$info->type,
					'user_loggedIn'=>true
				);
				$this->session->set_userdata($userdata);
				redirect('user/index');
			}else{
				$this->session->set_flashdata('log_fail','.پست الکترونیکی یا گذرواژه اشتباه می باشد');
				redirect('home/index');
			}
		}


	}


}
