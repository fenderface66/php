<?php 

function confirm($result) {

  global $connection;

  if (!$result) {

    die("Query error <br/>" . mysqli_error($connection));

  }

}

function add_post() {
  global $connection;

  if (isset($_POST['create_post'])) {
    $post_title = $_POST['post_title'];
    $post_cat_id = $_POST['post_cat_id'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    $post_comment_count = 4;


    move_uploaded_file($post_image_temp, "../images/$post_image" );


    $query = 
      "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";
    $query .= 
      "VALUES({$post_cat_id},'{$post_title}','{$post_author}',now() ,'{$post_image}','{$post_content}','{$post_tags}', '{$post_comment_count}','{$post_status}' ) ";

    $create_post_query = mysqli_query($connection, $query);

    confirm($create_post_query);
  }
}


//Add category query
function insert_categories() {

  global $connection;

  if(isset($_POST['submit'])) {
    $cat_title = $_POST['cat_title'];
    if ($cat_title == "" || empty($cat_title)) {
      echo "<h1>This field should not be empty</h1>";
    } else {
      $query = "INSERT INTO categories(cat_title) ";
      $query .= "VALUE('{$cat_title}') ";

      $create_category_query = mysqli_query($connection, $query);

      if (!$create_category_query ) {
        die('QUERY FAILED' . mysqli_error($connection));
      }
    }

  }
}

function find_categories() {

  global $connection;

  $query = "SELECT * FROM categories";
  $select_categories = mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($select_categories)) {
    $cat_id = $row['cat_id']; 
    $cat_title = $row['cat_title']; 
    echo "<tr>";
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
    echo "<td><a href='categories.php?delete={$cat_id}''>Delete</a></td>";
    echo "<td><a href='categories.php?edit={$cat_id}''>Edit</a></td>";
    echo "</tr>";
  }
}


function find_posts() {
  global $connection;

  $query = "SELECT * FROM posts";
  $select_posts = mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($select_posts)) {

    $post_id = $row['post_id']; 
    $post_cat_id = $row['post_category_id']; 
    $post_title = $row['post_title']; 
    $post_author = $row['post_author']; 
    $post_status = $row['post_status'];
    $post_image = $row['post_image']; 
    $post_tags = $row['post_title'];   
    $post_comment_count = $row['post_comment_count']; 
    $post_date = $row['post_date'];   

    echo "<tr>";
    echo "<td>{$post_id}</td>";
    
    $query = "SELECT * FROM categories WHERE cat_id = $post_cat_id ";
    $select_categories_id = mysqli_query($connection, $query);
    confirm($select_categories_id);
    while($row = mysqli_fetch_assoc($select_categories_id)) {
      $cat_id = $row['cat_id'];
      $cat_title = $row['cat_title'];
      
      echo "<td>{$cat_title}</td>";
    }
    
    
    
    
    echo "<td>{$post_title}</td>";
    echo "<td>{$post_author}</td>";
    echo "<td>{$post_status}</td>";
    echo "<td><img width='100px' src='../images/$post_image' alt='image'></td>";
    echo "<td>{$post_tags}</td>";
    echo "<td>{$post_comment_count}</td>";
    echo "<td>{$post_date}</td>";
    echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
    echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
    echo "</tr>";  

  }

  if(isset($_GET['delete'])) {
    $the_post_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";

    $delete_query = mysqli_query($connection, $query);
    confirm($delete_query);
    header("Location: posts.php?source=view_all_posts");
  }
}

//Edit posts

function edit_post() {

  global $connection;
  if (isset($_GET['p_id'])) {
    $post_id = $_GET['p_id'];
  }

  $query = "SELECT * FROM posts";
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

}





function delete_categories() {

  global $connection;

  if (isset($_GET['delete'])) {
    $the_cat_id = $_GET['delete'];
    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";

    $delete_query = mysqli_query($connection, $query);
    confirm($delete_query);
    header("Location: categories.php");
  }

}




?>