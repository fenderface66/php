<?php include "db.php"; ?>
<?php session_start(); ?>

<?php

if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($connection, $_POST['username']);
  $password = mysqli_real_escape_string($connection, $_POST['password']);

  $query = "SELECT * FROM users WHERE username = '{$username}' ";
  $select_user_query = mysqli_query($connection, $query);
  if (!$select_user_query) {
    die("Error " . mysqli_error($connection));
  }

  while ($row = mysqli_fetch_assoc($select_user_query)) {
    $db_user_id = $row['user_id'];
    $db_username = $row['username'];
    $db_password = $row['user_password'];
    $db_user_firstname = $row['user_firstname'];
    $db_user_lastname = $row['user_lastname'];
    $db_user_role = $row['user_role'];
  }
  $password = crypt($password, $db_password);

  if ($username !== $db_username && $password !== $db_password) {

    header("Location: ../index.php?login=failed");
    
  } else if ($username == $db_username && $password == $db_password) {
    $_SESSION['user_id'] = $db_user_id;
    $_SESSION['username'] = $db_username;
    $_SESSION['firstname'] = $db_user_firstname;
    $_SESSION['lastname'] = $db_user_lastname;
    $_SESSION['role'] = $db_user_role;
    header("Location: ../admin/index.php?u_id={$db_user_id}");
    
  } 
}

?>
