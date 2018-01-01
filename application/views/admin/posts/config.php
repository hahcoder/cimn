<?php 
	$this->load->helper('url'); 
	$this->load->model('postsModel');
	$CI =&get_instance();
	$CI->load->model('message');
	$CI->message->getMsg();
?>
<form method="post" action="<?php echo base_url().'admin/posts/config'; ?>">
	<div class="form-group">
		<label class="col-form-label" for="title">Post per page</label>
		<input name="title" type="text" class="form-control" value="<?php echo $this->postsModel->getConfig('limit') ?>">
	</div>
	<div class="text-right">
		<button class="btn btn-primary" type="submit">Save</button>
	</div>
</form>
