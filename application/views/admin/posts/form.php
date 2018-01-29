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
			<div class="input-group mb-3">
				<div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-image"></i> Thumbnail</div>
                </div>
				<input name="image" type="text" class="form-control" placeholder="http://abc.com/example.jpg" required>
			</div>
		</div>
		<div class="form-group">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-map-marker-alt"></i> Address</div>
                </div>
				<input type ="text" class="form-control" aria-label="address" aria-describedby="basic-addon1" name="address">
			</div>
		</div> 
		<div class="form-group">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
                    <div class="input-group-text"><i class="fab fa-facebook"></i> Facebook</div>
                </div>
				<input name="facebook" type="text" class="form-control" aria-describedby="facebook" placeholder="https://facebook.com/abc">
			</div>
		</div>
		<div class="form-group">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-phone-square"></i> Phone</div>
                </div>
				<input name="phone" type="text" class="form-control" aria-describedby="phone">
			</div>
		</div>
		<div class="form-group">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
                    <div class="input-group-text"><i class="fab fa-youtube"></i> Video</div>
                </div>
				<input name="video" type="text" class="form-control" aria-describedby="video">
			</div>
		</div>
		<div class="text-right">
			<button class="btn btn-primary" type="submit"><i class="far fa-save"></i> Save</button>
		</div>
	</form>
<?php else: ?>
	<?php $post = $this->postsModel->getPost($id);  
		if(count($post) == 1): $post = $post[0]; ?>
			<div class="text-right">
				<a class="btn btn-secondary" href="<?php echo base_url(); ?>admin/posts/manager" role="button"><i class="fas fa-th-large"></i> Manager</a>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
					<i class="far fa-trash-alt"></i> Delete
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
					<div class="input-group mb-3">
						<div class="input-group-prepend">
	                        <div class="input-group-text"><i class="fas fa-image"></i> Thumbnail</div>
	                    </div>
						<input name="image" type="text" class="form-control" value="<?php echo $post->image ?>" required>
					</div>
				</div>
				<?php if($post->image): ?>
					<div class="form-group">
						<img class="rounded" src="<?php echo $post->image ?>" alt="Image" width="100px">
					</div>
				<?php endif; ?>
				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
	                        <div class="input-group-text"><i class="fas fa-map-marker-alt"></i> Address</div>
	                    </div>
						<input type ="text" class="form-control" aria-label="address" aria-describedby="basic-addon1" name="address" value="<?php echo $post->address ?>">
					</div>
				</div> 
				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
	                        <div class="input-group-text"><i class="fab fa-facebook"></i> Facebook</div>
	                    </div>
						<input name="facebook" type="text" class="form-control" value="<?php echo $post->facebook ?>" aria-describedby="facebook">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
	                        <div class="input-group-text"><i class="fas fa-phone-square"></i> Phone</div>
	                    </div>
						<input name="phone" type="text" class="form-control" value="<?php echo $post->phone ?>" aria-describedby="phone">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
	                        <div class="input-group-text"><i class="fab fa-youtube"></i> Video</div>
	                    </div>
						<input name="video" type="text" class="form-control" value="<?php echo $post->video ?>" aria-describedby="video">
					</div>
				</div>
				<div class="text-right">
					<button class="btn btn-primary" type="submit"><i class="far fa-save"></i> Save</button>
				</div>
			</form>
	<?php endif; ?>
<?php endif; ?>