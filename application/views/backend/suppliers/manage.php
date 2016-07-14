<?php $this->load->view('backend/includes/tables-head') ?>
<body class="fixed-header ">
	<?php $this->load->view('backend/includes/links')  ?>



	<!-- Supplier Edit modal -->
	<div class="modal fade" id="edit-modal">
		<form role="form" action="<?php echo site_url('backend/suppliers/manage') ?>" method="post">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Edit Supplier</h4>
					</div>
					<div class="modal-body">

						<div class="form-group">
							<label>Supplier Name</label>
							<input type="text" name="name" class="form-control" id="edit-name">
						</div>

						<div class="form-group">
							<label>Supplier Email</label>
							<input type="text" name="email" class="form-control" id="edit-email">
						</div>

						<div class="form-group">
							<label>Supplier Phone</label>
							<input type="text" name="phone" class="form-control" id="edit-phone">
						</div>

						<div class="form-group">
							<label>Supplier Address</label>
							<textarea name="address" class="form-control" id="edit-address"></textarea>
						</div>

						<div class="form-group">
							<label>Status</label>
							<select type="text" name="status" class="form-control" id="edit-status">
								<option value="1">Active</option>
								<option value="0">Inactive</option>
								option
							</select>
						</div>

						<input type="hidden" name="supplier_id" value="" id="supplier_id">				
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	<!-- end of Category edit modal -->


	<div class="page-container ">

		<?php $this->load->view('backend/includes/header') ?>


		<div class="page-content-wrapper ">

			<div class="content ">

				<div class="jumbotron" data-pages="parallax">
					<div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
						<div class="inner">

							<ul class="breadcrumb">
								<li><p>Dashboard</p></li>
								<li><a href="#" class="active">Suppliers</a></li>
							</ul>

						</div>
					</div>
				</div>


				<div class="container-fluid container-fixed-lg">
					<?php $this->load->view('backend/includes/alert') ?>

					<div class="panel">

						<ul class="nav nav-tabs nav-tabs-linetriangle" data-init-reponsive-tabs="dropdownfx">
							<li class="active">
								<a data-toggle="tab" href="#branches"><span>Suppliers</span></a>
							</li>
							<li>
								<a data-toggle="tab" href="#add"><span>Add New</span></a>
							</li>
						</ul>

						<div class="tab-content">
							<div class="tab-pane slide-left active" id="branches">
								<!-- View Branches Table start -->
								<div class="conatiner">
									<div class="row">
										<div class="col-lg-12 col-md-12">
											
											<div class="clearfix"></div>
											<?php if(!empty($suppliers)){ ?>
												<table class="table " id="dataTable">
													<thead>
														<tr>
															<td>NAME</td>
															<td>EMAIL</td>
															<td>PHONE</td>
															<td>ADDRESS</td>
															<td>STATUS</td>
															<td>ACTION</td>
														</tr>

													</thead>
													<tbody>
														<?php foreach($suppliers as $row): ?>
														<tr>
															<td id="name-<?=$row->id ?>"><?=$row->name ?></td>
															<td id="email-<?=$row->id ?>"><?=$row->email ?></td>
															<td id="phone-<?=$row->id ?>"><?=$row->phone ?></td>
															<td id="address-<?=$row->id ?>"><?=$row->address ?></td>
															<td id="status-<?=$row->id ?>"><?=(($row->status == 1)?('Active'):('Inactive')) ?></td>
															<td>
																<div class="btn-sm  dropdown"> 
																	<a class="dropdown-toggle" data-toggle="dropdown" href="#"> Actions 
																		<span class="caret"></span>&nbsp;
																	</a>
																	<ul class="dropdown-menu">
																		<li>
																			<a onclick="edit(<?=$row->id ?>)" href="javascript:;">Edit</a>
																		</li>
																		<li>
																			<a href="<?=site_url('backend/suppliers/delete/'.$row->id) ?>"  onclick="return confirm('Are you sure?');">Delete</a>
																		</li>
																		
																	</ul>
																</div>
															</td>
														</tr>
													<?php endforeach; ?>										
												</tbody>
											</table>
											<?php }else{ echo '<p class="text-danger">No Avaliable Supplier.' ;} ?>
										</div>

									</div>
								</div>
								<!-- Veiw Branches Table end -->
							</div>
							<div class="tab-pane slide-left" id="add">
								<div class="row">
									<div class="col-md-3"></div>
									<div class="col-md-6">

										<form role="form" method="post" action="<?=site_url('backend/suppliers/manage') ?>">
											<div class="form-group">
												<label>Supplier Name</label>
												<input type="text" name="name" class="form-control">
											</div>

											<div class="form-group">
												<label>Supplier Email</label>
												<input type="text" name="email" class="form-control">
											</div>

											<div class="form-group">
												<label>Supplier Phone</label>
												<input type="text" name="phone" class="form-control">
											</div>

											<div class="form-group">
												<label>Supplier Address</label>
												<textarea name="address" class="form-control"></textarea>
											</div>

											<div class="form-group">
												<label>Status</label>
												<select type="text" name="status" class="form-control" required>
													<option value="1">Active</option>
													<option value="0">Inactive</option>
													option
												</select>
											</div>

											<div class="form-group">
												<button type="submit" class="btn btn-primary">Submit</button>
											</div>

										</form>

									</div>
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
	function edit(id){
			var name = $('#name-'+id).html();
			var email = $('#email-'+id).html();
			var phone = $('#phone-'+id).html();
			var address = $('#address-'+id).html();
			var status = $('#status-'+id).html();
			if(status == 'Active')
				$('#edit-status').val('1');
			else
				$('#edit-status').val('0');
			$('#edit-name').val(name);
			$('#edit-phone').val(phone);
			$('#edit-email').val(email);
			$('#edit-address').val(address);
			$('#supplier_id').val(id);
			$('#edit-modal').modal();
		}
	</script>
	</html>