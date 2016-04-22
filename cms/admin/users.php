<?php include "includes/admin_header.php" ?>


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

  if (isset($_GET['source'])) {
    $source = $_GET['source'];
  } else {

    $source = '';

  }


if ($_SESSION['role'] !== 'admin') {

  switch($source) {
    case 'add_user';
      include "includes/add_user.php";
      break;

    case 'view_all_users';
      include "includes/view_all_users.php";
      break;

    case 'edit_user';
      include "includes/edit_user.php";
      break;

    default: 


      break;
  }

} else {
  echo "<h1>Users Area for Admins Only</h1>";
}
          ?>


        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->

</div>
<?php include "includes/admin_footer.php"?>
