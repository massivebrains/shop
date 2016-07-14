<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$this->home();
	}


	public function home()
	{
		$this->load->library('pagination');
		$config['base_url'] = site_url('home');
		$config['total_rows'] = table_count(TABLE_PRODUCTS);
		$config['per_page'] = 28;
		$config["uri_segment"] = 4;
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['full_tag_open'] = '<ul class="pagination hor-list">';
		$config['full_tag_close'] = '</ul>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['prev_link'] = 'previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$config['next_link'] = 'next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['pagination'] = $this->pagination->create_links();
		$data['products'] = get(TABLE_PRODUCTS, 'id', 'RANDOM', $config['per_page'], $page, array('status'=>1));
		$data['new_products'] = get(TABLE_PRODUCTS, 'id', 'DESC', 5, 0, array('status'=>1));
		$this->session->set_userdata('title','Home');
		$this->load->view('frontend/home/index', $data);
	}

	public function category($slug = '')
	{
		$category = get_row(TABLE_CATEGORIES, $where=array('slug'=>$slug));
		$count = num_rows(TABLE_PRODUCTS, array('category_id'=>$category->id));
		$this->load->library('pagination');
		$config['base_url'] = site_url('category/'.$slug);
		$config['total_rows'] = $count;
		$config['per_page'] = 28;
		$config["uri_segment"] = 5;
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['full_tag_open'] = '<ul class="pagination hor-list">';
		$config['full_tag_close'] = '</ul>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['prev_link'] = 'previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$config['next_link'] = 'next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		$data['pagination'] = $this->pagination->create_links();
		$data['products'] = get(TABLE_PRODUCTS, 'id', 'RANDOM', $config['per_page'], $page, array('status'=>1, 'category_id'=>$category->id));
		$data['new_products'] = get(TABLE_PRODUCTS, 'id', 'DESC', 5, 0, array('status'=>1));
		$this->session->set_userdata('title',$slug);
		$data['name'] = $category->name;
		$data['count'] = $count;
		//$this->output->enable_profiler(TRUE);
		$this->load->view('frontend/home/single_category', $data);
	}

	public function product($product_sku = '')
	{
		$data['product'] = get_row(TABLE_PRODUCTS, array('sku'=>$product_sku));
		if(empty($data['product']))
			redirect(site_url('shop'));
		$this->session->set_userdata('title',$data['product']->slug);
		$this->load->view('frontend/home/single', $data);
	}

	public function account($action = '')
	{
		if($this->input->post()) {
			$this->form_validation->set_rules('email', 'Email', 'required|is_unique['.TABLE_CUSTOMERS.'.email]');
			if($this->form_validation->run() == FALSE) {
				$data['action'] = '';
				$this->load->view('frontend/cart/account', $data);
				return;
			} else {
				$data = $this->input->post();
				$data['created'] = date('Y-m-d H:i:s');
				$data['status'] = 1;
				$data['password'] = md5($data['password']);
				if($insert_id = save(TABLE_CUSTOMERS, $data)) {
					if($action = 'checkout') {
						$customer_id = customer_login($data['email'], $data['password']);
						$data['contact_person'] = $data['name'];
						$data['delivery_option'] = 'address';
						$this->session->set_userdata($data);
						$this->load->library('cart');
						$data['total'] = $this->cart->total();
						$data['cart'] = $this->cart->contents();
						$data['type'] = 'loggedin';
						$this->load->view('frontend/cart/payment', $data);
						return;
					}
				}
			}
		} else {
			if($action == 'checkout') {
				$data['action'] = 'checkout';
				$this->load->view('frontend/cart/account', $data);
			}
		}
	}

	public function search()
	{
		//$this->output->enable_profiler(TRUE);
		if(!$this->input->post())
			redirect('shop');
		$query = $this->input->post('keyword');
		$data['products'] = search_products_by_query($query,array('status'=>1));
		$data['new_products'] = get(TABLE_PRODUCTS, 'id', 'DESC', 5, 0, array('status'=>1));
		$this->session->set_userdata('title','Search Results');
		$this->load->view('frontend/home/search', $data);
	}


	public function search_by_price($range = 0)
	{
		$this->output->enable_profiler(TRUE);
		$data['products'] = search_by_price(intval($range));
		$data['new_products'] = get(TABLE_PRODUCTS, 'id', 'DESC', 5, 0, array('status'=>1));
		$this->session->set_userdata('title','Search Results');
		$this->load->view('frontend/home/search', $data);
	}


	public  function logout()
	{
		$this->session->sess_destroy();
		unset($_SESSION['customer_id']);
		redirect('shop');
	}


}
