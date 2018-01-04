

<div class="container header">
	<div class="text-right">
		<div class="user-link text-dark">
			<a 	class="text-dark danger" href="#" data-toggle="focus" data-placement="bottom">
				<i class="fa fa-user" aria-hidden="true"></i>
			</a>
			<div class="popover_content_wrapper" style="display: none">
				<?php if($this->session->userdata('logged')): ?>
					<?php if($this->session->userdata('user')) : ?>
						<a class="nav-item"  href="javascript:;"><i class="fas fa-graduation-cap"></i> <?php echo $this->session->userdata('user') ?></a>
					<?php endif; ?>
					<a class="nav-item" href="<?php echo base_url().'admin/login/logout'; ?>" ><i class="fas fa-sign-out-alt"></i> <span>Log out</span></a>
				<?php endif; ?>
			</div>
			
		</div>
	</div>
</div>