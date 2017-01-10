<?php
   require_once('class/dataAccess.php');
   session_start();

   $user_check = $_SESSION['login_user'];
//   
//   $query = "select userId from user where userId = '".$user_check."' ";
//   $result = $conn->query($query);
//   
//       $row = $result->fetch_assoc();
//       $login_session = $row['userId'];
//   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>