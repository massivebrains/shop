<div class="header ">

	<div class="container-fluid relative">

		<div class="pull-left full-height visible-sm visible-xs">

			<div class="header-inner">
				<a href="#" class="btn-link toggle-sidebar visible-sm-inline-block visible-xs-inline-block padding-5" data-toggle="sidebar">
					<span class="icon-set menu-hambuger">
						<i class="fa fa-bars"></i>
					</span>
				</a>
			</div>

		</div>
		<div class="pull-center hidden-md hidden-lg">
			<div class="header-inner">
				<div class="brand inline">
					<img src="<?=base_url() ?>assets/backend/assets/img/logo.png" alt="logo" width="78" height="22">
				</div>
			</div>
		</div>


	</div>

	<div class=" pull-left sm-table hidden-xs hidden-sm">
		<div class="header-inner">
			<div class="brand inline">
				<img src="<?=base_url() ?>assets/backend/assets/img/logo.png" alt="logo" width="78" height="22">
			</div>

			<!-- <ul class="notification-list no-margin hidden-sm hidden-xs b-grey b-l b-r no-style p-l-30 p-r-20">
				<li class="p-r-15 inline">
					<div class="dropdown">

						<a href="admin-message.php" class="search-link" ><i class="fa fa-envelope-o"></i>Text</a> <span class="label label-danger">5</span>

					</div>
				</li>

			</ul> -->

		</div>
	</div>

	<div class=" pull-right">

		<div class="visible-lg visible-md m-t-10">
			<div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
				<span class="semi-bold">Administrator</span> <span class="text-master"></span>
			</div>
			<div class="dropdown pull-right">
				<button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="thumbnail-wrapper d32 circular inline m-t-5">
						<img src="<?php echo base_url() ?>assets/backend/assets/img/profiles/avatar.jpg" alt="" width="32" height="32">
					</span>
				</button>
				<ul class="dropdown-menu profile-dropdown" role="menu">
					<li class="bg-master-lighter">
						<a href="<?=site_url('backend/auth/logout') ?>" class="clearfix">
							<span class="pull-left">Logout</span>
							<span class="pull-right"><i class="pg-power"></i></span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
