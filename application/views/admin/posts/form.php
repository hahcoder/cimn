<?php 
	$this->load->helper('url'); 
	$this->load->model('postsModel');
?>

<?php if(!isset($id)): ?>
	<form method="post" action="<?php echo base_url().'admin/posts/save'; ?>">
		<div class="form-group">
			<label class="col-form-label" for="title">Post Title</label>
			<input name="title" type="text" class="form-control" required value="">
		</div>
		<div class="form-group">
			<label class="col-form-label" for="content">Post Content</label>
			<textarea name="content" type="text" class="form-control ckeditor" rows="10" required></textarea>
		</div>  
		<div class="form-group">
			<label class="col-form-label" for="key_word">Meta Keyword</label>
			<textarea name="keyword" type="text" class="form-control" required></textarea>
		</div> 
		<div class="form-group">
			<label class="col-form-label" for="image">Image (URL)</label>
			<input name="image" type="text" class="form-control">
		</div> 
		<div class="text-right">
			<button class="btn btn-primary" type="submit">Save</button>
		</div>
	</form>
<?php else: ?>
	<?php $post = $this->postsModel->getPost($id);  
		if(count($post) == 1): $post = $post[0]; ?>
			<div class="text-right">
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
					Delete
				</button>

				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Warning...</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body text-left">
							Are you sure delete this post?
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <a class="btn btn-danger" 
				        	href="<?php echo base_url(); ?>admin/posts/delete/<?php echo $post->id ?>" role="button">Delete</a>
				      </div>
				    </div>
				  </div>
				</div>
			</div>
			<form method="post" action="<?php echo base_url().'admin/posts/update/' ?>">
				<div class="form-group">
					<label class="col-form-label" for="title">Post Title</label>
					<input name="title" type="text" class="form-control" required value="<?php echo $post->title ?>">
				</div>
				<div class="form-group">
					<label class="col-form-label" for="content">Post Content</label>
					<textarea name="content" type="text" class="form-control ckeditor" rows="10" required><?php echo $post->content ?></textarea>
				</div>  
				<div class="form-group">
					<label class="col-form-label" for="key_word">Meta Keyword</label>
					<textarea name="keyword" type="text" class="form-control" required><?php echo $post->keyword ?></textarea>
				</div> 
				<div class="form-group">
					<label class="col-form-label" for="image">Image (URL)</label>
					<input name="image" type="text" class="form-control" value="<?php echo $post->image ?>">
				</div> 
				<div class="text-right">
					<button class="btn btn-primary" type="submit">Save</button>
				</div>
			</form>
	<?php else: ?>
			<div class="alert alert-danger" role="alert">
				The post does not exist!
			</div>
	<?php endif; ?>
<?php endif; ?>