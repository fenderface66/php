

<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="post_title">Post Title</label>
    <input name="post_title" class="form-control" type="text">
  </div>
    <div class="form-group">
    <label for="">Categories</label>
    <select name="post_category">
      <?php 

      $query = "SELECT * FROM categories";
      $select_categories = mysqli_query($connection, $query);
      confirm($select_categories);
      while($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id']; 
        $cat_title = $row['cat_title']; 
        
        echo "<option value='$cat_id'>{$cat_title}</option>";
      }
      ?>

    </select>
  </div>
  <div class="form-group">
    <label for="post_author">Post Author</label>
    <input name="post_author" class="form-control" type="text">
  </div>
  <div class="form-group">
    <label for="post_status">Post Status</label>
    <select name="post_status" class="form-control" type="text">
      <option value="Published">Published</option>
      <option value="Draft">Draft</option>
    </select>
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


<!--Add Post-->
<?php add_post(); ?>

