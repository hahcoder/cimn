<?php 
	$this->load->helper('url'); 
	$this->load->model('postsModel');
	$CI =&get_instance();
	$CI->load->model('message');
	$CI->message->getMsg();
?>
<?php if(!isset($id)): ?>
	<form method="post" action="<?php echo base_url().'admin/posts/save'; ?>">
		<div class="form-group">
			<label class="col-form-label" for="title">Post Title</label>
			<input name="title" type="text" class="form-control" required value="">
		</div>
		<div class="form-group">
			<label class="col-form-label" for="content">Post Content</label>
			<textarea name="content" type="text" class="form-control ckeditor" rows="10" ></textarea>
		</div>  
		<div class="form-group">
			<label class="col-form-label" for="key_word">Meta Keyword</label>
			<textarea name="keyword" type="text" class="form-control"></textarea>
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
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
					Delete
				</button>
				<!-- Modal -->
				<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="deleteModalLabel">Warning...</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body text-left">
							Are you sure delete this post?
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				        <a class="btn btn-danger" 
				        	href="<?php echo base_url(); ?>admin/posts/delete/<?php echo $post->id ?>" role="button">Delete</a>
				      </div>
				    </div>
				  </div>
				</div>
			</div>
			<form method="post" action="<?php echo base_url().'admin/posts/update/'.$post->id ?>">
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
					<textarea name="keyword" type="text" class="form-control"><?php echo $post->keyword ?></textarea>
				</div> 
				<div class="form-group">
					<label class="col-form-label" for="image">Thumbnail (URL)</label>
					<input name="image" type="text" class="form-control" value="<?php echo $post->image ?>">
				</div> 
				<?php if($post->image): ?>
					<div class="form-group">
						<img class="rounded" src="<?php echo $post->image ?>" alt="Image" width="100px">
					</div>
				<?php endif; ?>
				<div class="text-right">
					<button class="btn btn-primary" type="submit">Save</button>
				</div>
			</form>
	<?php endif; ?>
<?php endif; ?>