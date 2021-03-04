<?php
require "login.php";
 ?>

 <main>
   <div >
     <section>
       <h1>Sign Up</h1>
       <?php
        if (isset($_GET['error'])) {
          if ($_GET['error']=='emptyfields') {
            echo '<p>Fill in all fields</p>';
          }
          else if ($_GET['error']=='invalidmailuid') {
            echo '<p>E-mail and Username are not valid</p>';
          }
          else if ($_GET['error']=='invalidmail') {
            echo '<p>E-mail is not valid</p>';
          }
          else if ($_GET['error']=='invaliduid') {
            echo '<p>Username is not valid</p>';
          }
          else if ($_GET['error']=='passwordcheck') {
            echo '<p>Passwords do not match</p>';
          }
          else if ($_GET['error']=='sqlerror') {
            echo '<p>Server error</p>';
          }
          else if ($_GET['error']=='userTaken') {
            echo '<p>Username is already taken</p>';
          }
        }
        ?>
       <form action="includes/signup.inc.php" method="post">
         <input type="text" name="uid" placeholder="Username">
         <input type="text" name="mail" placeholder="E-mail">
         <input type="password" name="pwd" placeholder="Password">
         <input type="password" name="pwd-repeat" placeholder="Repeat Password">
         <button type="submit" name="signup-submit">Sign Up</button>
       </form>
     </section>
   </div>
 </main>

 <?php
require "footer.php";
  ?>
