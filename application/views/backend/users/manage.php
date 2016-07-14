<?php $this->load->view('backend/includes/tables-head') ?>
<body class="fixed-header ">
	<?php $this->load->view('backend/includes/links') ?>


	<!-- Department Edit modal -->
	<div class="modal fade" id="department-edit-modal">
		<form role="form" action="<?php echo site_url('backend/users/department') ?>" method="post">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Edit Department</h4>
					</div>
					<div class="modal-body">

						<div class="form-group">
							<label>Department Name</label>
							<input type="text" name="name" class="form-control" id="dept_edit_name">
						</div>


						<div class="form-group">
							<label>Status</label>
							<select type="text" name="status" class="form-control" id="dept_edit_status">
								<option value="1">Active</option>
								<option value="0">Inactive</option>
								option
							</select>
						</div>

						<input type="hidden" name="department_id" value="" id="department_id">				
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	<!-- end of department edit modal -->

	<!-- Admin edit modal -->
	<div class="modal fade" id="admin-edit-modal">
		<form role="form" action="<?php echo site_url('backend/users/manage') ?>" method="post">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Edit Admin</h4>
					</div>
					<div class="modal-body">

						<div class="form-group">
							<label>Full Name</label>
							<input type="text" name="fullname" class="form-control" id="edit-fullname">
						</div>

						<div class="form-group">
							<label>Email Address</label>
							<input type="email" name="email" class="form-control" id="edit-email">
						</div>

						<div class="form-group">
							<label>Phone</label>
							<input type="text" name="phone" class="form-control" id="edit-phone">
						</div>

						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" >
						</div>

						<div class="form-group">
							<label>Retype Password</label>
							<input type="password" name="retype_password" class="form-control">
						</div>


						<div class="form-group">
							<?=build_select(TABLE_DEPARTMENTS, '', 'dept_id', 'Department', 'id', 'name')  ?>
						</div>


						<div class="form-group">
							<label>Role</label>
							<input type="text" name="role" class="form-control" id="edit-role">
						</div>

						<div class="form-group">
							<label>Status</label>
							<select type="text" name="status" class="form-control" id="edit-adminstatus">
								<option value="1">Active</option>
								<option value="0">Inactive</option>
								option
							</select>
						</div>
						<input type="hidden" name="admin_id" value="" id="admin_id">

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-primary" value="Save Changes">
					</div>
				</div>
			</div>
		</form>
	</div>
	<!-- end of admin edit modal -->




	<div class="page-container">

		<?php $this->load->view('backend/includes/header') ?>

		<div class="page-content-wrapper ">

			<div class="content ">

				<div class="jumbotron" data-pages="parallax">
					<div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
						<div class="inner">

							<ul class="breadcrumb">
								<li><p>Dashboard</p></li>
								<li><a href="#" class="active">Administrators</a></li>
							</ul>

						</div>
					</div>
				</div>

				
				<div class="container-fluid container-fixed-lg">
					<?php $this->load->view('backend/includes/alert') ?>


					<div class="panel">

						<ul class="nav nav-tabs nav-tabs-linetriangle" data-init-reponsive-tabs="dropdownfx">
							<li class="active">
								<a data-toggle="tab" href="#users"><span>Admins</span></a>
							</li>
							<li>
								<a data-toggle="tab" href="#add"><span>Add New</span></a>
							</li>
							<li>
								<a data-toggle="tab" href="#dept"><span>Departments</span></a>
							</li>
						</ul>

						<div class="tab-content">
							<div class="tab-pane slide-left active" id="users">
								<!-- View Branches Table start -->
								<div class="conatiner">
									<div class="row">
										<div class="col-lg-12 col-md-12">
											
											<div class="clearfix"></div>
											<?php if(!empty($admins)){ ?>
												<table class="table " id="dataTable">
													<thead>
														<tr>
															<td>NAME</td>
															<td>EMAIL</td>
															<td>PHONE</td>
															<td>DEPARTMENT</td>
															<td>ROLE</td>
															<td>DATE CREATED</td>
															<td>STATUS</td>
															<td>ACTION</td>
														</tr>

													</thead>
													<tbody>
														<?php foreach($admins as $row): ?>
														<tr>
															<td id="fullname-<?=$row->id ?>"><?=$row->fullname; ?></td>
															<td>
																<a href="mailto:<?=$row->email; ?>" id="email-<?=$row->id ?>"><?=$row->email; ?></a>
															</td>
															<td id="phone-<?=$row->id ?>"><?=$row->phone; ?></td>
															<td><?=get_cell(TABLE_DEPARTMENTS, array('id'=>$row->dept_id), 'name') ?><input type="hidden" id="deptid-<?=$row->id ?>" value="<?=$row->dept_id ?>"></td>
															<td id="role-<?=$row->id ?>"><?=$row->role ?></td>
															<td><?=$row->created ?></td>
															<td id="adminstatus-<?=$row->id ?>"><?=(($row->status == 1)?('Active'):('Inactive')) ?></td>
															<td><a onclick="editAdmin(<?php echo $row->id ?>)" href="javascript:;">Edit</a>~</span> 
																<a href="<?=site_url('backend/users/delete/admin/'.$row->id) ?>"  onclick="return confirm('Are you sure?');">Delete</a></td>
															</tr>
														<?php endforeach ?>
													</tbody>
												</table>
												<?php }else{ ?>
													<p class="text-danger">No Admins Created Yet.</p>
													<?php } ?>
												</div>

											</div>
										</div>
										<!-- Veiw Branches Table end -->
									</div>
									<div class="tab-pane slide-left" id="add">
										<div class="row">
											<div class="col-md-3"></div>
											<div class="col-md-6">

												<form role="form" action="<?php echo site_url('backend/users/manage') ?>" method="post">
													<div class="form-group">
														<label>Full Name</label>
														<input type="text" name="fullname" class="form-control">
													</div>

													<div class="form-group">
														<label>Email Address</label>
														<input type="email" name="email" class="form-control">
													</div>

													<div class="form-group">
														<label>Phone</label>
														<input type="text" name="phone" class="form-control">
													</div>

													<div class="form-group">
														<label>Password</label>
														<input type="password" name="password" class="form-control">
													</div>

													<div class="form-group">
														<label>Retype Password</label>
														<input type="password" name="retype_password" class="form-control">
													</div>


													<div class="form-group">
														<?=build_select(TABLE_DEPARTMENTS, '', 'dept_id', 'Department', 'id', 'name')  ?>
													</div>

													<div class="form-group">
														<label>Role</label>
														<input type="text" name="role" class="form-control">
													</div>

													<div class="form-group">
														<label>Status</label>
														<select type="text" name="status" class="form-control">
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

									<div class="tab-pane slide-left" id="dept">
										<div class="row">
											<div class="col-md-6">

												<form role="form" action="<?php echo site_url('backend/users/department') ?>" method="post">
													<div class="form-group">
														<label>Department Name</label>
														<input type="text" name="name" class="form-control" value="<?php set_value('name') ?>">
													</div>


													<div class="form-group">
														<label>Status</label>
														<select type="text" name="status" class="form-control">
															<option value="1">Active</option>
															<option value="0">Inactive</option>
															option
														</select>
													</div>

													<div class="form-group">
														<button type="submit" class="btn btn-default">Submit</button>
													</div>

												</form>

											</div>

											<div class="col-md-6">
												<?php if(empty($departments)): ?>
													<p class="text-success">No Departments Created yet.</p>
												<?php endif; ?>
												<table class="table">
													<thead>
														<tr>
															<td>NAME</td>
															<td>STATUS</td>
															<td>ACTIONS</td>
														</tr>

													</thead>
													<tbody>
														<?php foreach($departments as $row): ?>
															<tr>
																<td id="deptname-<?=$row->id ?>"><?=$row->name; ?></td>
																<td id="deptstatus-<?=$row->id ?>"><?=(($row->status == 1)?('Active'):('Inactive')) ?></td>

																<td>
																	<a onclick="editDepartment(<?php echo $row->id ?>)" href="javascript:;">Edit</a> <span class="text-danger">~</span> <a href="<?=site_url('backend/users/delete/department/'.$row->id) ?>" onclick="return confirm('Are you sure?');">Delete</a> <span class="text-danger">~</span> <a href="#">Permissions</a>
																</td>
															</tr>
														<?php endforeach; ?>										
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>

					</div>


					<?php $this->load->view('backend/includes/footer-note') ?>

				</div>

			</div>

			<?php $this->load->view('backend/includes/tables-footer') ?>
		</body>
		<script>
			function editDepartment(id){
				var dept_name = $('#deptname-'+id).html();
				var dept_status = $('#deptstatus-'+id).html();
				if(dept_status == 'Active')
					$('#dept_edit_status').val('1');
				else
					$('#dept_edit_status').val('0');
				$('#dept_edit_name').val(dept_name);
				$('#department_id').val(id);
				$('#department-edit-modal').modal();
			}

			function editAdmin(id) {
				var fullname = $('#fullname-'+id).html();
				var email = $('#email-'+id).html();
				var phone = $('#phone-'+id).html();
				var role = $('#role-'+id).html();
				var deptid = $('#deptid-'+id).val();
				$('#dept_id').val(deptid);
				var adminstatus = $('#adminstatus-'+id).html();
				if(adminstatus == 'Active')
					$('#edit-adminstatus').val('1');
				else
					$('#edit-adminstatus').val('0');
				$('#edit-fullname').val(fullname);
				$('#edit-email').val(email);
				$('#edit-phone').val(phone);
				$('#edit-role').val(role);
				$('#admin_id').val(id);
				$('#admin-edit-modal').modal();
			}
		</script>
		</html>
