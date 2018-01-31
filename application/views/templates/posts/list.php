<?php
// $this->load->helper('url'); 
$ci =&get_instance();
$ci->load->model('postsModel');
$posts = $ci->postsModel->getPosts();
if(count($posts) > 0) : ?>
	<?php foreach ($posts as $post) { ?>
		<div class="post-item row">
			<div class="post-image col-6">
				<img src="<?php echo $post->image ?>" width="100%">
			</div>
			<div class="post-title col-6">
				<h2><?php echo $post->title ?></h2>
			</div>
		</div>
	<?php } ?>
<?php endif; ?>
