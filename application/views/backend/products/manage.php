<?php $this->load->view('backend/includes/tables-head') ?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/assets/uploadify/uploadify.css">
<body class="fixed-header ">
	<?php $this->load->view('backend/includes/links') ?>


	<div class="page-container ">

		<?php $this->load->view('backend/includes/header') ?>


		<div class="page-content-wrapper ">

			<div class="content ">

				<div class="modal fade" id="image-modal">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title"><div id="name"></div></h4>
							</div>
							<div class="modal-body">
								<!-- <div class="uploadify-queue" id="file-queue"></div>
								<input type="file" name="image" id="upload_btn">
								<input type="hidden" name="product_id" value="" id="product_id"> -->
								<?php echo form_open_multipart('backend/products/uploadify');?>
								<input type="file" name="image" class="form-control">
								<input type="hidden" name="product_id" value="" id="product_id">
								<input type="submit"  value="Upload" class="btn btn-primary btn-sm">
							</form>
						</div>

					</div>
				</div>
			</div>

			<div class="jumbotron" data-pages="parallax">
				<div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
					<div class="inner">

						<ul class="breadcrumb">
							<li><p>Dashboard</p></li>
							<li><a href="<?php echo site_url('backend/products') ?>" class="active">Products</a></li>
						</ul>

					</div>
				</div>
			</div>


			<div class="container-fluid container-fixed-lg">
				<?php $this->load->view('backend/includes/alert') ?>

				<div class="panel">

					<ul class="nav nav-tabs nav-tabs-linetriangle" data-init-reponsive-tabs="dropdownfx">
						<li class="active">
							<a data-toggle="tab" href="#branches"><span>Products</span></a>
						</li>
						<li>
							<a data-toggle="tab" href="#add"><span>Add New</span></a>
						</li>

						<li>
							<a data-toggle="tab" href="#bulk"><span>Bulk Upload</span></a>
						</li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane slide-left active" id="branches">
							<!-- View Branches Table start -->
							<div class="conatiner">
								<div class="row">
									<div class="col-lg-12 col-md-12">

										<div class="clearfix"></div>
											<table class="table " id="productsDataTable">
												<thead>
													<tr>
														<td>PRODUCT SKU</td>
														<td>CATEGORY</td>
														<td>SUB-CATEGORY</td>
														<td>NAME</td>
														<td>COST PRICE</td>
														<td>SELLING PRICE</td>
														<td>ACTION</td>
														<td>STATUS</td>
													</tr>

												</thead>

											</table>
										</div>

									</div>
								</div>
								<!-- Veiw Branches Table end -->
							</div>

							<div class="tab-pane slide-left" id="add">
								<div class="row">


									<?php echo form_open_multipart('backend/products/manage');?>
									<div class="col-md-6">
										<div class="form-group">
											<?=build_select(TABLE_CATEGORIES, '', 'category_id', 'Category', 'id', 'name')  ?>
										</div>

										<div class="form-group">
											<?=build_select(TABLE_SUB_CATEGORIES, '', 'subcategory_id', 'Sub Category', 'id', 'name')  ?>
										</div>

										<div class="form-group">
											<label>Product Name</label>
											<input type="text" name="name" class="form-control" id="name" value="<?php set_value('name') ?>">
										</div>

										<div class="form-group">
											<?=build_select(TABLE_SUPPLIERS, '', 'supplier_id', 'Supplier', 'id', 'name')  ?>
										</div>

										<div class="form-group">
											<label>Product Description</label>
											<textarea name="description" cols="4" rows="4" class="form-control" id="description"><?php set_value('description') ?></textarea>
										</div>

										<div class="form-group">
											<label>Product Image <small class="text-danger">(Image size must be 360 X 360 pixels)</small></label>
											<input type="file" name="image" class="form-control" id="image">
										</div>

										<div class="form-group">
											<label>Status</label>
											<select type="text" name="status" class="form-control" id="status">
												<option value="1">Active</option>
												<option value="0">Inactive</option>
												option
											</select>
										</div>

									</div>

									<div class="col-md-6">

										<div class="form-group">
											<label>Cost Price</label>
											<div class="input-group">
												<span class="input-group-addon"><?=APP_CURRENCY ?></span>
												<input type="text" class="form-control" placeholder="00.00" name="cost_price" value="<?php set_value('cost_price') ?>">
											</div>
										</div>

										<div class="form-group">
											<label>Selling Price</label>
											<div class="input-group">
												<span class="input-group-addon"><?=APP_CURRENCY ?></span>
												<input type="text" class="form-control" placeholder="00.00" name="selling_price" value="<?php set_value('price') ?>" id="selling_price">
											</div>
										</div>


										<div class="form-group">
											<label>
												Discount
												<select name="dis" id="dis">
													<option value="flat">Flat</option>
													<option value="percent">Percent</option>
												</select>
											</label>
											<input type="text" name="flat_discount" class="form-control" id="flat" alue="<?php set_value('discount') ?>" placeholder="00.00">&nbsp;
											<div class="row" id="percent">
												<div class="col-lg-7 col-sm-7 col-md-7">
													<div class="input-group">
														<input type="text" class="form-control" placeholder="00.00" name="percent_discount" value="<?php set_value('percent_discount') ?>" id="percent_discount">
														<span class="input-group-addon">%</span>
													</div>
												</div>
												<div class="col-lg-5 col-sm-5 col-md-5">
													<input type="number" class="form-control" id="result" disabled>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label>Barcode 1</label>
											<input type="text" name="barcode1" class="form-control" id="barcode1" value="<?php set_value('barcode1') ?>">
										</div>

										<div class="form-group">
											<label>Barcode 2</label>
											<input type="text" name="barcode2" class="form-control" id="barcode2" value="<?php set_value('barcode2') ?>">
										</div>

										<div class="form-group">
											<label>Barcode 3</label>
											<input type="text" name="barcode3" class="form-control" id="barcode3" value="<?php set_value('barcode3') ?>">
										</div>

										<div class="form-group">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</div> <!-- end of row 6 -->
								</form>


								<div class="col-md-3"></div>
							</div>
						</div>

						<div class="tab-pane slide-left" id="bulk">
							<!-- View Branches Table start -->
							<div class="conatiner">
								<div class="row">
									<div class="col-lg-12 col-md-12">
										<div class="clearfix"></div>
										<div class="row">
											<div class="col-lg-7 col-md-7 col-sm-7">
												<div class="alert alert-warning">
													<h2 class="text-danger">Important Information!</h2>
													Product Bulk upload is based on categories, subcagetories and suppliers. Their unique identification numbers are used in-place of their names on the excel spreadsheet and database table.<br>
													The table below shows the categories, subcategories, suppliers and their respective Unique IDs.<br>
													<?php $categories = get(TABLE_CATEGORIES, 'id', 'ASC'); ?>
													<?php $subcategories = get(TABLE_SUB_CATEGORIES, 'id', 'ASC'); ?>
													<?php $suppliers = get(TABLE_SUPPLIERS, 'id', 'ASC'); ?>

													<div class="row">
														<div class="col-lg-4 col-sm-4 col-md-4">
															<table class="table table-borderd">

																<thead>
																	<tr>
																		<td colspan="2"><strong>Categories</strong></td>
																	</tr>
																	<tr>
																		<td><strong>Name</strong></td>
																		<td><strong>ID</strong></td>
																	</tr>
																</thead>
																<tbody>
																	<?php foreach($categories as $row): ?>
																		<tr>
																			<td><?php echo $row->name; ?></td>
																			<td><strong><?php echo $row->id; ?></strong></td>
																		</tr>
																	<?php endforeach; ?>
																</tbody>
															</table>
														</div>
														<div class="col-lg-4 col-sm-4 col-md-4">
															<table class="table table-borderd">

																<thead>
																	<tr>
																		<td colspan="2"><strong>Sub Categories</strong></td>
																	</tr>
																	<tr>
																		<td><strong>Name</strong></td>
																		<td><strong>ID</strong></td>
																	</tr>
																</thead>
																<tbody>
																	<?php foreach($subcategories as $row): ?>
																		<tr>
																			<td><?php echo $row->name; ?></td>
																			<td><strong><?php echo $row->id; ?></strong></td>
																		</tr>
																	<?php endforeach; ?>
																</tbody>
															</table>
														</div>
														<div class="col-lg-4 col-sm-4 col-md-4">
															<table class="table table-borderd">

																<thead>
																	<tr>
																		<td colspan="2"><strong>Suppliers</strong></td>
																	</tr>
																	<tr>
																		<td><strong>Name</strong></td>
																		<td><strong>ID</strong></td>
																	</tr>
																</thead>
																<tbody>
																	<?php foreach($suppliers as $row): ?>
																		<tr>
																			<td><?php echo $row->name; ?></td>
																			<td><strong><?php echo $row->id; ?></strong></td>
																		</tr>
																	<?php endforeach; ?>
																</tbody>
															</table>
														</div>
													</div>
													<p>The IDs above are to be noted when inputting data in the excel spreadsheet. The Image below shows a sample excel spreadsheet with valid inputs to be uploaded. <a  target="_blank" href="<?php echo base_url() ?>assets/backend/others/excel.PNG">click here</a> to download a sample image for better understanding.</p>
													<p><a target="_blank" href="<?php echo base_url() ?>assets/backend/others/excel.xslxs">click here</a> to download an excel spreadsheet template.</p>

												</div>
											</div>
											<div class="col-lg-5 col-md-5 col-sm-5">
												<?php echo form_open_multipart('backend/products/bulk');?>
												<div class="form-group">
													<label for="">Select File (.xlsx)</label>
													<input type="file" class="form-control" name="file">
												</div>
												<div class="form-group">
													<button type="submit" class="btn btn-primary btn-sm">Submit</button>
												</div>
											</form>
										</div>
									</div>
								</div>

							</div>
						</div>
						<!-- Veiw Branches Table end -->
					</div>


				</div>
			</div>



		</div>

	</div>

	<?php  $this->load->view('backend/includes/footer-note') ?>

</div>

</div>

<?php $this->load->view('backend/includes/tables-footer') ?>
</body>
<script type="text/javascript">
$(document).ready(function() {
	var url = "<?php echo site_url('backend/products/data') ?>";
	$('#productsDataTable').DataTable( {
		"ajax":{
			"url": url,
		}
	});
});

$('#percent').hide();
$('#flat').show();
$('#dis').on('change', function(){
	if($('#dis').val() == 'percent') {
		$('#percent').show();
		$('#flat').hide();
	} else {
		$('#flat').show();
		$('#percent').hide();
	}
})

$('#percent_discount').on('change', function(){
	s = Number($('#selling_price').val());
	p = Number($('#percent_discount').val());
	$('#result').val(Math.round(s*(p/100),2));
})

$('#selling_price').on('change', function(){
	s = Number($('#selling_price').val());
	p = Number($('#percent_discount').val());
	$('#result').val(Math.round(s*(p/100),2));
})

function loadmodal(id) {
	$('#name').html($('#pname'+id).html());
	$('input[name=product_id]').val(id);
	$('#image-modal').modal();
}

$(function() {
	$('#upload_btn').uploadify({
		'debug'   : false,

		'swf'   : '<?php echo base_url() ?>assets/backend/assets/uploadify/uploadify.swf',
		'uploader'  : '<?php echo base_url('backend/products/uploadify')?>',
		'onUploadStart' : function(file) {
			$('#upload_btn').uploadify("settings", "formData", {'product_id' : $('input[name=product_id]').val()});
		},
		'cancelImage' : '<?php echo base_url() ?>assets/backend/assets/uploadify/uploadify-cancel.png',
		'queueID'  : 'file-queue',
		'buttonClass'  : 'button',
		'buttonText' : "Upload File",
		'multi'   : false,
		'auto'   : true,

		'fileTypeExts' : '*.jpg; *.png; *.gif; *.PNG; *.JPG; *.GIF;',
		'fileTypeDesc' : 'Image Files',

		'method'  : 'post',
		'fileObjName' : 'image',

		'queueSizeLimit': 1,
		'simUploadLimit': 2,
		'sizeLimit'  : 1024,
		'onUploadSuccess' : function(file, data, response) {
			//alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
			if(data == 1)
			$('#name').html('Uploaded Succesfully.');
			else
			$('#name').text(data);
		},
		'onUploadComplete' : function(file) {
			//do any stuff.
		},
		'onQueueFull': function(event, queueSizeLimit) {
			alert("Please don't put anymore files in me! You can upload " + queueSizeLimit + " files at once");
			return false;
		},
	});
});
</script>
</html>
