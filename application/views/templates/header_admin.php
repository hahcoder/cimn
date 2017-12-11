<div class="container-fluid bg-dark header">
	<div class="row">
		<div class="col"></div>
		<div class="col text-right">
			<div class="user-link text-light">
				<i class="fa fa-user" aria-hidden="true"></i>
				<?php if($this->session->userdata('logged')): ?>
					<a href="<?php echo base_url().'admin/login/logout'; ?>" class="nav-item text-light">Log out</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
</div>