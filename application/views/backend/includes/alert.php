<?php if(validation_errors()): ?>
<div class="alert alert-danger">
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>

<?php if($this->session->userdata('success')): ?>
<div class="alert alert-success">
	<?php echo $this->session->userdata('success'); ?>
</div>
<?php endif; ?>

<?php if($this->session->userdata('error')): ?>
<div class="alert alert-danger">
	<?php echo $this->session->userdata('error'); ?>
</div>
<?php endif; ?>

<?php $this->session->unset_userdata('success') ?>
<?php $this->session->unset_userdata('error') ?>
