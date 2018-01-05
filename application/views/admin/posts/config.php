<?php 
	$this->load->helper('url'); 
	$this->load->model('postsModel');
	$CI =&get_instance();
	$CI->load->model('message');
	$CI->message->getMsg();
?>
<form method="post" action="<?php echo base_url().'admin/posts/config'; ?>">
	<div class="form-group">
         <div class="card">
            <div class="card-header text-uppercase">
                Posts
            </div>
            <div class="card-body">
                <div class="input-group col-md-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Posts per page</div>
                    </div>
                    <input  name="limit" type="number" class="form-control " 
                            value ="<?php echo $this->postsModel->getConfig('limit') ?>"
                            aria-describedby="passwordHelpInline"> 
                    <small class="text-muted" id="passwordHelpInline">
                       Maximum number of posts per page.
                    </small>
                </div>

                <div class="input-group col">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Default Thumbnail</div>
                    </div>
                </div>
                <div class="input-group col-sm-3">
                    <div class="custom-file">
                          <input type="file" name="image_default" class="custom-file-input" id="image_default">
                          <label class="custom-file-label" for="image_default">Choose file</label>
                    </div>
                    <?php  $this->load->helper(array('form', 'url')); echo form_open_multipart('upload/do_upload');?>
                </div>
            </div>
        </div>
    </div>	
    <div class="form-group">
        <div class="card">
            <div class="card-header text-uppercase">
                Pagination
            </div>
            <div class="card-body">
                <?php 
                    $list = array(
                        ['name' => 'num_link','type' => 'number', 
                            'title' => 'Link Number',
                            'hint'  => 'Number link of Pagination will be showed.'
                        ],
                        ['name' => 'full_tag_open','type' => 'text'],
                        ['name' => 'full_tag_close','type' => 'text'],
                        ['name' => 'num_tag_open','type' => 'text'],
                        ['name' => 'num_tag_close','type' => 'text'],
                        ['name' => 'cur_tag_open','type' => 'text'],
                        ['name' => 'cur_tag_close','type' => 'text'],
                        ['name' => 'class','type' => 'text'],
                        ['name' => 'next_link','type' => 'text'],
                        ['name' => 'prev_link','type' => 'text'],
                        ['name' => 'first_link','type' => 'text'],
                        ['name' => 'last_link','type' => 'text']
                    );
                    foreach ($list as $field) {
                        switch ($field['type']) {
                            case 'number': ?>
                                <div class="input-group col-md-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <?php 
                                                if (isset($field['title'])) echo $field['title'];
                                                else echo $field['name'];?>
                                        </div>
                                    </div>
                                    <input name="<?php echo $field['name'] ?>" type="number" class="form-control " value="<?php echo $this->postsModel->getConfig($field['name']) ?>"> 
                                </div>
                                <div class="input-group col">
                                    <small class="text-muted"><?php if(isset($field['hint'])) echo $field['hint'] ?></small>
                                </div>
                            <?php 
                                break;

                            default: ?>
                                <div class="input-group col">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><?php 
                                                if (isset($field['title'])) echo $field['title'];
                                                else echo $field['name'];?></div>
                                    </div>
                                    <input name="<?php echo $field['name']; ?>" type="text" class="form-control " value="<?php echo htmlspecialchars($this->postsModel->getConfig($field['name']))  ?>"> 
                                </div>
                                <div class="input-group col">
                                    <small class="text-muted"><?php if(isset($field['hint'])) echo $field['hint'] ?></small>
                                </div>
                            <?php    
                                break;
                        }
                    }
                 ?>

            </div>
        </div>
    </div>
	<div class="text-left col">
		<button class="btn btn-primary" type="submit"><i class="far fa-save"></i> Save</button>
	</div>
</form>
