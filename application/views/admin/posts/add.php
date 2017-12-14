<?php $this->load->helper('url'); ?>

<form method="post" action="<?php echo base_url().'admin/posts/save'; ?>">
	<div class="form-group">
		<label class="col-form-label" for="title">Post Title</label>
		<input name="title" type="text" class="form-control" required value="Post Title">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="content">Post Content</label>
		<textarea name="content" type="text" class="form-control" rows="10" required>abc</textarea>
	</div>  
	<div class="form-group">
		<label class="col-form-label" for="key_word">Meta Keyword</label>
		<textarea name="keyword" type="text" class="form-control" required>abc</textarea>
	</div> 
	<div class="form-group">
		<label class="col-form-label" for="image">Image (URL)</label>
		<input name="image" type="text" class="form-control">
	</div> 
	<div class="text-right">
		<button class="btn btn-primary" type="submit">Save</button>
	</div>
</form>