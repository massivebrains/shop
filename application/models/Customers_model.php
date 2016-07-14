<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//implements DatatableModel
class Customers_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();

	}

public function get_array($where = array())
{

	$query = $this->db->where($where);
	$query = $this->db->order_by('id', 'DESC');
	$query = $this->db->get(TABLE_CUSTOMERS);
	return $query->result_array();
}

}
