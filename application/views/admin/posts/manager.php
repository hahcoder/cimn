<?php 
	$this->load->helper('url'); 
	$this->load->model('postsModel');
	$CI =&get_instance();
	$CI->load->model('message');
	$CI->message->getMsg();
?>
<?php $posts = $this->postsModel->getPosts($p); ?>
<div id="data"></div>
<div class="text-right">
	<div class="form-group">
		<a class="btn btn-success" href="<?php echo base_url(); ?>admin/posts/add" role="button"><i class="far fa-plus-square"></i> New post</a>
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
		      <th scope="col" class="text-center">Info</th>
		      <th scope="col">Actions</th>
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
							<img class="rounded" src="<?php echo $post->image ?>" alt="Image" width="30px" 
								data-html="true" 
								data-container="body" 
								data-toggle="popover" 
								data-trigger="hover" 
								data-placement="bottom" 
								data-content="<img src='<?php echo $post->image ?>' width='200px'>"
							>
						<?php else: ?>
							<i class="far fa-image" style="font-size: 20px;"></i>
						<?php endif; ?>
			      </td>
			      <td><?php echo $post->date_edit ?></td>
			      <!-- <td><?php echo $post->date_create ?></td> -->
			      <td class="text-center">
					<a href="javascript:;"
						data-html="true" 
						data-container="body" 
						data-toggle="popover" 
						data-trigger="hover"
						data-placement="bottom" 
						data-content="Created at <i><?php echo $post->date_create ?></i></br>by <b><?php echo $post->user_name ?></b>"
					><i class="fas fa-info-circle"></i></a>
			      	</td>
					<td>
						<a class ="d-inline text-dark" href="<?php echo base_url(); ?>admin/posts/edit/<?php echo $post->id ?>">
							<span data-toggle="tooltip" title="Edit" data-placement="top"><i class="fas fa-pen-square"></i></span></a>
						<a class ="d-inline text-danger" 
							data-toggle="modal" data-target="#deleteModal<?php echo $post->id ?>" href="#">
							<span data-toggle="tooltip" title="Delete" data-placement="top"><i class="fas fa-trash-alt"></i></span></a>
							<!-- Modal -->
							<div class="modal fade" id="deleteModal<?php echo $post->id ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="deleteModalLabel">Warning...</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body text-left">
										Are you sure delete this post?<br>
										<?php echo $post->title ?>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							        <a class="btn btn-danger" 
							        	href="<?php echo base_url(); ?>admin/posts/delete/<?php echo $post->id ?>" role="button">Delete</a>
							      </div>
							    </div>
							  </div>
							</div>
			      		
					</td>
			    </tr>
			<?php endforeach ?>
		  </tbody>
	</table>
<?php endif; ?>
<?php 
	$this->postsModel->pager(base_url().'admin/'.$this->router->fetch_class().'/'.$this->router->fetch_method());
 ?>
