<?php include 'includes/db.php'?>
<?php include 'includes/header.php'?>
<?php include 'includes/navigation.php'?>

<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">
      <?php 


  if (isset($_GET['p_id'])) {
    $post_id = $_GET['p_id'];
    $query = "SELECT * FROM posts WHERE post_id = $post_id ";
    $select_all_posts_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_all_posts_query)) {
      $post_title = $row['post_title']; 
      $post_author = $row['post_author']; 
      $post_date = $row['post_date']; 
      $post_image = $row['post_image']; 
      $post_content = $row['post_content']; 


      ?>

      <h1 class="page-header">
        Page Heading
        <small>Secondary Text</small>
      </h1>

      <!-- First Blog Post -->
      <h2>
        <a href="#"><?php echo $post_title ?></a>
      </h2>
      <p class="lead">
        by <a href="index.php"><?php echo $post_author ?></a>
      </p>
      <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
      <hr>
      <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
      <hr>
      <p><?php echo $post_content ?></p>
      <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

      <hr>

      <?php }} ?>

      <!-- Blog Comments -->

      <?php 

      if (isset($_POST['create_comment'])) {

        $post_id = $_GET['p_id'];
        $comment_author = $_POST['comment_author'];
        $comment_email = $_POST['comment_email'];
        $comment_content = mysqli_escape_string($connection, $_POST['comment_content']);


        $query = 
          "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
        $query .= 
          "VALUES($post_id, '{$comment_author}','{$comment_email}', '{$comment_content}', 'Unapproved', now()) ";

        $post_comment = mysqli_query($connection, $query);
        header ("Location: includes/post_comment.php?p_id=$post_id");
        if (!$post_comment) {
          die("Error" . mysqli_error($connection));
        }
        
        $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $post_id ";
        $post_comment_count_query = mysqli_query($connection, $query);
        if (!$post_comment_count_query) {
          die("Error" . mysqli_error($connection));
        }
      }
      ?>


      <!-- Comments Form -->
      <div class="well">
        <h4>Leave a Comment:</h4>
        <form action="./post.php?p_id=<?php echo $post_id ?>" method="post" role="form">
          <div class="form-group">
            <label for="comment_author">Author</label>
            <input type="text" class="form-control" name="comment_author">
          </div>
          <div class="form-group">
            <label for="comment_email">Email</label>
            <input type="text" class="form-control" name="comment_email">
          </div>
          <div class="form-group">
            <label for="comment_content">Comment</label> 
            <textarea name="comment_content" class="form-control" rows="3"></textarea>
          </div>
          <button name="create_comment" type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>

      <hr>

      <!-- Posted Comments -->

      <!-- Comment -->
<?php 

  if (isset($_GET['p_id'])) {
    $post_id = $_GET['p_id'];
    $query = "SELECT * FROM comments WHERE comment_post_id = $post_id AND comment_status = 'Approved' ORDER BY comment_id DESC";
    $get_comments = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($get_comments)) {
      $comment_author = $row['comment_author'];
      $comment_content = $row['comment_content'];
      $comment_date = $row['comment_date'];
      $comment_email = $row['comment_email'];


?>

      <div class="media">
        <a class="pull-left" href="#">
          <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
          <h4 class="media-heading"><?php echo $comment_author ?>
            <small><?php echo $comment_date ?></small>
          </h4>
          <h5 class="media-heading"><?php echo $comment_email ?>
          </h5>
          <?php echo $comment_content ?>
        </div>
      </div>
      <?php }
  }?>
    </div>

    <?php include "includes/aside.php" ?>

  </div>
  <!-- /.row -->

  <hr>

  <!-- Footer -->
  <footer>
    <div class="row">
      <div class="col-lg-12">
        <p>Copyright &copy; Your Website 2014</p>
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
  </footer>

</div>
<!-- /.container -->

<?php include 'includes/footer.php'?>
