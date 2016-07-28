<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pickup_stations extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!logged_in())
			logout();
	}

	public function index()
	{
		$data['pickup_stations'] = get(TABLE_PICKUP_STATIONS, 'id', 'DESC');
		$this->load->view('backend/pickup_stations/manage', $data);
	}

	public function manage()
	{
		if (!$this->input->post())
			redirect('backend/pickup_stations');
		$data = $this->input->post();
		if ($this->input->post('pickup_station_id')) {
			
			$id = $this->input->post('pickup_station_id');
			unset($data['pickup_station_id']);
			$where = array('id'=>$id);
			if(update(TABLE_PICKUP_STATIONS, $where, $data)) {
				logActivity('Pickup Station Data Updated. [ID:'.$id.']');
				$this->session->set_flashdata('success', 'Action Succesful.');
			} else {
				$this->session->set_flashdata('error', 'Action Unsuccesful.');
			}
			$this->index();
		} else {
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('contact_person', 'Contact person', 'required');
			$this->form_validation->set_rules('contact_phone', 'Contact phone', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->index();
			} else {
				$data = $this->input->post();
				if ($insert_id = save(TABLE_PICKUP_STATIONS, $data)) {
					logActivity('New Pickup Station Created. [ID:'.$insert_id.']');
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
		if (delete(TABLE_PICKUP_STATIONS, $where)) {
			logActivity('Pickup station Deleted. [ID:'.$id.']');
			$this->session->set_flashdata('success', 'Action Succesful.');
		} else {
			$this->session->set_flashdata('error', 'Action Unsuccesful.');
		}
		$this->index();
	}


}
