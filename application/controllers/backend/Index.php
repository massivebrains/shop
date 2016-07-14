<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!logged_in())
			redirect('backend/auth');
	}

	public function index()
	{
		$this->load->view('backend/dashboard/home');
	}


}
