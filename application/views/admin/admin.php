<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$logged = $this->session->userdata('logged');
$this->load->helper('url'); 
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
				<div class="col-4">
					<div class="card">
						<div class="card-header">
							POST
						</div>
						<ul class="list-group list-group-flush">
						    <li class="list-group-item">
								<a href="<?php echo base_url(); ?>/admin/posts/add">Add new post</a>
						    </li>
						    <li class="list-group-item">Post manager</li>
						    <li class="list-group-item">Catalog</li>
						</ul>
					</div>
				</div>
				<div class="col-8">
					content
				</div>
			</div>
		<?php endif; ?>
	</div>
</body>
