<?php

function logged_in()
{
	$CI = & get_instance();
	if ($CI->session->has_userdata('logged_in_admin_id') && $CI->session->userdata('logged_in_admin_id') > 0)
		return true;
	else
		return false;
}

function logout()
{
	$CI = & get_instance();
	unset($_SESSION['logged_in_admin_id']);
	$CI->session->sess_destroy();
	redirect('backend/auth');
}

function login($data = array()){
		$CI = & get_instance();
        $query = $CI->db->get_where(TABLE_ADMINS, $data);
        $row = $query->row();
        if($query->num_rows() > 0){
        	$old_login_count = get_cell(TABLE_ADMINS, array('id'=>$row->id), 'login_count');
        	$data = array(
        		'last_login'=>date('Y-m-d H:i:s'),
        		'login_count'=> $old_login_count+=1,
        		);
        	update(TABLE_ADMINS, array('id'=>$row->id),$data);
        	$userdata = array(
        		'logged_in_admin_id'=>$row->id
        		);
        	$CI->session->set_userdata($userdata);
        	return true;
        }else{
        	logActivity('Login Attempt Failed. ['.$data['email'].']');
            return FALSE;
        }
    }

	function customer_login($email = '', $password = '')
	{
		$CI = &get_instance();
		$query = $CI->db->get_where(TABLE_CUSTOMERS, array('email'=>$email, 'password'=>md5($password)));
		if($query->num_rows() > 0) {
			$customer_id = $query->row()->id;
			$CI->session->set_userdata('customer_id', $customer_id);
		}else
		$customer_id = 0;
		return $customer_id;
	}

	function customer_is_logged_in()
	{
		$CI = & get_instance();
		if ($CI->session->has_userdata('customer_id') && $CI->session->userdata('customer_id') > 0)
			return true;
		else
			return false;
	}
