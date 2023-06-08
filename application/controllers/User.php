<?php


class user extends CI_Controller
{
	public function index(){
		$data['view_2'] = 'layouts/user/online_users';
		$data['online_users'] = $this->user_model->online_user();
		$this->load->view('main',$data);
	}
	public function register(){
		if ($this->session->userdata('user_loggedIn') == false){


			$this->form_validation->set_rules('fullname_register','نام کامل','required|trim');
			$this->form_validation->set_rules('email_register','پست الکترونیکی','required|trim|valid_email');
			$this->form_validation->set_rules('password_register','گذرواژه','required|trim|min_length[8]');
			$this->form_validation->set_rules('re-password_register','تکرار گذرواژه','required|trim|matches[password_register]');
			// messages
			$this->form_validation->set_message('required','.فیلد {field} خالی می باشد');
			$this->form_validation->set_message('valid_email','.پست الکترونیکی معتبر نمی باشد');
			$this->form_validation->set_message('min_length','.فیلد {field} می بایست شامل 8 کاراکتر باشد');
			$this->form_validation->set_message('matches','.{field} با گذرواژه یکسان نمی باشد');

			if ($this->form_validation->run() == false){
				$this->session->set_flashdata('errors',validation_errors());
				$data['view_3'] = "layouts/user/register";
				$this->load->view('main',$data);
			}else{
				$type = 1;
				if ($this->input->post('access_level_register') == "دسترسی کامل")
					$type = 0;
				elseif ($this->input->post('access_level_register') == "دسترسی محدود")
					$type = 1;

				$pass_cost['cost'] = 12;
				$password = password_hash($this->input->post('password_register'),PASSWORD_BCRYPT,$pass_cost);
				$data = array(
					'fullname'=>$this->input->post('fullname_register'),
					'email'=>$this->input->post('email_register'),
					'password'=>$password,
					'type'=>$type
				);
				if ($this->user_model->insert($data)) {
					$this->session->set_flashdata('reg_success', '.عملیات ثبت نام با موفقیت انجام شد');
					redirect('user/register');
				}else{
					$this->session->set_flashdata('reg_fail','.عملیات ثبت نام انجام نشد');
					redirect('user/register');
				}

			}



		}else{
			redirect('user/index');
		}

	}
	public function logout(){
		if ($this->session->userdata('user_loggedIn') == true){
			$this->user_model->update_user_state($this->session->userdata('email'),0);
			$this->session->sess_destroy();
			redirect('home/index');
		}else
			redirect('home/index');


	}
}
