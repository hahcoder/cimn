<div class="container header">
	<div class="col-12">
		<div class="col"></div>
		<div class="col text-right">
			<div class="user-link text-dark">
				<i class="fa fa-user" aria-hidden="true"></i>
				<?php if($this->session->userdata('logged')): ?>
					<?php if($this->session->userdata('user')) : ?>
						<a href="#"><?php echo $this->session->userdata('user') ?></a>
					<?php endif; ?>
					<a href="<?php echo base_url().'admin/login/logout'; ?>" class="nav-item">Log out</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>