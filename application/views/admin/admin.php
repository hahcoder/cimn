<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$logged = $this->session->userdata('logged');
 ?>
<body>
	<div class="main">
		<?php // Check Login ?>
		<?php if(!$logged): ?>
			<div class="login-form">
				Please login
			</div>
		<?php else: ?>
			<div class="admin-panel">
				Admin panel
			</div>
		<?php endif; ?>
	</div>
</body>
