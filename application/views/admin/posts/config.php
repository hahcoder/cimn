<?php 
	$this->load->helper('url'); 
	$this->load->model('postsModel');
	$CI =&get_instance();
	$CI->load->model('message');
	$CI->message->getMsg();
?>
<form method="post" action="<?php echo base_url().'admin/posts/config'; ?>">
	<div class="form-group">
      <div class="input-group col-md-3">
        <div class="input-group-prepend">
          <div class="input-group-text">Posts per page</div>
        </div>
        <input name="limit" type="number" class="form-control " value="<?php echo $this->postsModel->getConfig('limit') ?>"> 
        <small class="text-muted">
	      Maximum number of posts per page.
	    </small>
      </div>
    </div>	

    <div class="form-group">
      <div class="input-group col-md-3">
        <div class="input-group-prepend">
          <div class="input-group-text">Link number</div>
        </div>
        <input name="num_link" type="number" class="form-control " value="<?php echo $this->postsModel->getConfig('num_link') ?>"> 
      </div>
      <div class="input-group col">
        <small class="text-muted">
	      Number link of Pagination will be showed.
	    </small>
      </div>
    </div>
	<div class="text-right">
		<button class="btn btn-primary" type="submit">Save</button>
	</div>
</form>
