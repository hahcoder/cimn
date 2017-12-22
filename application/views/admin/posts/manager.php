<?php 
	$this->load->helper('url'); 
	$this->load->model('postsModel');
?>
<?php $posts = $this->postsModel->getPosts(); ?>
<?php if(count($posts) > 0) : ?>
	<table class="table table-striped">
		<thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Title</th>
		      <th scope="col">Image</th>
		      <th scope="col">Date Edited</th>
		      <th scope="col">Date Created</th>
		      <th scope="col">User</th>
		      <th scope="col">Action</th>
		    </tr>
		</thead>
		<tbody>
			<?php foreach ($posts as $post) : ?>
			    <tr>
			      <th scope="row"><?php echo $post->id ?></th>
			      <td width="30%"><?php echo $post->title ?></td>
			      <td><?php echo $post->image ?></td>
			      <td><?php echo $post->date_edit ?></td>
			      <td><?php echo $post->date_create ?></td>
			      <td><?php echo $post->user_name ?></td>
			      <td>
			      		<div class="nav-item dropdown">
						    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Actions</a>
						    <div class="dropdown-menu">
						      <a class="dropdown-item" href="<?php echo base_url(); ?>admin/posts/delete/<?php echo $post->id ?>">Delete</a>
						      <a class="dropdown-item" href="<?php echo base_url(); ?>admin/posts/edit/<?php echo $post->id ?>">Edit</a>
						    </div>
						</div>
			      </td>
			    </tr>
			<?php endforeach ?>
		  </tbody>
	</table>
<?php endif; ?>