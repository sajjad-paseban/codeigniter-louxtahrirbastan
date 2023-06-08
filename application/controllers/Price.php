<?php
require_once 'assets/jdf.php';
class Price extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('user_loggedIn') != true){
			redirect('home');
		}
	}

	public function index(){
		$config = array();
		$config["base_url"] = base_url() . "price/index/";
		$config["total_rows"] = $this->price_model->get_count();
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;
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
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['links'] = $this->pagination->create_links();
		$data['view_3'] = 'layouts/product_price/price';
		$data['prices'] = $this->price_model->get_all_prices($config['per_page'],$page);
		$this->load->view('main',$data);
	}
	public function insert(){
		$this->form_validation->set_rules('insert_name_price','نام محصول','required|trim');
		$this->form_validation->set_rules('insert_purchase_price','قیمت خرید','required|trim');
		$this->form_validation->set_rules('insert_sell_price','قیمت فروش','required|trim');
		$this->form_validation->set_message('required','.فیلد {field} خالی می باشد');
		if ($this->form_validation->run() == false){
			$this->session->set_flashdata('price_errors',validation_errors());
			redirect('price/index');
		}else{
			$data = array(
				'name'=>$this->input->post('insert_name_price'),
				'price_purchase'=>$this->input->post('insert_purchase_price'),
				'price_sell'=>$this->input->post('insert_sell_price'),
				'insert_date'=>jdate('Y/n/j'),
				'who_inserted'=>$this->session->userdata('fullname')
			);
			if($this->price_model->insert_price($data)){
				$this->session->set_flashdata('insert_price_successful',true);
				$this->session->set_flashdata('insert_price_successful_ProductName',$data['name']);
				redirect('price/index');
			}else{
				$this->session->set_flashdata('insert_price_fail',true);
				$this->session->set_flashdata('insert_price_fail_ProductName',$data['name']);
				redirect('price/index');
			}
		}
	}

	public function fetch_price(){
		$postData = $this->input->post();
		$data = $this->price_model->fetch_prices($postData);
		echo json_encode($data);
	}

	public function delete(){
		if ($this->price_model->delete_price($this->input->post('delete_name_price'))){
			$this->session->set_flashdata('delete_price_successful','.محصول با موفقیت حذف شد');
			redirect('price/index');
		}else{
			$this->session->set_flashdata('delete_price_fail','.همچین محصولی برای حذف کردن وجود ندارد');
			redirect('price/index');
		}

	}
	public function increase(){
	    $brandName = $this->input->post('increase_brandName_price');
		if ($this->price_model->increase_price($this->input->post('increase_brandName_price'),$this->input->post('increase_percent_price'),$this->session->userdata('fullname'),jdate('Y/n/j'))){
			$this->session->set_flashdata('increase_price_successful',true);
			$this->session->set_flashdata('increase_price_successful_productName', $brandName);
			redirect('price/index');
		}else{
			$this->session->set_flashdata('increase_price_fail','.محصولی با این برند وجود ندارد');
			redirect('price/index');
		}
	}
	public function decrease(){
		if ($this->price_model->decrease_price($this->input->post('decrease_percent_price'))){
			$this->session->set_flashdata('decrease_price_successful','.قیمت تمامی محصولات کاهش داده شد');
			redirect('price/index');
		}else{
			$this->session->set_flashdata('decrease_price_fail','.محصولی وجود ندارد');
			redirect('price/index');
		}
	}
	public function search(){
		if ($this->price_model->search_price($this->input->post('search_name_price'))){
			$config = array();
			$config["base_url"] = base_url() . "price/index/";
			$config["total_rows"] = $this->price_model->get_count();
			$config["per_page"] = 10;
			$config["uri_segment"] = 3;
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
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['links'] = $this->pagination->create_links();
			$data['view_3'] = 'layouts/product_price/price';
			$data['table'] = 'layouts/product_price/table_search';
			$data['prices'] = $this->price_model->get_all_prices($config['per_page'],$page);
			$data['prices1'] = $this->price_model->search_price($this->input->post('search_name_price'));
			$this->load->view('main',$data);
		}else{
			$this->session->set_flashdata('search_price_fail','.محصولی یافت نشد');
			redirect('price/index');
		}
	}
	public function delete_by_id($id){
		$name = $this->price_model->get_name($id);
		if($this->price_model->deletebyid($id)){
			$this->session->set_flashdata('delete_price_successful',true);
			$this->session->set_flashdata('delete_price_successful_product_name',$name);
		}else{
			$this->session->set_flashdata('delete_price_fail',true);
			$this->session->set_flashdata('delete_price_successful_fail_name',$name);
		}
		$this->price_model->deletebyid($id);
		redirect('price/index');
	}
	public function edit($id){
		$this->form_validation->set_rules('update_name_price','نام محصول','required|trim');
		$this->form_validation->set_rules('update_purchase_price','قیمت خرید','required|trim');
		$this->form_validation->set_rules('update_sell_price','قیمت فروش','required|trim');
		$this->form_validation->set_message('required','.فیلد {field} خالی می باشد');
		if ($this->form_validation->run() == false){
			$this->session->set_flashdata('update_price_errors',validation_errors());
			redirect('price/index');
		}else{
			$data = array(
				'name'=>$this->input->post('update_name_price'),
				'price_purchase'=>$this->input->post('update_purchase_price'),
				'price_sell'=>$this->input->post('update_sell_price'),
				'last_update_date'=>jdate('Y/n/j'),
				'who_updated'=>$this->session->userdata('fullname')
			);
			if($this->price_model->edit_price($data,$id)){
				$this->session->set_flashdata('update_price_successful',true);
				$this->session->set_flashdata('update_price_successful_productName',$data['name']);
				redirect('price/index');
			}else{
				$this->session->set_flashdata('update_price_fail',true);
				$this->session->set_flashdata('update_price_fail_productName',$data['name']);
				redirect('price/index');
			}
		}
	}

	public function changePriceByFromDateToDate(){
		
		$data = array(
			'FromDate'=>$this->input->post('FromDate'),
			'ToDate'=>$this->input->post('ToDate'),
			'percent'=>$this->input->post('increase_percent_price_by_FromDateAndToDate'),
			'last_update_date'=>jdate('Y/n/j'),
			'who_inserted'=>$this->session->userdata('fullname')
		);
		if($this->price_model->change_price_by_FromDateToDate($data)){
			$this->session->set_flashdata('change_price_by_FromDateToDate',true);
			$this->session->set_flashdata('change_price_by_FromDateToDate_message',"عملیات با موفقیت انجام شد");
			redirect('price/index');
		}else{
			$this->session->set_flashdata('change_price_by_FromDateToDate',false);
			$this->session->set_flashdata('change_price_by_FromDateToDate_message',"عملیات انجام نشد");
			redirect('price/index');
		}
	}
}
