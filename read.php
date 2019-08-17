<?php

/**
 * Function to query information based on
 * a parameter: in this case, location.
 *
 */

if (isset($_POST['submit'])) {
  try {
    require("config.php");
    require("common.php");

    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT * FROM users WHERE location = :location";

    $location = $_POST['location'];

    $statement = $connection->prepare($sql);
    $statement->bindParam(':location', $location, PDO::PARAM_STR);
    $statement->execute();

    $result = $statement->fetchAll();
  } catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}
?>

<?php require "templates/header.php"; ?>

<div class="container-fluid" id="container-main">
  <div class="row" id="container-content">
    <div class="col-md-4"></div>

    <div class="col-md-4">

      <?php
      if (isset($_POST['submit'])) {
        if ($result && $statement->rowCount() > 0) { ?>

          <h2 style="text-align: center;">Results</h2>


          <div class="table-responsive" style="width: auto;">
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
          > No results found for <?php echo escape($_POST['location']); ?>.
        <?php }
      } ?>

      <div style="margin: auto;">
        <h2>Search by Location</h2>

        <form method="post">
          <label for="location">Location</label>
          <input type="text" id="location" name="location">
          <input type="submit" name="submit" value="View Results">
        </form><br>

        <a href="readlastname.php">Or... Search by Last Name</a><br><br>
      </div>
    </div>
  </div>
    <?php include "templates/footer.php"; ?>