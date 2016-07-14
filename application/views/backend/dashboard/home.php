<?php $this->load->view('backend/includes/head') ?>
<body class="fixed-header dashboard">
	<?php $this->load->view('backend/includes/links') ?>
	<div class="page-container ">
		<?php $this->load->view('backend/includes/header') ?>
		<div class="page-content-wrapper ">
			<div class="content sm-gutter">
				<div class="container-fluid padding-25 sm-padding-10">
					<?php $this->load->view('backend/dashboard/body') ?>
				</div>
			</div>
			<?php $this->load->view('backend/includes/footer-note') ?>
		</div>
	</div>
	<?php $this->load->view('backend/includes/footer') ?>
</body>
</html>