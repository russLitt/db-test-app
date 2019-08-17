<?php

/**
 * List all users with a link to edit
 */

try {
  require("config.php");
  require("common.php");

  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM users";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch (PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>

<?php require "templates/header.php"; ?>

<div class="container-fluid" id="container-main">
  <div id="content-container">
    <h2 class="mx-auto" style="width: 200px;">Update users</h2>

    <div class="table-responsive update-table">
      <table class="table table-dark table-striped table-borderless table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email Address</th>
            <th>Age</th>
            <th>Location</th>
            <th>Date Created</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($result as $row) : ?>
            <tr>
              <td><?php echo escape($row["id"]); ?></td>
              <td><?php echo escape($row["firstname"]); ?></td>
              <td><?php echo escape($row["lastname"]); ?></td>
              <td><?php echo escape($row["email"]); ?></td>
              <td><?php echo escape($row["age"]); ?></td>
              <td><?php echo escape($row["location"]); ?></td>
              <td><?php echo escape($row["date"]); ?></td>
              <td><a href="update-single.php?id=<?php echo escape($row["id"]); ?>">Edit</a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <br>
  </div>
</div>
<?php require "templates/footer.php"; ?>