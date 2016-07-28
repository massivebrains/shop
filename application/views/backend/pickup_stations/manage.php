<?php $this->load->view('backend/includes/tables-head') ?>
<body class="fixed-header ">
	<?php $this->load->view('backend/includes/links')  ?>



	<!-- Category Edit modal -->
	<div class="modal fade" id="edit-modal">
		<form role="form" action="<?php echo site_url('backend/pickup_stations/manage') ?>" method="post">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Edit Pickup Station</h4>
					</div>
					<div class="modal-body">

						<div class="form-group">
						<label>Pickup Station Name</label>
							<input type="text" name="name" class="form-control" id="edit_name">
						</div>

						<div class="form-group">
							<label>Full Address</label>
							<textarea name="address" id="edit_address" cols="30" rows="10" class="form-control"></textarea>
						</div>

						<div class="form-group">
							<label>Contact person Name</label>
							<input type="text" name="contact_person" class="form-control" id="edit_contact_person">
						</div>
						<div class="form-group">
							<label>Contact Phone</label>
							<input type="text" name="contact_phone" class="form-control" id="edit_contact_phone">
						</div>

						<input type="hidden" name="pickup_station_id" value="" id="pickup_station_id">
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
								<li><a href="#" class="active">Pickup Stations</a></li>
							</ul>

						</div>
					</div>
				</div>


				<div class="container-fluid container-fixed-lg">
					<?php $this->load->view('backend/includes/alert') ?>

					<div class="panel">

						<ul class="nav nav-tabs nav-tabs-linetriangle" data-init-reponsive-tabs="dropdownfx">
							<li class="active">
								<a data-toggle="tab" href="#branches"><span>Pickup Stations</span></a>
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
											<?php if(!empty($pickup_stations)){ ?>
												<table class="table " id="dataTable">
													<thead>
														<tr>
															<td>NAME</td>
															<td>ADDRESS</td>
															<td>CONTACT PERSON</td>
															<td>CONTACT PHONE</td>
															<td>ACTION</td>
														</tr>

													</thead>
													<tbody>
														<?php foreach($pickup_stations as $row): ?>
														<tr>
															<td id="name-<?=$row->id ?>"><?=$row->name ?></td>
															<td id="address-<?=$row->id ?>"><?=$row->address ?></td>
															<td id="contact_person-<?=$row->id ?>"><?=$row->contact_person ?></td>
															<td id="contact_phone-<?=$row->id ?>"><?=$row->contact_phone ?></td>
															<td>
																<div class="btn-sm  dropdown">
																	<a class="dropdown-toggle" data-toggle="dropdown" href="#"> Actions
																		<span class="caret"></span>&nbsp;
																	</a>
																	<ul class="dropdown-menu">
																		<li>
																			<a onclick="editPickup(<?=$row->id ?>)" href="javascript:;">Edit</a>
																		</li>
																		<li>
																			<a href="<?=site_url('backend/pickup_stations/delete/'.$row->id) ?>"  onclick="return confirm('Are you sure?');">Delete</a>
																		</li>

																	</ul>
																</div>


															</td>
														</tr>
													<?php endforeach; ?>
												</tbody>
											</table>
											<?php }else{ echo '<p class="text-danger">No Avaliable Pickup Station.' ;} ?>
										</div>

									</div>
								</div>
								<!-- Veiw Branches Table end -->
							</div>
							<div class="tab-pane slide-left" id="add">
								<div class="row">
									<div class="col-md-3"></div>
									<div class="col-md-6">

										<form role="form" method="post" action="<?=site_url('backend/pickup_stations/manage') ?>">
											<div class="form-group">
												<label>Full Address</label>
												<textarea name="address" id="" cols="30" rows="10" class="form-control"></textarea>
											</div>

											<div class="form-group">
												<label>Pickup Station Name</label>
												<input type="text" name="name" class="form-control" >
											</div>
											<div class="form-group">
												<label>Contact person Name</label>
												<input type="text" name="contact_person" class="form-control" >
											</div>
											<div class="form-group">
												<label>Contact Phone</label>
												<input type="text" name="contact_phone" class="form-control">
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
	function editPickup(id){
		var name = $('#name-'+id).html();
		var address = $('#address-'+id).html();
		var contact_person = $('#contact_person-'+id).html();
		var contact_phone = $('#contact_phone-'+id).html();
		
		$('#edit_name').val(name);
		$('#edit_address').text(address);
		$('#edit_contact_person').val(contact_person);
		$('#edit_contact_phone').val(contact_phone);
		$('#pickup_station_id').val(id);
		$('#edit-modal').modal();
	}
</script>
</html>
