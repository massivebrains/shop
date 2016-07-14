<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{

		if(logged_in())
			redirect(admin_url());
		if ($this->input->post()) {
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run() == FALSE)
				$this->load->view('backend/auth/login');
			else {
				$data = array(
					'email'=>$this->input->post('email'),
					'password'=>md5($this->input->post('password'))
					);
				if(login($data)) {
					redirect('backend/index');
				} else {
					$this->session->set_flashdata('error', 'Invalid Credentials!');
					$this->load->view('backend/auth/login');
				}
			}
		} else {
			$this->load->view('backend/auth/login');
		}
	}

	public function logout()
	{
		logout();
	}

}
