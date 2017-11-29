<?php $this->load->helper('url'); ?>
<div class="container">
  <div class="panel-group">
    <div class="panel panel-default">
    	<div class="panel-body">
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