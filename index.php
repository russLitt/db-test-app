<?php require "templates/header.php"; ?>
<div class="container-fluid" id="container-main">
  <div class="row justify-content-md-center" id="content-container">
    <div class="col-md-auto">
      <ul id="all-categories">
        <li class="individual-categories">
          <a href="create.php"><strong>Create</strong></a> - Add a User
        </li>
        <li class="individual-categories">
          <a href="read.php"><strong>Read</strong></a> - Find a User
        </li>
        <li class="individual-categories">
          <a href="update.php"><strong>Update</strong></a> - Edit a User
        </li>
        <li class="individual-categories">
          <a href="delete.php"><strong>Delete</strong></a> - Remove a user
        </li>
      </ul>
    </div>
  </div>
</div>
  <?php require "templates/footer.php"; ?>