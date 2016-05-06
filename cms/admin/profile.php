<?php include "includes/admin_header.php"; ?>


<div id="wrapper">

  <?php include "includes/admin_navigation.php" ?>

  <div id="page-wrapper">

    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">
            Welcome to Admin
            <small><?php $_SESSION['username']; ?></small>
          </h1>
          <?php 
          if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $query = "SELECT * FROM users WHERE username = $username";
            $select_users_by_name = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_users_by_name)) {

              $user_id = $row['user_id']; 
              $username = $row['username']; 
              $user_password = $row['user_password']; 
              $user_firstname = $row['user_firstname']; 
              $user_lastname = $row['user_lastname'];
              $user_image = $row['user_image']; 
              $user_email = $row['user_email']; 
              $user_role = $row['user_role']; 

            }
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


        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->

</div>
<?php include "includes/admin_footer.php"?>
