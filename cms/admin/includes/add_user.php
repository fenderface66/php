

<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="username">Username</label>
    <input name="username" class="form-control" type="text">
  </div>
  <div class="form-group">
    <label for="user_password">Password</label>
    <input name="user_password" class="form-control" type="password">
  </div>
  <div class="form-group">
    <label for="user_firstname">First Name</label>
    <input name="user_firstname" class="form-control" type="text">
  </div>
  <div class="form-group">
    <label for="user_lastname">Last Name</label>
    <input name="user_lastname" class="form-control" type="text">
  </div>
  <div class="form-group">
    <label for="user_image">Profile Image</label>
    <input name="user_image" class="form-control" type="file">
  </div>
  <div class="form-group">
    <label for="user_email">Email</label>
      <input name="user_email" class="form-control" type="text">
  </div>
    <div class="form-group">
    <label for="user_role">User Role</label>
    <select name="user_role">
      <option value="Admin">Admin</option>
      <option value="Editor">Editor</option>
    </select>
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_user" value="Publish Post">
  </div>
</form>


<!--Add Post-->
<?php add_user(); ?>

