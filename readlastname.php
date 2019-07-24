
<?php

/**
  * Function to query information based on
  * a parameter: in this case, lastname.
  *
  */

if (isset($_POST['submit'])) {
  try {
    require ("config.php");
    require ("common.php");

    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT * FROM users WHERE lastname = :lastname";

    $lastname = $_POST['lastname'];

    $statement = $connection->prepare($sql);
    $statement->bindParam(':lastname', $lastname, PDO::PARAM_STR);
    $statement->execute();

    $result = $statement->fetchAll();
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}
?>

<?php require "templates/header.php"; ?>

<div class="container-fluid">

<?php
if (isset($_POST['submit'])) {
  if ($result && $statement->rowCount() > 0) { ?>
    <h2>Results</h2>

<div class="table-responsive">
    <table class="table table-dark table-striped table-borderless table-hover">
      <thead>
<tr>
  <th>ID</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Email Address</th>
  <th>Age</th>
  <th>lastname</th>
  <th>Date</th>
</tr>
      </thead>
      <tbody>
  <?php foreach ($result as $row) { ?>
      <tr>
<td><?php echo escape($row["id"]); ?></td>
<td><?php echo escape($row["firstname"]); ?></td>
<td><?php echo escape($row["lastname"]); ?></td>
<td><?php echo escape($row["email"]); ?></td>
<td><?php echo escape($row["age"]); ?></td>
<td><?php echo escape($row["location"]); ?></td>
<td><?php echo escape($row["date"]); ?> </td>
      </tr>
    <?php } ?>
      </tbody>
  </table>
  </div>
  <?php } else { ?>
    > No results found for the last name <?php echo escape($_POST['lastname']); ?>.
  <?php }
} ?>

<h2>Find user based on last name</h2>

<form method="post">
  <label for="lastname">Last Name</label>
  <input type="text" id="lastname" name="lastname">
  <input type="submit" name="submit" value="View Results">
</form><br>

    <a href="read.php">Back to search by location</a><br><br>
    <a href="index.php">Back to home</a>

    </div>

    <?php include "templates/footer.php"; ?>