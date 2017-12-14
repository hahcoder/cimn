<?php $this->load->helper('url'); ?>
<div class="left-menu position-fixed">
	<ul class="list-inline">
		<li class="list-inline-item">
			<a class="text-light text-uppercase link-item" href="#"><i class="fas fa-pencil-alt"></i></i><span>Posts</span></a>
			<div class="card">
				<div class="card-header text-uppercase">
					posts
				</div>
				<ul class="list-group list-group-flush">
				    <li class="list-group-item">Configuration</li>
				    <li class="list-group-item">
						<a href="<?php echo base_url(); ?>admin/posts/add">Add new post</a>
				    </li>
				    <li class="list-group-item">Post manager</li>
				</ul>
			</div>
		</li>
	</ul>
</div>