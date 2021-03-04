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
          session_start();
          if (isset($_SESSION['userId'])){
            require 'includes/dbh.inc.php';

            $sql = "SELECT * FROM products";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
              echo '<h2> You need to be logged in to view the products for sale <p>';
            }
            else {
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              echo '<table>';
              echo "<tr><th>Name</th><th>Qty</th></tr>";
              while($row = mysqli_fetch_array($result)){
                $name = $row['prdName'];
                $qty = $row['prdQty'];
                echo "<tr><td style='width: 200px;'>".$name."</td><td>".$qty."</td></tr>";
              }
              echo "</table>";
              echo "<br>";
              echo '<form action="includes/addprd.inc.php" method="post">
                <input type="text" name="prdName" placeholder="Product Name"> <br>
                <input type="text" name="prdQty" placeholder="Product Quantity"><br>
                <button type="submit" name="addPrd-submit">ADD PRODUCT</button>
              </form>';
              }
              mysqli_close($conn);
            }
          else {
            echo '
            <label> You are not logged in </label>
            <br>
            <a href="login.php">Log in</a>';
          }
         ?>
</body>
