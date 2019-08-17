<?php require "templates/header.php"; ?>
<div class="container-fluid" id="container-main">
  <div class="row" id="content-container">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <ul class="mx-auto" style="width: 230px;">
        <li>
          <a href="create.php"><strong>Create</strong></a> - Add a User
        </li>
        <li>
          <a href="read.php"><strong>Read</strong></a> - Find a User
        </li>
        <li>
          <a href="update.php"><strong>Update</strong></a> - Edit a User
        </li>
        <li>
          <a href="delete.php"><strong>Delete</strong></a> - Remove a user
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="container">
  <?php require "templates/footer.php"; ?>
</div>