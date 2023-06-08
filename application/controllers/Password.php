<?php 

class password extends CI_Controller{

    public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('user_loggedIn') != true){
			redirect('home/index');
		}
	}

    public function index(){
        $data['view_3'] = "layouts/password/index";
        $this->load->view('main',$data);
    }
    public function change(){
        $this->form_validation->set_rules('change_password_newPassword','گذرواژه جدید','required|trim');
        $this->form_validation->set_rules('change_password_RepeatnewPassword','تکرار گذرواژه جدید','required|trim|matches[change_password_newPassword]');
		$this->form_validation->set_message('required','.فیلد {field} خالی می باشد');   
        $this->form_validation->set_message('matches','.فیلد تکرار گذرواژه جدید با فیلد گذرواژه جدید یکسان نمی باشد');   
        
        if($this->form_validation->run() == false){
            $this->session->set_flashdata("change_errors",validation_errors());
            redirect("password/index");
        }else{
            $new_password = $this->input->post('change_password_newPassword');
            $hashed_password = password_hash($new_password,PASSWORD_BCRYPT,['cost'=>12]);
            if($this->password_model->change_password($this->session->userdata('id'),$hashed_password)){
                $this->session->set_flashdata("change_successful",".گذرواژه شما ویرایش شد");
                redirect("password/index");
            }else{
                $this->session->set_flashdata("change_fail",".گذرواژه شما ویرایش نشد");
                redirect("password/index");
            }
        }
    }
}