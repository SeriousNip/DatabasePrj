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
        <div>
          <?php if (isset($_SESSION['userId'])) {
            echo '
            <form action="includes/logout.inc.php" method="post">
              <button type="submit" name="logout-submit">LOG OUT</button>
            </form>';
          }else {
            echo '
            <form action="includes/login.inc.php" method="post">
              <input type="text" name="mailuid" placeholder="Username/E-mail ...">
              <input type="password" name="pwd" placeholder="Password">
              <button type="submit" name="login-submit">LOGIN</button>
            </form>
            <br>
            <p> Not signed up yet? <p>
            <a href="signup.php">Sign Up</a>';
          }
          ?>
        </div>
      </nav>

    </header>
