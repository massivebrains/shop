<div class="row">
	<div class="col-md-3 col-lg-3 col-xlg-2 ">
		<div class="row">
			<div class="col-md-12 m-b-10">
				<div class="widget-8 panel no-border bg-success no-margin widget-loader-bar">
					<div class="container-xs-height full-height">
						<div class="row-xs-height">
							<div class="col-xs-height col-top">
								<div class="panel-heading top-left top-right">
									<div class="panel-title text-black hint-text">
										<span class="font-montserrat fs-11 all-caps text-white">Total Products
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row-xs-height ">
							<div class="col-xs-height col-top relative">
								<div class="row">
									<div class="col-sm-6">
										<div class="p-l-20">
											<h1 class="no-margin p-b-5 text-white"><?=number_format(table_count(TABLE_PRODUCTS)) ?></h1>
											<p class="small hint-text m-t-5">
											</p>
										</div>
									</div>
									<div class="col-sm-6">
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="row">
			<div class="col-md-12 m-b-10">

				<div class="widget-9 panel no-border bg-primary no-margin widget-loader-bar">
					<div class="container-xs-height full-height">
						<div class="row-xs-height">
							<div class="col-xs-height col-top">
								<div class="panel-heading  top-left top-right">
									<div class="panel-title text-black">
										<span class="font-montserrat fs-11 all-caps text-white">Total Number of Orders
										</span>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="row-xs-height">
							<div class="col-xs-height col-top">
								<div class="p-l-20 p-t-15">
									<h1 class="no-margin p-b-5 text-white"><?=number_format(table_count(TABLE_ORDERS)) ?></h1>
								</a>
							</div>
						</div>
					</div>
					<div class="row-xs-height">
						<div class="col-xs-height col-bottom">
								<!-- <div class="progress progress-small m-b-20">

									<div class="progress-bar progress-bar-white" style="width:45%"></div>

								</div> -->
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="row">
			<div class="col-md-12">

				<div class="widget-10 panel no-border bg-danger no-margin widget-loader-bar">
					<div class="panel-heading top-left top-right ">
						<div class="panel-title text-black hint-text">
							<span class="font-montserrat fs-11 all-caps text-white">Total Value of Orders
							</span>
						</div>
					</div>
					<div class="panel-body p-t-40">
						<div class="row">
							<div class="col-sm-12">
								<h4 class="no-margin p-b-5 text-white semi-bold"><?=currency(table_sum(TABLE_ORDERS, 'order_total')) ?></h4>
								<div class="clearfix"></div>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="col-md-4 col-lg-4 m-b-6">

		<div class="widget-11-2 panel no-border panel-condensed no-margin widget-loader-circle">

			<div class="padding-25">
				<div class="pull-left">
					<h5 class="text-danger no-margin">Activity Log</h5>
					<p class="no-margin">System Date:  <?php echo date('j, F Y'); ?></p>
				</div>

				<div class="clearfix"></div>
			</div>
			<div class="auto-overflow widget-11-2-table">
			<table class="table">
					<?php foreach(get(TABLE_ACTIVITY_LOG, 'id', 'DESC', 30, 0) as $row): ?>
						<tr><td><small><?php echo $row->activity ?> <?php echo $row->created ?></small></td></tr>
					<?php endforeach; ?>
				</table>
			</div>

		</div>

	</div>


	<!-- beginning of second box -->
	<div class="col-md-5 col-lg-5 m-b-6">

		<div class="widget-11-2 panel no-border panel-condensed no-margin widget-loader-circle">

			<div class="padding-25">
				<div class="pull-left">
					<h5 class="text-primary no-margin">Recent Orders</h5>
				</div>
				<h4 class="pull-right semi-bold"><sup>
					<small class="semi-bold">Higest Order So far <?=APP_CURRENCY ?></small>
				</sup> <?=number_format(table_max(TABLE_ORDERS, 'order_total')) ?>
			</h4>
			<div class="clearfix"></div>
		</div>
		<div class="auto-overflow widget-11-2-table">
			<table class="table table-hover">
				<tbody>
					<thead>
						<tr>
							<td>DATE</td>
							<td>CUSTOMER TYPE</td>
							<td>ORDER TOTAL</td>
							<td>ORDER STATUS</td>
						</tr>

					</thead>
					<?php foreach(get(TABLE_ORDERS, 'id', 'DESC', 30, 0) as $row): ?>
						<tr>
							<td><?=$row->date; ?></td>
							<td><?=strtoupper($row->customer_type) ?></td>
							<td><?=APP_CURRENCY.number_format($row->order_total) ?></td>
							<td><?=strtoupper($row->status) ?></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="padding-25">
				<p class="small no-margin">
					<a href="<?=site_url('backend/orders') ?>">
						<i class="fa fs-16 fa-arrow-circle-o-left text-success m-r-10"></i>
						<span class="hint-text ">View all Orders</span>
					</a>
				</p>
			</div>
		</div>

	</div>


</div>
