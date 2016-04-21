<table class="table table-bordered">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Comment</th>
      <th>Email</th>
      <th>Status</th>
      <th>Date</th>
      <th>In Response to</th>
      <th>Approve</th>
      <th>Unapprove</th>
      <th>Delete</th>
    </tr>
  </thead>


  <tbody>
    <!-- Find posts -->
    <?php find_comments(); ?>
    <?php set_approval(); ?>
  </tbody>
</table>