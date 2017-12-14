<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$logged = $this->session->userdata('logged');
$this->load->helper('url'); 
 ?>
 <?php 
  ?>
<body>
	<div class="main container">
		<?php // Check Login ?>
		<?php if(!$logged): ?>
			<div class="login-form">
				<?php redirect('/admin'); ?>
			</div>
		<?php else: ?>
			<div class="admin-panel row">
				<?php $this->load->view('admin/menu/left');?>
				<div class="col-12">
					<div class="card">
						<div class="card-header text-uppercase">
							<?php echo $title ?>
						</div>
						<div class="card-body">
							<?php 
								if ($content) {
									$this->load->view($content);
								}
							?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</body>
