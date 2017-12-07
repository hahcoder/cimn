<?php $this->load->helper('url'); ?>

<form>
  <div class="form-group">
    <label class="col-form-label" for="title">Post Title</label>
    <input type="text" class="form-control" id="title" required>
  </div>
  <div class="form-group">
    <label class="col-form-label" for="content">Post Content</label>
    <textarea type="text" class="form-control" id="content" required></textarea>
  </div>  
  <div class="form-group">
    <label class="col-form-label" for="image">Image (URL)</label>
    <input type="text" class="form-control" id="image">
  </div> 
  <div class="text-right">
  	<button class="btn btn-primary" type="submit">Save</button>
  </div>
</form>