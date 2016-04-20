
<!--Add Post-->
<?php add_post(); ?>

<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="post_title">Post Title</label>
    <input name="post_title" class="form-control" type="text">
  </div>
  <div class="form-group">
    <label for="post_cat_id">Post Category ID</label>
    <input name="post_cat_id" class="form-control" type="text">
  </div>
  <div class="form-group">
    <label for="post_author">Post Author</label>
    <input name="post_author" class="form-control" type="text">
  </div>
  <div class="form-group">
    <label for="post_status">Post Status</label>
    <input name="post_status" class="form-control" type="text">
  </div>
  <div class="form-group">
    <label for="post_image">Post Image</label>
    <input name="post_image" class="form-control" type="file">
  </div>
  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea name="post_content" rows="10" class="form-control" type="text"></textarea>
  </div>
  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input name="post_tags" class="form-control" type="text">
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
  </div>
</form>

