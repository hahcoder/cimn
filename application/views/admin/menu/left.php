<?php $this->load->helper('url'); ?>
<?php echo $this->router->fetch_class(); ?>
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