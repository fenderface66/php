<!--Edit Post-->
<?php 

global $connection;
if (isset($_GET['p_id'])) {
  $post_id = $_GET['p_id'];
}

$query = "SELECT * FROM posts WHERE post_id = $post_id";
$select_posts_by_id = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_posts_by_id)) {

  $post_id = $row['post_id']; 
  $post_cat_id = $row['post_category_id']; 
  $post_title = $row['post_title']; 
  $post_author = $row['post_author']; 
  $post_status = $row['post_status'];
  $post_image = $row['post_image']; 
  $post_tags = $row['post_title'];   
  $post_comment_count = $row['post_comment_count']; 
  $post_date = $row['post_date'];   
  $post_content = $row['post_content'];   

}

if (isset($_POST['edit_post'])) {
  $post_title = $_POST['post_title'];
  $post_category = $_POST['post_category'];
  $post_author = $_POST['post_author'];
  $post_status = $_POST['post_status'];

  $post_image = $_FILES['post_image']['name'];
  $post_image_temp = $_FILES['post_image']['tmp_name'];

  $post_tags = $_POST['post_tags'];
  $post_content = $_POST['post_content'];
  $post_date = date('d-m-y');
  $post_comment_count = 4;

  move_uploaded_file($post_image_temp, "../images/$post_image" );
  
  if (empty($post_image)) {
    $query = "SELECT * FROM posts WHERE post_id = $post_id ";
    $select_image = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($select_image)) {
      $post_image = $row['post_image'];
    }
  }
  
  $query = "UPDATE posts SET ";
  $query .= "post_title = '{$post_title}', ";
  $query .= "post_category_id = '{$post_category}', " ;
  $query .= "post_date = now(), ";
  $query .= "post_author = '{$post_author}', ";
  $query .= "post_status = '{$post_status}', ";
  $query .= "post_tags = '{$post_tags}', ";
  $query .= "post_content = '{$post_content}', ";
  $query .= "post_image = '{$post_image}' ";
  $query .= "WHERE post_id = {$post_id} ";
  
  $edit_post_query = mysqli_query($connection, $query);
  confirm($edit_post_query);
  
}

?>

<form action="" method="post" enctype="multipart/form-data">


  <div class="form-group">
    <label for="post_title">Post Title</label>
    <input value="<?php echo $post_title; ?>" name="post_title" class="form-control" type="text">
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
    <input value="<?php echo $post_author; ?>" name="post_author" class="form-control" type="text">
  </div>
  <div class="form-group">
    <label for="post_status">Post Status</label>
    <input value="<?php echo $post_status; ?>" name="post_status" class="form-control" type="text">
  </div>
  <div class="form-group">
    <img width="100" src="../images/<?php echo $post_image ?>"/> 
    <input name="post_image" class="form-control" type="file">
  </div>
    <div class="form-group">
      <label for="post_content">Post Content</label>
      <textarea name="post_content" rows="10" class="form-control" type="text">
        <?php echo $post_content; ?>
      </textarea>
    </div>
    <div class="form-group">
      <label for="post_tags">Post Tags</label>
      <input value="<?php echo $post_tags; ?>" name="post_tags" class="form-control" type="text">
    </div>

    <div class="form-group">
      <input type="submit" class="btn btn-primary" name="edit_post" value="Edit Post">
    </div>
    </form>
