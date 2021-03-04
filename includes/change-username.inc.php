<?php
  session_start();

    if(isset($_POST['reset-user-submit'])){
      $username = $_SESSION['userUid'];
      $new_username = $_POST['newUser'];
      $pwd = $_POST['pwd'];

      if(empty($new_username) || empty($pwd)){
        header('Location: ../changeuser.php?error=emptyfields');
        exit();
      }
      else {
        require "dbh.inc.php";
        $sql = "SELECT * FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
          header("Location: ../changeuser.php?error=sqlerror");
          exit();
        }
        else {
          mysqli_stmt_bind_param($stmt, 's', $username);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          if ($row = mysqli_fetch_assoc($result) ) {
            $pwdCheck = password_verify($pwd, $row['pwdUsers']);
            if ($pwdCheck == false) {
              header("Location: ../changeuser.php?error=wrongpassword");
              exit();
            } else
            if($pwdCheck == true){
              $sql = "SELECT * FROM users WHERE uidUsers=?";
              $stmt = mysqli_stmt_init($conn);
              if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../changeuser.php?error=sqlerror");
                exit();
              }
              else {
                mysqli_stmt_bind_param($stmt, 's', $username);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                $sql = "UPDATE users SET uidUsers = ? WHERE uidUsers =?";
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql)){
                  header("Location: ../changeuser.php?error=sqlerror");
                  exit();
                }
                else {
                  mysqli_stmt_bind_param($stmt, 'ss', $new_username, $username);
                  mysqli_stmt_execute($stmt);
                  $_SESSION['userUid']=$new_username;
                  header("Location: ../home.php?succesful");
                  exit();
                }

              }
            }
        }
      }
    }
  }
    else {
      header("Location: ../home.php");
      exit();
    }
