<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */

if (isset($_POST['submit'])) {
  require("config.php");
  require("common.php");

  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $new_user = array(
      "firstname" => $_POST['firstname'],
      "lastname"  => $_POST['lastname'],
      "email"     => $_POST['email'],
      "age"       => $_POST['age'],
      "location"  => $_POST['location']
    );

    $sql = sprintf(
      "INSERT INTO %s (%s) values (%s)",
      "users",
      implode(", ", array_keys($new_user)),
      ":" . implode(", :", array_keys($new_user))
    );

    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
  } catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}
?>

<?php require "templates/header.php"; ?>

<div class="container-fluid" id="container-main">
  <div id="container-content">

    <?php if (isset($_POST['submit']) && $statement) { ?>
      > <?php echo $_POST['firstname']; ?> successfully added.
    <?php } ?>

    <h2>Add a user</h2>

    <form method="post">
      <label for="firstname" class="text-center">First Name</label>
      <input type="text" name="firstname" id="firstname" required autofocus>
      <label for="lastname" class="text-center">Last Name</label>
      <input type="text" name="lastname" id="lastname">
      <label for="email" class="text-center">Email Address</label>
      <input type="text" name="email" id="email" required>
      <label for="age" class="text-center">Age</label>
      <input type="text" name="age" id="age">
      <label for="location" class="text-center">Location</label>
      <input type="text" name="location" id="location"><br><br>
      <input type="submit" name="submit" value="Submit">
    </form><br>
  </div>
</div>
  <?php require "templates/footer.php"; ?>