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
        <section>
          <form action="includes/change-pass.inc.php" method="post">
            <input type="password" name="newpwd" placeholder="Enter New Password"><br>
            <input type="password" name="rep-newpwd" placeholder="Repeat New Password"><br>
            <input type="password" name="old-pwd" placeholder="Old Password"><br>
            <button type="submit" name="reset-pwd-submit">Submit</button>
          </form>
        </section>
</body>
