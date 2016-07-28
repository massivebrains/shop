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
			$new[$i]['delivery_option'] = ($orders[$i]['delivery_option'] == 'pick_up' ? 'Pick Up' : 'Address');
			$new[$i]['order_status'] = $orders[$i]['status'];
			$new[$i]['order_total'] = $orders[$i]['order_total'];
			$new[$i]['delivery_status'] = $orders[$i]['delivery_status'];
			$new[$i]['payment_method'] = ($orders[$i]['payment_method'] == 'online' ? 'Online' : 'Pay on Delivery');
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
		delete_order($order_id);
		$this->session->set_flashdata('success', 'Action Succesful.');
		$this->index();
	}

	public function mark_order_as_completed($order_id)
	{
		$where = array('id'=>$order_id);
		$data['status'] = 'completed';
		update(TABLE_ORDERS, $where, $data);
		$_data['date_delivered'] = date('Y-m-d H:i:s');
		$_data['delivery_status'] = 'delivered';
		$where = array('order_id'=>$order_id);
		update(TABLE_ORDER_DELIVERY_DETAILS, $where, $_data);
		logActivity('Order Marked as Completed. [ID:'.$order_id.']');
		$this->session->set_flashdata('success', 'Order has been marked as completed.');
		$this->order($order_id);

	}

	public function unmark_order_as_completed($order_id)
	{
		$where = array('id'=>$order_id);
		$data['status'] = 'pending';
		update(TABLE_ORDERS, $where, $data);
		$_data['date_delivered'] = '0000-00-00 00:00:00';
		$_data['delivery_status'] = 'pending';
		$where = array('order_id'=>$order_id);
		update(TABLE_ORDER_DELIVERY_DETAILS, $where, $_data);
		logActivity('Order Unmarked as Completed. [ID:'.$order_id.']');
		$this->session->set_flashdata('success', 'Order has been unmarked as completed.');
		$this->order($order_id);

	}

	//Gets a payment status from the payment gateway api.
	public function getStatus($transref, $mertid, $type='', $sign){
		$request = 'mertid='.$mertid.'&transref='.$transref.'&respformat='.$type.'&signature='.$sign; //initialize the request variables
		$url = 'https://www.cashenvoy.com/sandbox/?cmd=requery'; //this is the url of the gateway's test api
		//$url = 'https://www.cashenvoy.com/webservice/?cmd=requery'; //this is the url of the gateway's live api
		$ch = curl_init(); //initialize curl handle
		curl_setopt($ch, CURLOPT_URL, $url); //set the url
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true); //return as a variable
		curl_setopt($ch, CURLOPT_POST, 1); //set POST method
		curl_setopt($ch, CURLOPT_POSTFIELDS, $request); //set the POST variables
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$response = curl_exec($ch); // grab URL and pass it to the browser. Run the whole process and return the response
		curl_close($ch); //close the curl handle
		return $response;
	}

	//calls the getStatus() method and formats the reponse as per what is requested via thie $status_request argument.
	public function verify_payment($order_id = 0)
	{
		$order = get_row(TABLE_ORDERS, array('id'=>$order_id));
		var_dump($order);
		$key = CASH_ENVOY_MERCHANT_KEY;
		$transref = $order->order_number;
		$mertid = CASH_ENVOY_MERCHANT_ID;
		$type = ''; //Data return format. Options are xml or json. leave blank if you want data returned in string format.
		$cdata = $key.$transref.$mertid;
		$signature = hash_hmac('sha256', $cdata, $key, false);
		$response = $this->getStatus($transref,$mertid,$type,$signature);

		$response = strip_tags(preg_replace('#(<title.*?>).*?(</title>)#', '$1$2', $response));
		$data = explode('-',$response);
		$cnt = count($data);
		if($cnt==3){
			$result = 'PAYMENT WAS SUCCESFUL AND THE SUM OF '.currency((int)$data[2]).' WAS PAID.';
		} else {
			$result = $data[0];
		}
		$this->session->set_flashdata('success', $result);
		$this->order($order->id);
	}

}
