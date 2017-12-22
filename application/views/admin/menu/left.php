<?php $this->load->helper('url'); ?>
<div class="left-menu position-fixed">
	<ul class="list-inline nav-menu">
		<li class="list-inline-item nav-menu-list">
			<a class="text-light text-uppercase nav-link" href="#"><i class="fas fa-pencil-alt"></i></i><span>Posts</span></a>
			<div class="card nav-content">
				<div class="card-header text-uppercase">
					posts
				</div>
				<ul class="list-group list-group-flush">
				    <li class="list-group-item">Genaral</li>
				    <li class="list-group-item">
						<a href="<?php echo base_url(); ?>admin/posts/add">Add new post</a>
				    </li>
				    <li class="list-group-item">
						<a href="<?php echo base_url(); ?>admin/posts/manager">Posts manger</a>
				    </li>
				</ul>
			</div>
		</li>
	</ul>
</div>