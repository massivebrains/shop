<?php if(!isset($product)){ redirect(site_url('backend/products'));}?>
<?php $this->load->view('backend/includes/tables-head') ?>
<body class="fixed-header ">
	<?php $this->load->view('backend/includes/links') ?>


	<div class="page-container ">

		<?php $this->load->view('backend/includes/header') ?>


		<div class="page-content-wrapper ">

			<div class="content ">

				<div class="jumbotron" data-pages="parallax">
					<div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
						<div class="inner">

							<ul class="breadcrumb">
								<li><p>Dashboard</p></li>
								<li><a href="<?php echo site_url('backend/products') ?>" class="active">Products</a></li>
								<li><a href="#" class="active">Edit</a></li>
							</ul>

						</div>
					</div>
				</div>


				<div class="container-fluid container-fixed-lg">
					<?php $this->load->view('backend/includes/alert') ?>

					<div class="panel">

						<ul class="nav nav-tabs nav-tabs-linetriangle" data-init-reponsive-tabs="dropdownfx">
							<li class="active">
								<a data-toggle="tab" href="#add"><span>Edit Product Information</span></a>
							</li>
							
						</ul>

						<div class="tab-content">

							<div class="tab-pane slide-left active" id="add">
								<div class="row">


									<?php echo form_open_multipart('backend/products/manage');?>
									<div class="col-md-6">
										<div class="form-group">
											<?=build_select(TABLE_CATEGORIES, '', 'category_id', 'Category', 'id', 'name', $product->category_id)  ?>
										</div>

										<div class="form-group">
											<?=build_select(TABLE_SUB_CATEGORIES, '', 'subcategory_id', 'Sub Category', 'id', 'name', $product->subcategory_id)  ?>
										</div>

										<div class="form-group">
											<label>Product Name</label>
											<input type="text" name="name" class="form-control" id="name" value="<?=$product->name ?>">
										</div>

										<div class="form-group">
											<?=build_select(TABLE_SUPPLIERS, '', 'supplier_id', 'Supplier', 'id', 'name', $product->supplier_id)  ?>
										</div>

										<div class="form-group">
											<label>Product Description</label>
											<textarea name="description" cols="4" rows="4" class="form-control" id="description"><?=$product->description ?></textarea>
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
												<input type="text" class="form-control" placeholder="00.00" name="cost_price" value="<?=$product->cost_price?>">
											</div>
										</div>

										<div class="form-group">
											<label>Selling Price</label>
											<div class="input-group">
												<span class="input-group-addon"><?=APP_CURRENCY ?></span>
												<input type="text" class="form-control" placeholder="00.00" name="selling_price" value="<?=$product->selling_price ?>" id="selling_price">
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
											<input type="text" name="flat_discount" class="form-control" id="flat" value="<?=$product->flat_discount ?>" placeholder="00.00">&nbsp;
											<div class="row" id="percent">
												<div class="col-lg-7 col-sm-7 col-md-7">
													<div class="input-group">
														<input type="text" class="form-control" placeholder="00.00" name="percent_discount" value="<?=$product->percent_discount ?>" id="percent_discount">
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
											<input type="text" name="barcode1" class="form-control" id="barcode1" value="<?=$product->barcode1 ?>">
										</div>

										<div class="form-group">
											<label>Barcode 2</label>
											<input type="text" name="barcode2" class="form-control" id="barcode2" value="<?=$product->barcode2 ?>">
										</div>

										<div class="form-group">
											<label>Barcode 3</label>
											<input type="text" name="barcode3" class="form-control" id="barcode3" value="<?=$product->barcode3 ?>">
										</div>
					
										<div class="form-group">
											<input type="hidden" name="product_id" value="<?php echo $product->id ?>">
											<button type="submit" class="btn btn-primary">Update</button>
										</div>
									</div> <!-- end of row 6 -->
								</form>


								<div class="col-md-3"></div>
							</div>
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
<script>
	
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
	var status = <?php echo $product->status ?>;
	if(status == 1)
		$('#status').val('1');
	else
		$('#status').val('0');
	
</script>
</html>