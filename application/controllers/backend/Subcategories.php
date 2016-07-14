<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategories extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!logged_in())
			logout();
		$this->load->model('sub_categories_model');
	}

	public function index()
	{
		$data['sub_categories'] = get(TABLE_SUB_CATEGORIES, 'id', 'DESC');
		$this->load->view('backend/categories/manage_subc', $data);
	}

	public function manage()
	{
		if (!$this->input->post())
			redirect('backend/subcategories');
		$data = $this->input->post();
		if ($this->input->post('subcategory_id')) {
			if ($data['name'] != get_cell(TABLE_SUB_CATEGORIES, array('id'=>$data['subcategory_id']), 'name')) {
				$this->form_validation->set_rules('name', 'Sub Category Name', 'required|is_unique['.TABLE_SUB_CATEGORIES.'.name]');
				if($this->form_validation->run() == False)
					redirect('backend/subcategories');
			}

			$id = $this->input->post('subcategory_id');
			$name = $data['name'];
			$name = explode(' ', $data['name']);
			$data['slug'] = strtolower(implode('-', $name));
			unset($data['subcategory_id']);
			$where = array('id'=>$id);
			if(update(TABLE_SUB_CATEGORIES, $where, $data)) {
				logActivity('Sub Category Data Updated. [ID:'.$id.']');
				$this->session->set_flashdata('success', 'Action Succesful.');
			} else {
				$this->session->set_flashdata('error', 'Action Unsuccesful.');
			}
			$this->index();
		} else {
			$this->form_validation->set_rules('name', 'Sub Category Name', 'required|is_unique['.TABLE_SUB_CATEGORIES.'.name]');
			if ($this->form_validation->run() == FALSE) {
				$this->index();
			} else {
				$data = $this->input->post();
				$data['created'] = date('Y-m-d H:i:s');
				$name = $data['name'];
				$name = explode(' ', $data['name']);
				$data['slug'] = strtolower(implode('-', $name));
				if ($insert_id = save(TABLE_SUB_CATEGORIES, $data)) {
					logActivity('New Sub Category Created. [ID:'.$insert_id.']');
					$this->session->set_flashdata('success', 'Action Succesful.');
				} else {
					$this->session->set_flashdata('error', 'Action Unsuccesful.');
				}
				$this->index();
			}

		}
	}


	public function delete($id = '')
	{

		$where = array('id'=>$id);
		if (delete(TABLE_SUB_CATEGORIES, $where)) {
			logActivity('Sub Category Deleted. [ID:'.$id.']');
			$this->session->set_flashdata('success', 'Action Succesful.');
		} else {
			$this->session->set_flashdata('error', 'Action Unsuccesful.');
		}
		$this->index();
	}


}
