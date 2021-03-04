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
          <form action="includes/change-username.inc.php" method="post">
            <input type="text" name="newUser" placeholder="New Username">
            <input type="password" name="pwd" placeholder="Old Password"><br>
            <button type="submit" name="reset-user-submit">Submit</button>
          </form>
        </section>
</body>
