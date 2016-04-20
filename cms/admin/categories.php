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
            <small>Author Name</small>
          </h1>

          <div class="col-xs-6">
            <?php insert_categories(); ?>


            <form action="" method="post">
              <div class="form-group">
                <label for="cat_title">Add Category</label>
                <input class="form-control" name="cat_title" type="text">
              </div>
              <div class="form-group">
                <input class="btn btn-primary" name="submit" type="submit" value="Add Category">
              </div>
            </form>


            <?php 

            if (isset($_GET['edit'])) {
              $cat_id = $_GET['edit'];

              include "includes/edit_categories.php";
            }
            
            ?>

          </div>
          <div class="col-xs-6">

            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Category Title</th>
                </tr>
              </thead>
              <tbody>

                <?php // FIND ALL CATEGORIES QUERY

                find_categories();

                ?>

                <?php //Delete Query

                delete_categories();

                ?>



              </tbody>
            </table>
          </div>

        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->

</div>
<?php include "includes/admin_footer.php"?>
