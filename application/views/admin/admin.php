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
				Please login
			</div>
		<?php else: ?>
			<div class="admin-panel row">
				<div class="col-3">
					<?php 
						$this->load->view('admin/menu/left');
					 ?>
				</div>
				<div class="col-9">
					content
				</div>
			</div>
		<?php endif; ?>
	</div>
</body>
