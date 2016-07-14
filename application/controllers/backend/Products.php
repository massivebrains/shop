<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!logged_in())
			logout();
		$this->load->model('products_model');
	}

	public function index()
	{
		//$data['products'] = get(TABLE_PRODUCTS, 'id', 'DESC');
		$this->load->view('backend/products/manage');
	}

	public function data()
	{
		$products = $this->products_model->get_array();
    //var_dump($products);
    //die();

		$additional_data = array();
		for($i = 0; $i<count($products); $i++) {
			$edit_link = site_url('backend/products/manage/'.$products[$i]['id']);
      $image_onclick = 'loadmodal('.$products[$i]['id'].')';
			$delete_link = site_url('backend/products/delete/'.$products[$i]['id']);
      $delete_onclick = 'return confirm("Are you sure?");';
      $action_html = "
        <div class='btn-sm dropdown'>
            <a class='dropdown-toggle' data-toggle='dropdown' href='#'>Actions
            <span class='caret'></span>&nbsp;
            <ul class='dropdown-menu'>
                <li><a href='".$edit_link."'>Edit</a></li>
                <li><a href='javascript:;' onclick='".$image_onclick."'>Upload Image</a></li>
                <li><a href='".$delete_link."' onclick='".$delete_onclick."'>Delete</a></li>
            </ul>
            </a>
        </div>
      ";
			$additional_data[$i]['action'] = $action_html;
		}
		$new_data = array();
		$i = 0;
		foreach($products as $row){
			$new[$i]['sku']                = $products[$i]['sku'];
			$new[$i]['category_name']      = $products[$i]['category_name'];
			$new[$i]['subcategory_name']   = $products[$i]['subcategory_name'];
			$new[$i]['product_name']       = $products[$i]['product_name'];
			$new[$i]['cost_price']         = APP_CURRENCY.number_format($products[$i]['cost_price'],2);
			$new[$i]['selling_price']      = APP_CURRENCY.number_format($products[$i]['selling_price'],2);
			$new[$i]['action']             = $additional_data[$i]['action'];
			$new[$i]['product_status']     = ($products[$i]['product_status'] == '1') ? 'Active' : 'Inactive';
			$i++;
		}
		unset($i); unset($products); unset($additional_data);
		//var_dump($new);
    //die();
		$output = array();
		foreach($new as $key=>$value) {
			$output[] = array_values($value);
		}
		echo json_encode(array('data'=>$output), JSON_HEX_QUOT | JSON_HEX_TAG);

	}

	public function manage($product_id = 0)
	{
		if ($product_id != 0){
			$data['product'] = get_row(TABLE_PRODUCTS, array('id'=>$product_id));
			$this->load->view('backend/products/edit', $data);
			return;
		}
		$data = $this->input->post();
		if ($this->input->post('product_id')) {
			if ($data['name'] != get_cell(TABLE_PRODUCTS, array('id'=>$data['product_id']), 'name')) {
				$this->form_validation->set_rules('name', 'Product Name', 'required|is_unique['.TABLE_PRODUCTS.'.name]');
				if($this->form_validation->run() == False)
					redirect('backend/products/manage/'.$data['product_id']);
			}

			$id = $this->input->post('product_id');
			$name = $data['name'];
			$name = explode(' ', $data['name']);
			$data['slug'] = strtolower(implode('-', $name));
			unset($data['product_id']);
			if($this->input->post('percent_discount') == '')
				unset($data['percent_discount']);
			if($this->input->post('flat_discount') == '')
				unset($data['flat_discount']);
			unset($data['dis']);
			$where = array('id'=>$id);
			if(update(TABLE_PRODUCTS, $where, $data)) {
				logActivity('Product Data Updated. [ID:'.$id.']');
				$this->session->set_flashdata('success', 'Action Succesful.');
			} else {
				$this->session->set_flashdata('error', 'Action Unsuccesful.');
			}
			$this->index();
		} else {
			$this->form_validation->set_rules('name', 'Product Name', 'required|is_unique['.TABLE_PRODUCTS.'.name]');
			$this->form_validation->set_rules('cost_price', 'Cost Price', 'numeric');
			$this->form_validation->set_rules('selling_price', 'Cost Price', 'numeric');
			if($this->input->post('percent_discount') != '')
				$this->form_validation->set_rules('percent_discount', 'Discount', 'numeric');
			if($this->input->post('flat_discount') != '')
				$this->form_validation->set_rules('flat_discount', 'Discount', 'numeric');
			if ($this->form_validation->run() == FALSE) {
				$this->index();
			} else {
				$data = $this->input->post();
				$this->load->helper('string');
				$data['sku'] = random_string('numeric', 10);
				while(it_exists(TABLE_PRODUCTS, 'sku', $data['sku']))
					$data['sku'] = random_string('numeric', 10);
				$data['created'] = date('Y-m-d H:i:s');
				$name = $data['name'];
				$name = explode(' ', $data['name']);
				$data['slug'] = strtolower(implode('-', $name));
				if($this->input->post('percent_discount') == '')
					unset($data['percent_discount']);
				if($this->input->post('flat_discount') == '')
					unset($data['flat_discount']);
				unset($data['dis']);
				//if ($this->input->post('image')) {
				$config['upload_path']			= 'assets/uploads/products/';
				$config['allowed_types']		= 'gif|jpg|png';
				$config['max_size']				= '500';
				$config['max_width']			= '360';
				$config['max_height']			= '360';
				$config['file_name']			= $data['sku'];
				$config['overwrite']			= true;
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('image')) {
					$this->session->set_flashdata('error', $this->upload->display_errors());
					redirect('backend/products');
				} else {
					$data['image'] = $this->upload->data('file_name');
				}
				//}
				if ($insert_id = save(TABLE_PRODUCTS, $data)) {
					logActivity('New Product Created. [SKU:'.$data['sku'].']');
					$this->session->set_flashdata('success', 'Action Succesful.');
				} else {
					$this->session->set_flashdata('error', 'Action Unsuccesful.');
				}
				$this->index();
			}

		}
	}

	public function bulk()
	{
		$this->load->library('PHPExcel');
		//$this->load->library('PHPExcel/Cell/AdvancedValueBinder');
		$this->load->helper('string');
		$config['upload_path'] = 'assets/uploads/excel';
		$config['allowed_types'] = 'xls|xlsx';
		$config['max_size'] = '6000';
		$config['file_name'] = 'products-'.date('Y-m-d');
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('file')) {
			$error = $this->upload->display_errors("<span>", "</span>");
			$this->session->set_flashdata('error', $error);
			$this->index();
		} else {
            //filename
			$file_name = $this->upload->file_name;

			$objReader = PHPExcel_IOFactory::createReader('Excel2007');
			$objReader->setReadDataOnly(true);
			$objPHPExcel = $objReader->load($this->upload->upload_path . $this->upload->file_name);
			$objWorksheet = $objPHPExcel->getActiveSheet();
            $highestRow = $objWorksheet->getHighestRow(); // e.g. 10
            $error = "There is/are error(s) with this/these row(s):\n\n ";
            $message = "";

            //error file configuration
            $error_log_filename = $config['file_name'] . ".txt";
            $error_count = $success_count = 0;

            for ($row = 2; $row <= $highestRow; ++$row) //$highestRow
            {
            	$category_id = trim($objWorksheet->getCellByColumnAndRow(0, $row)->getValue());
            	$subcategory_id = trim($objWorksheet->getCellByColumnAndRow(1, $row)->getValue());
            	$supplier_id = trim($objWorksheet->getCellByColumnAndRow(2, $row)->getValue());
            	$name = trim($objWorksheet->getCellByColumnAndRow(3, $row)->getValue());
            	$description = trim($objWorksheet->getCellByColumnAndRow(4, $row)->getValue());
            	$flat_discount = trim($objWorksheet->getCellByColumnAndRow(5, $row)->getValue());
            	$percent_discount = trim($objWorksheet->getCellByColumnAndRow(6, $row)->getValue());
            	$selling_price = trim($objWorksheet->getCellByColumnAndRow(7, $row)->getValue());
            	$cost_price = trim($objWorksheet->getCellByColumnAndRow(8, $row)->getValue());
            	$barcode1 = trim($objWorksheet->getCellByColumnAndRow(9, $row)->getValue());
            	$barcode2 = trim($objWorksheet->getCellByColumnAndRow(10, $row)->getValue());
            	$barcode3 = trim($objWorksheet->getCellByColumnAndRow(11, $row)->getValue());

                //check for empty fields.
            	if (
            		($category_id != '' && is_numeric($category_id) && $category_id > 0) &&
            		($subcategory_id != '' && is_numeric($subcategory_id) && $subcategory_id > 0) &&
            		($supplier_id != '' && is_numeric($supplier_id) && $supplier_id > 0) &&
            		$name != '' &&
            		($selling_price != '' && is_numeric($selling_price)) &&
            		($cost_price != '' && is_numeric($cost_price))
            		) {


            		$sku = random_string('numeric', 10);
            	while(it_exists(TABLE_PRODUCTS, 'sku', $sku))
            		$sku = random_string('numeric', 10);
            	$x = explode(' ', $name);
            	$save['sku'] = $sku;							$save['category_id'] = $category_id;
            	$save['subcategory_id'] = $subcategory_id;		$save['supplier_id'] = $supplier_id;
            	$save['name'] = $name;							$save['description'] = $description;
            	$save['slug'] = strtolower(implode('-', $x));	$save['flat_discount'] = $flat_discount;
            	$save['percent_discount'] = $percent_discount;	$save['selling_price'] = $selling_price;
            	$save['cost_price'] = $cost_price;				$save['barcode1'] = $barcode1;
            	$save['barcode2'] = $barcode2;					$save['barcode3'] = $barcode2;
            	$save['created'] = date('Y-m-d H:i:s');			$save['status'] = 1;
            	$insert_id = save(TABLE_PRODUCTS, $save);
            	$success_count++;
            } else {
            	$error = "This product has invalid information. >>> " . $name . "\n \n \n ";
            	write_file(UPLOADED_ERROR_LOG_PATH . $error_log_filename, $error, 'a+');
            	$error_count++;
            }

            } // End of loop.
            logActivity('Products Uploaded. [Count:'.$success_count.']');
            if($error_count > 0) {
            	$message = "View Logged Errors <a target=\"_blank\" href=\"" . UPLOADED_ERROR_LOG_PATH . $error_log_filename . "\">here</a>";
            	$this->session->set_flashdata('error', $message);
            }
            $this->session->set_flashdata('success', 'Action Succesful.');
            $this->index();
        }
    }


    public function delete($id = '')
    {

    	$image = get_cell(TABLE_PRODUCTS, array('id'=>$id), 'image');
    	$this->load->helper('file');
    	delete_files('./assets/uploads/products/'.$image); // fix this not working yet.
    	//unlink('assets/backend/products/'.$image);
    	$where = array('id'=>$id);
    	if (delete(TABLE_PRODUCTS, $where)) {
    		logActivity('Category Deleted. [ID:'.$id.']');
    		$this->session->set_flashdata('success', 'Action Succesful.');
    	} else {
    		$this->session->set_flashdata('error', 'Action Unsuccesful.');
    	}
    	$this->index();
    }

    public function uploadify()
    {
    	$product_id = $this->input->post('product_id');
    	$sku = get_cell(TABLE_PRODUCTS, array('id'=>$product_id), 'sku');
    	$config['upload_path']			= 'assets/uploads/products/';
    	$config['allowed_types']		= 'gif|jpg|png|PNG|JPG';
    	$config['max_size']				= '500';
    	$config['max_width']			= '360';
    	$config['max_height']			= '360';
    	$config['file_name'] 			= $sku;
    	$config['overwrite']			= true;
    	$this->load->library('upload', $config);
    	if(!$this->upload->do_upload('image')) {
    		$response = $this->upload->display_errors('','');
    	} else {
    		$where = array('id'=>$product_id);
    		$data['image'] = $this->upload->data('file_name');
			if(update(TABLE_PRODUCTS, $where, $data))
    		$response = 'Image uploaded succesfully';
    	}
      $this->session->set_flashdata('success', $response);
      $this->index();
    	//$this->output->set_content_type('application/json')->set_output(json_encode($response));
    }


}
