<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();

	}

	public function get_array($where = array())
	{
		$query = $this->db->join(TABLE_CATEGORIES, TABLE_PRODUCTS.".category_id = ".TABLE_CATEGORIES.".id");
		$query = $this->db->join(TABLE_SUB_CATEGORIES, TABLE_PRODUCTS.".subcategory_id = ".TABLE_SUB_CATEGORIES.".id");
		//$query = $this->db->join(TABLE_ORDERS_TRANSACTIONS, TABLE_ORDERS.".id = ".TABLE_ORDERS_TRANSACTIONS.".order_id");
		$query = $this->db->where($where);
		$query = $this->db->order_by('id', 'DESC');
		$this->db->select('
		'.TABLE_PRODUCTS.'.id,
		'.TABLE_PRODUCTS.'.sku,
		'.TABLE_CATEGORIES.'.name AS category_name,
		'.TABLE_SUB_CATEGORIES.'.name AS subcategory_name,
		'.TABLE_PRODUCTS.'.name AS product_name,
		'.TABLE_PRODUCTS.'.name AS product_name,
		'.TABLE_PRODUCTS.'.cost_price,
		'.TABLE_PRODUCTS.'.selling_price,
		'.TABLE_PRODUCTS.'.status AS product_status,
		');
		$query = $this->db->get(TABLE_PRODUCTS);
		return $query->result_array();
	}
}
