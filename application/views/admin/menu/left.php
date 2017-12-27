<?php $this->load->helper('url'); ?>
<div class="left-menu position-fixed">
	<ul class="list-inline nav-menu">
		<li class="list-inline-item nav-menu-list">
			<a 	class="text-light text-uppercase danger" href="#" data-toggle="focus">
				<i class="far fa-edit"></i><span>Posts</span>
			</a>
			<div id="popover_content_wrapper" style="display: none">
				<a class="dropdown-item" href="#">Genaral</a>
				<a class="dropdown-item" href="<?php echo base_url(); ?>admin/posts/add">Add new post</a>
				<a class="dropdown-item" href="<?php echo base_url(); ?>admin/posts/manager">Posts manger</a>
			</div>
		</li>
	</ul>
</div>