<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public $message = '';

	public function __construct()
	{
		parent::__construct();
		if(!logged_in())
			logout();
		$this->load->model('users_model');
	}

	public function index()
	{
		$data['admins'] = get(TABLE_ADMINS, 'id', 'DESC');
		$data['departments'] = get(TABLE_DEPARTMENTS, 'id', 'DESC');
		$this->load->view('backend/users/manage', $data);
	}

	public function manage()
	{
		if (!$this->input->post())
			redirect('backend/users');
		$data = $this->input->post();
		if ($this->input->post('admin_id')) {
			if ($data['email'] != get_cell(TABLE_ADMINS, array('id'=>$data['admin_id']), 'email'))
				$this->form_validation->set_rules('email', 'Email', 'required|is_unique['.TABLE_ADMINS.'.email]|valid_email');
			if(!empty($data['password'])) {
				$this->form_validation->set_rules('password', 'Password', 'required');
				$this->form_validation->set_rules('retype_password', 'Confirm Password', 'required|matches[password]');
				md5($data['password']);
			} else {
				unset($data['password']);
				unset($data['retype_password']);
			}
			$this->form_validation->set_rules('fullname', 'Full Name', 'required|alpha_numeric_spaces');
			$this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
			$this->form_validation->set_rules('dept_id', 'Department', 'required');
			$this->form_validation->set_rules('role', 'Department Name', 'required|alpha_numeric_spaces');
			if($this->form_validation->run() == False)
				$this->index();
			else {
				$id = $data['admin_id'];
				unset($data['admin_id']);
				$where = array('id'=>$id);
				if(update(TABLE_ADMINS, $where, $data)) {
					logActivity('Admin Data Updated. [ID:'.$id.']');
					$this->session->set_flashdata('success', 'Action Succesful.');
				} else {
					$this->session->set_flashdata('error', 'Action Unsuccesful.');
				}
				$this->index();
			}
		} else {
			$this->form_validation->set_rules('fullname', 'Full Name', 'required|alpha_numeric_spaces');
			$this->form_validation->set_rules('email', 'Email', 'required|is_unique['.TABLE_ADMINS.'.email]|valid_email');
			$this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('retype_password', 'Confirm Password', 'required|matches[password]');
			$this->form_validation->set_rules('dept_id', 'Department', 'required');
			$this->form_validation->set_rules('role', 'Department Name', 'required|alpha_numeric_spaces');
			if ($this->form_validation->run() == FALSE) {
				//
			} else {
				$data = $this->input->post();
				$data['created'] = date('Y-m-d H:i:s');
				$data['login_count'] = 0;
				unset($data['retype_password']);
				$data['password'] = md5($data['password']);
				$data['phone'] = '234'.substr($data['phone'], -10, 10);
				if ($insert_id = save(TABLE_ADMINS, $data)) {
					logActivity('New Admininistrator Created. [ID:'.$insert_id.']');
					$this->session->set_flashdata('success', 'Action Succesful.');
				} else {
					$this->session->set_flashdata('error', 'Action Unsuccesful.');
				}
			}
			$this->index();
		}

	}


	public function department()
	{
		if ($this->input->post()) {
			$data = $this->input->post();
			if ($this->input->post('department_id')) {
				$id = $data['department_id'];
				unset($data['department_id']);
				$where = array('id'=>$id);
				if(update(TABLE_DEPARTMENTS, $where, $data)) {
					logActivity('Department Updated. [ID:'.$id.']');
					$this->session->set_flashdata('success', 'Action Succesful.');
				} else {
					$this->session->set_flashdata('error', 'Action Unsuccesful.');
				}
				$this->index();
			} else {
				$this->form_validation->set_rules('name', 'Department Name', 'required|is_unique['.TABLE_DEPARTMENTS.'.name]');
				if($this->form_validation->run() == FALSE) {
					$this->index();
				} else {
					$data['created'] = date('Y-m-d H:i:s');
					if ($insert_id = save(TABLE_DEPARTMENTS, $data)) {
						logActivity('New Department Created. [ID:'.$insert_id.']');
						$this->session->set_flashdata('success', 'Action Succesful.');
					} else {
						$this->session->set_flashdata('error', 'Action Unsuccesful.');
					}
					$this->index();
				}
			}
		} else {
			redirect('backend/users');
		}

	}

	public function delete($type = '', $id = '')
	{
		if ($type == 'department') {
			$where = array('id'=>$id);
			if (delete(TABLE_DEPARTMENTS, $where)) {
				logActivity('Department Deleted. [ID:'.$id.']');
				$this->session->set_flashdata('success', 'Action Succesful.');
			} else {
				$this->session->set_flashdata('error', 'Action Unsuccesful.');
			}
		}

		if ($type == 'admin') {
			$where = array('id'=>$id);
			if (delete(TABLE_ADMINS, $where)) {
				logActivity('Administrator Deleted. [ID:'.$id.']');
				$this->session->set_flashdata('success', 'Action Succesful.');
			} else {
				$this->session->set_flashdata('error', 'Action Unsuccesful.');
			}
		}
		redirect('backend/users');
	}


}
