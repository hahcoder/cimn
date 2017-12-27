<?php 
	$this->load->helper('url'); 
	$this->load->model('postsModel');
	$CI =&get_instance();
	$CI->load->model('message');
	$CI->message->getMsg();
?>
<?php $posts = $this->postsModel->getPosts(); ?>
<div id="data"></div>
<div class="text-right">
	<div class="form-group">
		<a class="btn btn-success" href="<?php echo base_url(); ?>admin/posts/add"" role="button">Add new post</a>
	</div>
</div>
<?php if(count($posts) > 0) : ?>
	<table class="table table-hover">
		<thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Title</th>
		      <th scope="col">Thumbnail</th>
		      <th scope="col">Last edited</th>
		      <th scope="col">Date created</th>
		      <th scope="col">User</th>
		      <th scope="col">Action</th>
		    </tr>
		</thead>
		<tbody>
			<?php foreach ($posts as $post) : ?>
			    <tr>
			      <th scope="row"><?php echo $post->id ?></th>
			      <td width="30%"><a href="<?php echo base_url(); ?>admin/posts/edit/<?php echo $post->id ?>"><?php echo $post->title ?></a>
			      	</td>
			      <td>
						<?php if($post->image): ?>
							<img class="rounded" src="<?php echo $post->image ?>" alt="Image" width="30px" data-container="body" data-toggle="popover" data-placement="bottom" >
							<!-- <img src="<?php echo $post->image ?>" width="100px"> -->

							<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header">abc</h3><div class="popover-body">adef</div></div>
						<?php endif; ?>
			      </td>
			      <td><?php echo $post->date_edit ?></td>
			      <td><?php echo $post->date_create ?></td>
			      <td><?php echo $post->user_name ?></td>
			      <td>
			      		<div class="dropdown">
						    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Actions</a>
						    <div class="dropdown-menu">
						      <a class="dropdown-item" data-toggle="modal" data-target="#deleteModal" href="#">Delete</a>
						      <a class="dropdown-item" href="<?php echo base_url(); ?>admin/posts/edit/<?php echo $post->id ?>">Edit</a>
						    </div>
						</div>
			      </td>
			    </tr>
			<?php endforeach ?>
		  </tbody>
	</table>
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
<?php endif; ?>