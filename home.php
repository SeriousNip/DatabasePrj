<?php
  session_start();
 ?>

<!DOCTYPE html>
  <html>

    <head>
      <meta charset="utf-8">
      <meta name="description" content="description content">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Home</title>
    </head>

<body>
    <header>

      <nav>
        <a href="#">
          <img src="IMG/logo_size.jpg" alt="logo">
        </a>
        <ul>
          <li>
            <a href="home.php">HOME</a>
            <a href="products.php">Products</a>
          </li>
        </ul>
        <?php
          if (isset($_SESSION['userId'])){
            $user = $_SESSION['userUid'];
            echo '<label> Username:  </label>';
            echo $user;
            echo '
            <form action="includes/logout.inc.php" method="post">
              <button type="submit" name="logout-submit">LOG OUT</button>
            </form>';
            echo '<a href="changeuser.php">Change Username</a> <br>';
            echo '<a href="changepwd.php">Change Password</a>';
          }
          else {
            echo '
            <label> You are not logged in </label>
            <br>
            <a href="login.php">Log in</a>';

          }
         ?>
</body>
