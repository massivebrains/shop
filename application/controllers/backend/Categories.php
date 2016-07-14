<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!logged_in())
			logout();
		$this->load->model('categories_model');
	}

	public function index()
	{
		$data['categories'] = get(TABLE_CATEGORIES, 'id', 'DESC');
		$this->load->view('backend/categories/manage', $data);
	}

	public function manage()
	{
		if (!$this->input->post())
			redirect('backend/categories');
		$data = $this->input->post();
		if ($this->input->post('category_id')) {
			if ($data['name'] != get_cell(TABLE_CATEGORIES, array('id'=>$data['category_id']), 'name')) {
				$this->form_validation->set_rules('name', 'Category Name', 'required|is_unique['.TABLE_CATEGORIES.'.name]');
				if($this->form_validation->run() == False)
					redirect('backend/categories');
			}

			$id = $this->input->post('category_id');
			$name = $data['name'];
			$name = explode(' ', $data['name']);
			$data['slug'] = strtolower(implode('-', $name));
			unset($data['category_id']);
			$where = array('id'=>$id);
			if(update(TABLE_CATEGORIES, $where, $data)) {
				logActivity('Category Data Updated. [ID:'.$id.']');
				$this->session->set_flashdata('success', 'Action Succesful.');
			} else {
				$this->session->set_flashdata('error', 'Action Unsuccesful.');
			}
			$this->index();
		} else {
			$this->form_validation->set_rules('name', 'Category Name', 'required|is_unique['.TABLE_CATEGORIES.'.name]');
			if ($this->form_validation->run() == FALSE) {
				$this->index();
			} else {
				$data = $this->input->post();
				$data['created'] = date('Y-m-d H:i:s');
				$name = $data['name'];
				$name = explode(' ', $data['name']);
				$data['slug'] = strtolower(implode('-', $name));
				if ($insert_id = save(TABLE_CATEGORIES, $data)) {
					logActivity('New Category Created. [ID:'.$insert_id.']');
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
		if(has_subcategories($id)) {
			$this->session->set_flashdata('error', 'Category has Subcategories. Action Unsuccesful');
			redirect('backend/catgories');
		}
		if (delete(TABLE_CATEGORIES, $where)) {
			logActivity('Category Deleted. [ID:'.$id.']');
			$this->session->set_flashdata('success', 'Action Succesful.');
		} else {
			$this->session->set_flashdata('error', 'Action Unsuccesful.');
		}
		$this->index();
	}


}
