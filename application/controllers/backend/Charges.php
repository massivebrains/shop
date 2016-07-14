<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Charges extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!logged_in())
			logout();
		$this->load->model('charges_model');
	}

	public function index()
	{
		$data['charges'] = get(TABLE_CHARGES, 'id', 'DESC');
		$this->load->view('backend/charges/manage', $data);
	}

	public function manage()
	{
		if (!$this->input->post())
			redirect('backend/charges');
		$data = $this->input->post();
		if ($this->input->post('charge_id')) {
			if ($data['name'] != get_cell(TABLE_CHARGES, array('id'=>$data['charge_id']), 'name')) {
				$this->form_validation->set_rules('name', 'Charge Name', 'required|is_unique['.TABLE_CHARGES.'.name]');
				if($this->form_validation->run() == False)
					redirect('backend/charges');
			}

			$id = $this->input->post('charge_id');
			$name = $data['name'];
			unset($data['charge_id']);
			$where = array('id'=>$id);
			if(update(TABLE_CHARGES, $where, $data)) {
				logActivity('Charge Data Updated. [ID:'.$id.']');
				$this->session->set_flashdata('success', 'Action Succesful.');
			} else {
				$this->session->set_flashdata('error', 'Action Unsuccesful.');
			}
			$this->index();
		} else {
			$this->form_validation->set_rules('name', 'Charge Name', 'required|is_unique['.TABLE_CHARGES.'.name]');
			if ($this->form_validation->run() == FALSE) {
				$this->index();
			} else {
				$data = $this->input->post();
				$data['created'] = date('Y-m-d H:i:s');
				$name = $data['name'];
				if ($insert_id = save(TABLE_CHARGES, $data)) {
					logActivity('New Charge Created. [ID:'.$insert_id.']');
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
    if (delete(TABLE_CHARGES, $where)) {
      logActivity('Charge Deleted. [ID:'.$id.']');
      $this->session->set_flashdata('success', 'Action Succesful.');
    } else {
      $this->session->set_flashdata('error', 'Action Unsuccesful.');
    }
    $this->index();
  }


}
