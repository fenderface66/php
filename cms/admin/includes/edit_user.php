<!--Edit Post-->
<?php 

global $connection;
if (isset($_GET['u_id'])) {
  $user_id = $_GET['u_id'];
}

$query = "SELECT * FROM users WHERE user_id = $user_id";
$select_users_by_id = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_users_by_id)) {

  $user_id = $row['user_id']; 
  $username = $row['username']; 
  $user_password = $row['user_password']; 
  $user_firstname = $row['user_firstname']; 
  $user_lastname = $row['user_lastname'];
  $user_image = $row['user_image']; 
  $user_email = $row['user_email']; 
  $user_role = $row['user_role']; 

}

if (isset($_POST['edit_user'])) {
  $username = $_POST['username'];
  $user_password = $_POST['user_password'];
  $user_firstname = $_POST['user_firstname'];
  $user_lastname = $_POST['user_lastname'];

  $user_image = $_FILES['user_image']['name'];
  $user_image_temp = $_FILES['user_image']['tmp_name'];

  $user_email = $_POST['user_email'];
  $user_role = $_POST['user_role'];


  move_uploaded_file($user_image_temp, "../images/$user_image" );

  if (empty($user_image)) {
    $query = "SELECT * FROM users WHERE user_id = $user_id ";
    $select_image = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($select_image)) {
      $user_image = $row['user_image'];
    }
  }

  $query = "UPDATE users SET ";
  $query .= "username = '{$username}', ";
  $query .= "user_password = '{$user_password}', " ;
  $query .= "user_firstname = '{$user_firstname}', ";
  $query .= "user_lastname = '{$user_lastname}', ";
  $query .= "user_image = '{$user_image}', ";
  $query .= "user_email = '{$user_email}', ";
  $query .= "user_role = '{$user_role}' ";
  $query .= "WHERE user_id = {$user_id} ";

  $edit_user_query = mysqli_query($connection, $query);
  confirm($edit_user_query);
  header("Location: users.php?source=view_all_users");
}

?>

<form action="" method="post" enctype="multipart/form-data">


  <div class="form-group">
    <label for="username">Username</label>
    <input value="<?php echo $username; ?>" name="username" class="form-control" type="text">
  </div>
  <div class="form-group">
    <label for="user_password">Password</label>
    <input value="<?php echo $user_password; ?>" name="user_password" class="form-control" type="password">
  </div>
  <div class="form-group">
    <label for="user_firstname">First Name</label>
    <input value="<?php echo $user_firstname; ?>" name="user_firstname" class="form-control" type="text">
  </div>
  <div class="form-group">
    <label for="user_firstname">Last Name</label>
    <input value="<?php echo $user_lastname; ?>" name="user_lastname" class="form-control" type="text">
  </div>
  <div class="form-group">
    <img width="100" src="../images/<?php echo $user_image ?>"/> 
    <input name="user_image" class="form-control" type="file">
  </div>
  <div class="form-group">
    <label for="user_email">Email</label>
    <input value="<?php echo $user_email; ?>" name="user_email" class="form-control" type="email">
  </div>
  <div class="form-group">
    <label for="user_role">Role</label>
    <select name="user_role">
      <?php 

      $query = "SELECT * FROM users WHERE user_id = $user_id";
      $select_user = mysqli_query($connection, $query);
      confirm($select_user);
      while($row = mysqli_fetch_assoc($select_user)) {
        $user_role = $row['user_role'];

        if ($user_role == 'Admin') {
          echo "<option value='$user_role'>{$user_role}</option>";
          echo "<option value='Editor'>Editor</option>";
        } else {
          echo "<option value='$user_role'>{$user_role}</option>";
          echo "<option value='Admin'>Admin</option>";
        }

      }
      ?>

    </select>
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="edit_user" value="Edit User">
  </div>
</form>
