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
    $post_cat_id = $_POST['post_category'];
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

function add_user() {
  global $connection;

  if (isset($_POST['create_user'])) {
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];

    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];

    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];


    move_uploaded_file($user_image_temp, "../images/$user_image" );


    $query = 
      "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_image, user_email, user_role) ";
    $query .= 
      "VALUES('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_image}','{$user_email}', '{$user_role}' ) ";

    $create_user_query = mysqli_query($connection, $query);

    confirm($create_user_query);
    header("Location: users.php?source=view_all_users");
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
    echo "<td><a href='../post.php?p_id={$post_id}''>View</a></td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete this post?')\" href='posts.php?delete={$post_id}'>Delete</a></td>";
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

//Find all comments
function find_comments() {
  global $connection;

  $query = "SELECT * FROM comments";
  $select_comments = mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($select_comments)) {

    $comment_id = $row['comment_id']; 
    $comment_post_id = $row['comment_post_id']; 
    $comment_email = $row['comment_email']; 
    $comment_author = $row['comment_author']; 
    $comment_status = $row['comment_status'];
    $comment_content = substr($row['comment_content'], 0, 100); 
    $comment_date = $row['comment_date'];   

    echo "<tr>";
    echo "<td>{$comment_id}</td>";
    echo "<td>{$comment_author}</td>";
    echo "<td>{$comment_content}</td>";
    echo "<td>{$comment_email}</td>";
    echo "<td>{$comment_status}</td>";
    echo "<td>{$comment_date}</td>";
    $query = "SELECT * FROM posts WHERE post_id = {$comment_post_id}"; 
    $select_post = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_post)) {
      $post_title = $row['post_title'];
      echo "<td>{$post_title}</td>";
    }
    echo "<td><a href='comments.php?c_id={$comment_id}&approved=1'>Approve</td>";
    echo "<td><a href='comments.php?c_id={$comment_id}&approved=0'>Unapprove</td>";
    echo "<td><a href='comments.php?delete={$comment_id}'>Delete</td>";
    echo "</tr>";  

  }

  if(isset($_GET['delete'])) {
    $comment_id = $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id = {$comment_id} ";

    $delete_query = mysqli_query($connection, $query);
    confirm($delete_query);
    header("Location: comments.php?source=view_all_comments");
  }

}

//Find all Users
function find_users() {
  global $connection;

  $query = "SELECT * FROM users";
  $select_users = mysqli_query($connection, $query);
  confirm($select_users);
  while($row = mysqli_fetch_assoc($select_users)) {

    $user_id = $row['user_id']; 
    $username = $row['username']; 
    $user_password = $row['user_password']; 
    $user_firstname = $row['user_firstname']; 
    $user_lastname = $row['user_lastname'];
    $user_image = $row['user_image']; 
    $user_email = $row['user_email']; 
    $user_role = $row['user_role']; 

    echo "<tr>";
    echo "<td>{$user_id}</td>";
    echo "<td>{$username}</td>";
    echo "<td>{$user_password}</td>";
    echo "<td>{$user_firstname}</td>";
    echo "<td>{$user_lastname}</td>";
    echo "<td><img width='100px' src='../images/$user_image' alt='image'></td>";
    echo "<td>{$user_email}</td>";
    echo "<td>{$user_role}</td>";
    echo "<td><a href='users.php?source=edit_user&u_id={$user_id}'>Edit</td>";
    echo "<td><a href='users.php?source=view_all_users&delete={$user_id}'>Delete</td>";
    echo "</tr>";  

  }

  if(isset($_GET['delete'])) {
    $comment_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = {$user_id} ";

    $delete_query = mysqli_query($connection, $query);
    confirm($delete_query);
    header("Location: users.php?source=view_all_users");
  }

}

function set_approval() {
  global $connection;
  if(isset($_GET['approved'])) {
    $approval = $_GET['approved'];
    $comment_id = $_GET['c_id'];
    if ($approval == 1) {
      $approval = "Approved";
      $query = "UPDATE comments SET comment_status = '$approval' WHERE comment_id = $comment_id";
      $status_query = mysqli_query($connection, $query);
      confirm($status_query);
    } else if ($approval == 0) {
      $disapproval = "Unapproved";
      $query = "UPDATE comments SET comment_status = '$disapproval' WHERE comment_id = $comment_id";
      $status_query = mysqli_query($connection, $query);
      confirm($status_query);
    }

    header("Location: comments.php?source=view_all_comments");
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