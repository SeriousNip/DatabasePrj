<?php

if(isset($_POST['addPrd-submit'])){

  require 'dbh.inc.php';

  $prdName = $_POST['prdName'];
  $prdQty = $_POST['prdQty'];

  if(empty($prdName) || empty($prdQty)){
    header("Location: ../products.php?error=emptyfields");
    exit();
  }
  else{
    $sql = "SELECT prdName FROM products WHERE prdName=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
      header("Location: ../products.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if($resultCheck > 0){
        header("Location: ../products.php?error=productExistsAlready");
        exit();
      }
      else {
        $sql = "INSERT INTO products (prdName , prdQty) VALUES (?,?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
          header("Location: ../products.php?error=sqlerror");
          exit();
        }
        else{
          mysqli_stmt_bind_param($stmt,'ss',$prdName,$prdQty);
          mysqli_stmt_execute($stmt);
          header("Location: ../products.php?addPrd=Success");
          exit();
        }
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_stmt_close($conn);
}

else {
  header("Location: ../products.php");
  exit();
}
