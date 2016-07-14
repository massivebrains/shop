<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!logged_in())
			logout();
			$this->load->model('orders_model');
	}

	public function index()
	{
		$this->load->view('backend/orders/manage');
	}


	public function data()
	{
		$orders = $this->orders_model->get_array();
		$additional_data = array();
		for($i = 0; $i<count($orders); $i++) {
			$link = site_url('backend/orders/order/'.$orders[$i]['id']);
			$link = "<a href='".$link."' class='btn btn-sm btn-primary'>View</a>";
			$additional_data[$i]['option'] = $link;
		}
		$new_data = array();
		$i = 0;
		foreach($orders as $row){
			$new[$i]['date'] = $orders[$i]['date'];
			$new[$i]['order_number'] = $orders[$i]['order_number'];
			$new[$i]['customer_name'] = customer_name($orders[$i]['customer_type'], $orders[$i]['customer_id']);
			$new[$i]['delivery_address'] = $orders[$i]['address'];
			$new[$i]['delivery_option'] = $orders[$i]['delivery_option'];
			$new[$i]['order_status'] = $orders[$i]['status'];
			$new[$i]['order_total'] = $orders[$i]['order_total'];
			$new[$i]['delivery_status'] = $orders[$i]['delivery_status'];
			$new[$i]['option'] = $additional_data[$i]['option'];
			$i++;
		}
		unset($i); unset($orders); unset($additional_data);
		//var_dump($new);
		$output = array();
		foreach($new as $key=>$value) {
			$output[] = array_values($value);
		}
		echo json_encode(array('data'=>$output), JSON_HEX_QUOT | JSON_HEX_TAG);

	}

  public function order($order_id = 0)
  {
    if ($order_id != 0){
			$data['order'] = $this->orders_model->get_order(array('id'=>$order_id));
			$this->load->view('backend/orders/single', $data);
		}
  }


	public function delete($order_id = '')
	{
		$where = array('id'=>$order_id);
		delete(TABLE_ORDERS, $where);
		$where = array('order_id'=>$order_id);
		delete(TABLE_ORDER_DELIVERY_DETAILS, $where);
		delete(TABLE_ORDERS_TRANSACTIONS, $where);
		logActivity('Order Deleted. [ID:'.$order_id.']');
		$this->session->set_flashdata('success', 'Action Succesful.');
		$this->index();
	}


}
