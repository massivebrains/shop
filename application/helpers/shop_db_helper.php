<?php

function logActivity($string = '')
{
	$CI = & get_instance();
	$data = array(
		'activity'=>$string,
		'created'=>date('Y-m-d H:i:s'),
		);
	$CI->db->insert(TABLE_ACTIVITY_LOG, $data);
	return TRUE;
}

function save($table = '', $data = array())
{
	$CI = & get_instance();
	$CI->db->insert($table, $data);
	return $CI->db->insert_id();
}

function get($table = '', $orderfield = '', $ordercode='', $limit = '', $offset = '', $where=array())
{
	$CI = & get_instance();
	if(!empty($orderfield) && !empty($ordercode))
		$CI->db->order_by($orderfield, $ordercode);
	if($limit > 0 && $offset >= 0)
		$CI->db->limit($limit, $offset);
	if(!empty($where))
		return $CI->db->get_where($table, $where)->result();

	return $CI->db->get($table)->result();
}

function get_array($table = '', $orderfield = '', $ordercode='', $limit = '', $offset = '', $where=array())
{
	$CI = & get_instance();
	if(!empty($orderfield) && !empty($ordercode))
		$CI->db->order_by($orderfield, $ordercode);
	if($limit > 0 && $offset >= 0)
		$CI->db->limit($limit, $offset);
	if(!empty($where))
		return $CI->db->get_where($table, $where)->result_array();

	return $CI->db->get($table)->result_array();
}

function get_row($table='', $where = array())
{
	$CI = & get_instance();
	$query = $CI->db->get_where($table, $where);
	if($query->num_rows() > 0)
		return $query->row();
	else
		return false;
}

function update($table='', $where = array(), $data = array())
{
	$CI = & get_instance();
	$CI->db->where($where);
	$CI->db->update($table, $data);
	if($CI->db->affected_rows() > 0)
		return true;
	else
		return false;
}

function delete($table='', $where = array())
{
	$CI = & get_instance();
	$CI->db->where($where);
	$CI->db->delete($table);
	if($CI->db->affected_rows() > 0)
		return true;
	else
		return false;
}

function get_cell($table='', $where=array(), $cell='')
{
	$CI = & get_instance();
	$query = $CI->db->get_where($table, $where);
	if($query->num_rows() > 0)
		return $query->row()->$cell;
	else
		return '-- --';
}

function it_exists($table='', $field='', $value='')
{
	$CI = & get_instance();
	$query = $CI->db->get_where($table, array($field=>$value));
	if($query->num_rows() > 0)
	return true;
	else
		return false;
}

function table_count($table = '', $where = array())
{
	$CI = & get_instance();
	$CI->db->where($where);
	return $CI->db->count_all($table, $where);
}

function num_rows($table = '', $where = array())
{
	$CI = & get_instance();
	return $CI->db->get_where($table, $where)->num_rows();
}

function search_products_by_query($query = '', $where = array())
{
	$CI = & get_instance();
	$CI->db->like('name', $query);
	$CI->db->or_like('SKU', $query);
	$CI->db->or_like('description', $query);
	$CI->db->or_like('selling_price', $query);
	$CI->db->or_like('slug', $query);
	$CI->db->order_by('name', 'ASC');
	return $CI->db->get_where(TABLE_PRODUCTS, $where)->result();

	return $CI->db->get($table)->result();
}

function search_by_price($range = 0)
{
	$CI = & get_instance();
	switch(intval($range))
	{
		case 1:
		$CI->db->where('selling_price <=', 50);
		break;
		case 2:
			$CI->db->where('selling_price >=', 50);
			$CI->db->where('selling_price <=', 100);
		break;
		case 3:
			$CI->db->where('selling_price >=', 100);
			$CI->db->where('selling_price <=', 200);
		break;
		case 4:
			$CI->db->where('selling_price >=', 200);
			$CI->db->where('selling_price <=', 500);
		break;
		case 5:
			$CI->db->where('selling_price >=', 500);
			$CI->db->where('selling_price <=', 1000);
		break;
		case 6:
			$CI->db->where('selling_price >=', 1000);
			$CI->db->where('selling_price <=', 2000);
		break;
		case 7:
			$CI->db->where('selling_price >=', 2000);
		break;

		default:
			$CI->db->where('selling_price <', 0);
		break;

	}
	$CI->db->where(array('status'=>1));
	return $CI->db->get(TABLE_PRODUCTS)->result();

	return $CI->db->get($table)->result();
}

function table_sum($table = '', $field = '', $where = array())
{
	$CI = & get_instance();
	$CI->db->where($where);
	$CI->db->select_sum($field, 'sum');
	return $CI->db->get($table)->result()[0]->sum;
}

function table_max($table = '', $field = '')
{
	$CI = & get_instance();
	$CI->db->select_max($field, 'max');
	return $CI->db->get($table)->result()[0]->max;
}

function customer_name($type = '', $id = '')
{
	if($type == 'guest')
		return 'GUEST';
	else {
		$customer = get_row(TABLE_CUSTOMERS, array('id'=>$id));
		return strtoupper($customer->name);
	}
}
