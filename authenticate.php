<?php

require_once('class/dataAccess.php');
session_start();
$userId = $_POST['userId'];
$password = $_POST['password'];

$query = "SELECT userId, password FROM user WHERE userId='".$userId."' AND password='".$password."'";
$result = $conn->query($query);

if($result->num_rows == 1){
    $_SESSION['login_user'] = $userId;
    $_SESSION['LAST_ACTIVITY'] = time();
    header('Location: index.php');
}
 else {
    header('Location: login.php?msg=loginerror');
}

?>

