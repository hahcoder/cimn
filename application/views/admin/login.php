<?php $this->load->helper('url'); ?>
<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-4">
    	<div class="card">
			<div class="card-header text-uppercase">
				admin login
			</div>
			<div class="card-body">
		  		<form action="<?php echo base_url(); ?>admin/login">
				  <div class="form-group">
				    <label for="username">Username</label>
				    <input type="text" class="form-control" id="username" name="u">
				  </div>
				  <div class="form-group">
				    <label for="password">Password</label>
				    <input type="password" class="form-control" id="password" name="p">
				  </div>
				  <button type="submit" class="btn btn-primary">Login</button>
				</form>
			</div>
    	</div>
    </div>
  </div>
</div>