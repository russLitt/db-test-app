<?php

/**
 * Delete a user
 */

require("config.php");
require("common.php");

if (isset($_GET["id"])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $id = $_GET["id"];

    $sql = "DELETE FROM users WHERE id = :id";

    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $success = "User successfully deleted.";
  } catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}

try {
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

<div class="container-fluid">

  <h2 class="mx-auto" style="width: 200px;">Delete users</h2>

  <!-- <?php if ($success) echo $success; ?> -->

  <div class="table-responsive">
    <table class="table table-dark table-striped table-borderless table-hover">
      <thead>
        <tr>
          <th></th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email Address</th>
          <th>Age</th>
          <th>Location</th>
          <th>Date</th>
          <th>Delete</th>
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
            <td><?php echo escape($row["date"]); ?> </td>
            <td><a href="delete.php?id=<?php echo escape($row["id"]); ?>">Delete</a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <br />

  <div class="container-fluid mx-auto" style="width: 140px;">
    <a href="index.php">Back to home</a>
  </div>

</div>

<?php require "templates/footer.php"; ?>