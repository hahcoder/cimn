<?php $this->load->helper('url'); ?>
<div class="left-menu position-fixed bg-dark">
	<ul class="list-inline nav-menu">
		<li class="list-inline-item nav-menu-list">
			<a 	class="text-light text-uppercase danger menu-link" href="#" data-toggle="focus">
				<i class="far fa-file-alt"></i><span>Posts</span>
			</a>
			<div class="popover_content_wrapper" style="display: none">
				<a class="dropdown-item" href="<?php echo base_url(); ?>admin/posts/add">Add new post</a>
				<a class="dropdown-item" href="<?php echo base_url(); ?>admin/posts/manager">Posts manger</a>
				<a class="dropdown-item" href="<?php echo base_url(); ?>admin/posts/config">Configurations</a>
			</div>
		</li>
	</ul>
</div>