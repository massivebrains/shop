	<?php

	function admin_url()
	{
		return site_url('backend/index');
	}

	function build_select($table='', $where = array(), $name='', $label='', $unique_field='', $visible_field='', $active = 0)
	{
		$CI = & get_instance();

		$html = "<label>".$label."</label>";
		$html.="<select type='text' name='".$name."' class='form-control' id=".$name.">";

		if(!empty($where))
			$data = $CI->db->get_where($table, $where)->result();
		else
			$data = $CI->db->get($table)->result();
		if(empty($data)) {
			$html.="<option value=''>--select--</option>";
		} else {
			foreach($data as $row) {
				if($active != 0) {
					if($row->$unique_field == $active)
						$html.="<option value='".$row->$unique_field."' selected>".$row->$visible_field."</option>";
					else
						$html.="<option value='".$row->$unique_field."'>".$row->$visible_field."</option>";
				} else {
					$html.="<option value='".$row->$unique_field."'>".$row->$visible_field."</option>";
				}

			}
			$html.="</select>";
		}

		return $html;
	}

	function has_subcategories($category_id = '')
	{
		$CI = & get_instance();
		$query = $CI->db->get_where(TABLE_SUB_CATEGORIES, array('category_id'=>$category_id));
		if($query->num_rows() > 0)
			return true;
		else
			return false;
	}

	function build_frontend_category_menu()
	{
		$CI = & get_instance();
		$categories = get(TABLE_CATEGORIES, 'id', 'ASC', '', '', array('status'=>1));
		$html = '<ul id="desktopMenu">';
		foreach ($categories as $row) {
			$url = site_url('category/'.$row->slug);
			if (has_subcategories($row->id)) {
				$sub_categories = get(TABLE_SUB_CATEGORIES, 'id', 'ASC','','', $where=array('category_id'=>$row->id, 'status'=>1));
				$html.='<li><a href="'.$url.'" class="cat">'.strtoupper($row->name).'</a>';
				$html.='<ul class="subMenu">';
				foreach($sub_categories as $inner_row)
					$html.='<li><a href="#" class="subcat">'.strtoupper($inner_row->name).'</a></li>';
				$html.='</ul></li>';
			} else {
				$html.='<li><a href="'.$url.'" class="cat">'.strtoupper($row->name).'</a></li>';
			}
		}
		$html.='</ul>';
		return $html;
	}

	function has_products($supplier_id = 0)
	{
		$CI = & get_instance();
		$query = $CI->db->get_where(TABLE_PRODUCTS, array('supplier_id'=>$supplier_id));
		if($query->num_rows() > 0)
			return true;
		else
			return false;
	}

	// <table class="table">
	// 		<tr>
	// 			<td><strong>Total</strong></td>
	// 			<td><strong></strong></td>
	// 		</tr>
	// 		<tr>
	// 			<td><strong>Delivery Charge</strong></td>
	// 			<td><strong></strong></td>
	// 		</tr>
	//
	// </table>
	function build_charges_table($order_total)
	{
		$CI = & get_instance();
		$html = '
			<table class="table">
					<tr>
						<td><strong>Total</strong></td>
						<td><strong>'.currency($order_total).'</strong></td>
					</tr>
		';
		$charges = $CI->db->get_where(TABLE_CHARGES, array('status'=>1));
		if($charges->num_rows() < 1) {
			$html.='
					<tr>
						<td><strong>Grand Total:</strong></td>
						<td><strong>'.currency($order_total).'</strong></td>;

					</tr>
			';
			$html.='</table>';
			$data = array('html'=>$html, 'total'=>$order_total);
			return $data;
		}

		foreach($charges->result() as $row) {
			if($row->type == 'credit') {
				$order_total+=$row->value;
				$html.='
					<tr>
						<td><strong style="color:red;">'.$row->name.'</strong></td>
						<td><strong style="color:red;">'.currency($row->value).'</strong></td>
					</tr>
				';
			} else {
				$order_total-=$row->value;
				$html.='
					<tr>
						<td><strong style="color:green;">'.$row->name.'</strong></td>
						<td><strong style="color:green;">'.currency($row->value).'</strong></td>
					</tr>
				';
			}

			}
			$html.='
					<tr>
						<td><strong>Grand Total:</strong></td>
						<td><strong syle="font-size:20px;">'.currency($order_total).'</strong></td>

					</tr>
			';
			$html.='</table>';
			$data = array('html'=>$html, 'total'=>$order_total);
			return $data;
	}

	function get_charges($type = '')
	{
		$CI = & get_instance();
		$query = $CI->db->get_where(TABLE_CHARGES, array('status'=>1, 'type'=>$type));
		if($query->num_rows() < 1)
		 return array();
		$i = 0;
		foreach($query->result() as $row){
			$data[$i]['charge'] = $row->name;
			$data[$i]['value'] = $row->value;
			$i++;
		}
		return $data;
	}

	function currency($number = 0)
	{
		return APP_CURRENCY.number_format(intval($number),2);
	}
