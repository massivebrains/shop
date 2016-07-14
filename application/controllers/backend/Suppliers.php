<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suppliers extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!logged_in())
			logout();
		$this->load->model('suppliers_model');
	}

	public function index()
	{
		$data['suppliers'] = get(TABLE_SUPPLIERS, 'id', 'DESC');
		$this->load->view('backend/suppliers/manage', $data);
	}

	public function manage()
	{
		if (!$this->input->post())
			redirect('backend/suppliers');
		$data = $this->input->post();
		if ($this->input->post('supplier_id')) {
			if ($data['name'] != get_cell(TABLE_SUPPLIERS, array('id'=>$data['supplier_id']), 'name')) {
				$this->form_validation->set_rules('name', 'supplier Name', 'required|is_unique['.TABLE_SUPPLIERS.'.name]');
				if($this->form_validation->run() == False)
					redirect('backend/suppliers');
			}

			$id = $this->input->post('supplier_id');
			unset($data['supplier_id']);
			$where = array('id'=>$id);
			if(update(TABLE_SUPPLIERS, $where, $data)) {
				logActivity('Supplier Data Updated. [ID:'.$id.']');
				$this->session->set_flashdata('success', 'Action Succesful.');
			} else {
				$this->session->set_flashdata('error', 'Action Unsuccesful.');
			}
			$this->index();
		} else {
			$this->form_validation->set_rules('name', 'supplier Name', 'required|is_unique['.TABLE_SUPPLIERS.'.name]');
			$this->form_validation->set_rules('phone', 'supplier Phone', 'required|numeric');
			$this->form_validation->set_rules('email', 'supplier Email', 'required|valid_email');
			if ($this->form_validation->run() == FALSE) {
				$this->index();
			} else {
				$data = $this->input->post();
				$data['created'] = date('Y-m-d H:i:s');
				if ($insert_id = save(TABLE_SUPPLIERS, $data)) {
					logActivity('New Supplier Created. [ID:'.$insert_id.']');
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
		if(has_products($id)) {
			$this->session->set_flashdata('error', 'Supplier has active products in the database. Action Unsuccesful');
			redirect('backend/suppliers');
		}
		if (delete(TABLE_SUPPLIERS, $where)) {
			logActivity('Supplier Deleted. [ID:'.$id.']');
			$this->session->set_flashdata('success', 'Action Succesful.');
		} else {
			$this->session->set_flashdata('error', 'Action Unsuccesful.');
		}
		$this->index();
	}


}
