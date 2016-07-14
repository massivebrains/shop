<?php $this->load->view('backend/includes/tables-head') ?>
<body class="fixed-header ">
	<?php $this->load->view('backend/includes/links')  ?>




	<div class="page-container ">

		<?php $this->load->view('backend/includes/header') ?>


		<div class="page-content-wrapper ">

			<div class="content ">

				<div class="jumbotron" data-pages="parallax">
					<div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
						<div class="inner">

							<ul class="breadcrumb">
								<li><p>Dashboard</p></li>
								<li><a href="#" class="active">Orders</a></li>
							</ul>

						</div>
					</div>
				</div>


				<div class="container-fluid container-fixed-lg">
					<?php $this->load->view('backend/includes/alert') ?>

					<div class="panel">

						<ul class="nav nav-tabs nav-tabs-linetriangle" data-init-reponsive-tabs="dropdownfx">
							<li class="active">
								<a data-toggle="tab" href="#branches"><span>Orders</span></a>
							</li>

						</ul>

						<div class="tab-content">
							<div class="tab-pane slide-left active" id="branches">
								<!-- View Branches Table start -->
								<div class="conatiner">
									<div class="row">
										<div class="col-lg-12 col-md-12">

											<div class="clearfix"></div>
												<table class="table " id="ordersDataTable">
													<thead>
														<tr>
                              <td>DATE</td>
                              <td>ORDER NUMBER</td>
  														<td>CUSTOMER NAME</td>
  														<td>DELIVERY OPTION</td>
  														<td>DELIVERY ADDRESS</td>
  														<td>ORDER STATUS</td>
  														<td>ORDER TOTAL</td>
  														<td>DELIVERY STATUS</td>
  														<td>ACTION</td>
														</tr>
													</thead>


											</table>
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
	var url = "<?php echo site_url('backend/orders/data') ?>";
	$('#ordersDataTable').DataTable( {
		"ajax":{
			"url": url,
		}
	});
});
</script>
</html>
