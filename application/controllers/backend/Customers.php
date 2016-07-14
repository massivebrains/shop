<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!logged_in())
			logout();
			$this->load->model('customers_model');
	}

	public function index()
	{
		$this->load->view('backend/customers/manage');
	}


	public function data()
	{
		$customers = $this->customers_model->get_array();

		$new_data = array();
		$i = 0;

		foreach($customers as $row){
			$new[$i]['name'] = $customers[$i]['name'];
			$new[$i]['email'] = $customers[$i]['email'];
			$new[$i]['phone'] = $customers[$i]['phone_1'].' ,'.$customers[$i]['phone_2'];
			$new[$i]['number_of_orders'] = num_rows(TABLE_ORDERS, array('customer_id'=>$customers[$i]['id']));
      $sum = table_sum(TABLE_ORDERS, 'order_total', array('customer_id'=>$customers[$i]['id']));
      $new[$i]['total_orders'] = ($sum == NULL ? currency(0) : currency($sum));
			$i++;
		}
		unset($i); unset($customers);
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
		delete(TABLE_CUSTOMERS, $where);
		$where = array('order_id'=>$order_id);
		delete(TABLE_ORDER_DELIVERY_DETAILS, $where);
		delete(TABLE_CUSTOMERS_TRANSACTIONS, $where);
		logActivity('Order Deleted. [ID:'.$order_id.']');
		$this->session->set_flashdata('success', 'Action Succesful.');
		$this->index();
	}


}
