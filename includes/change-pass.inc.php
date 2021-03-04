<?php
  session_start();
  if(isset($_POST['reset-pwd-submit'])){

    $username = $_SESSION['userUid'];
    $newpwd = $_POST['newpwd'];
    $repnewpwd = $_POST['rep-newpwd'];
    $oldpwd = $_POST['old-pwd'];

    if(empty($newpwd) || empty($repnewpwd) || empty($oldpwd)){
      header("Location: ../changepwd.php?error=emptyfields");
      exit();
    }
    else if($newpwd != $repnewpwd){
      header("Location: ../changepwd.php?error=passwordsdontmatch");
      exit();
    }

    require 'dbh.inc.php';

    $sql = "SELECT * FROM users WHERE uidUsers=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../changepwd.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, 's', $username);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result) ) {
        $pwdCheck = password_verify($oldpwd, $row['pwdUsers']);
        if ($pwdCheck == false) {
          header("Location: ../changepwd.php?error=wrongpassword");
          exit();
        }
        else if($pwdCheck == true){

          $sql = "SELECT * FROM users WHERE uidUsers = ?;";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../changepwd.php?error=sqlerror");
            exit();
          }
          else {
            mysqli_stmt_bind_param($stmt, 's', $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            $sql = "UPDATE users set pwdUsers = ? WHERE uidUsers =?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("Location: ../changepwd.php?error=sqlerror");
              exit();
            }
            else {
              $hashedPwd = password_hash($newpwd, PASSWORD_DEFAULT);
              mysqli_stmt_bind_param($stmt, 'ss',$hashedPwd, $username);
              mysqli_stmt_execute($stmt);
              header("Location: ../home.php?pwdChangeSuccessful");
              exit();
            }
          }
        }

    }

  }
}
  else{
    header("Location: ../home.php");
    exit();
  }
