<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();

	}


public function get($where = array())
{
	$query = $this->db->join(TABLE_ORDER_DELIVERY_DETAILS, TABLE_ORDERS.".id = ".TABLE_ORDER_DELIVERY_DETAILS.".order_id");
	//$query = $this->db->join(TABLE_ORDERS_TRANSACTIONS, TABLE_ORDERS.".id = ".TABLE_ORDERS_TRANSACTIONS.".order_id");
	$query = $this->db->where($where);
	$query = $this->db->order_by('id', 'DESC');
	$query = $this->db->get(TABLE_ORDERS);
	return $query->result();
}


public function get_array($where = array())
{
	$query = $this->db->join(TABLE_ORDER_DELIVERY_DETAILS, TABLE_ORDERS.".id = ".TABLE_ORDER_DELIVERY_DETAILS.".order_id");
	//$query = $this->db->join(TABLE_ORDERS_TRANSACTIONS_LOG, TABLE_ORDERS.".id = ".TABLE_ORDERS_TRANSACTIONS.".order_id");
	$query = $this->db->where($where);
	$this->db->select('
	'.TABLE_ORDERS.'.id,
	'.TABLE_ORDERS.'.date,
	'.TABLE_ORDERS.'.order_number,
	'.TABLE_ORDER_DELIVERY_DETAILS.'.address,
	'.TABLE_ORDER_DELIVERY_DETAILS.'.delivery_option,
	'.TABLE_ORDER_DELIVERY_DETAILS.'.delivery_status,
	'.TABLE_ORDERS.'.order_total,
	'.TABLE_ORDERS.'.status,
	'.TABLE_ORDERS.'.customer_type,
	'.TABLE_ORDERS.'.customer_id,
	');
	$query = $this->db->order_by('id', 'DESC');
	$query = $this->db->get(TABLE_ORDERS);
	return $query->result_array();
}

public function get_order($where = array())
{
	$query = $this->db->join(TABLE_ORDER_DELIVERY_DETAILS, TABLE_ORDERS.".id = ".TABLE_ORDER_DELIVERY_DETAILS.".order_id");
	//$query = $this->db->join(TABLE_ORDERS_TRANSACTIONS_LOG, TABLE_ORDERS.".id = ".TABLE_ORDERS_TRANSACTIONS.".order_id");
	$query = $this->db->where($where);
	$query = $this->db->get(TABLE_ORDERS);
	return $query->row();
}

public function save_returned_payment_data($data = array())
{
		$this->db->insert(TABLE_ORDERS_TRANSACTIONS_LOG, $data);
    return true;
}

}
