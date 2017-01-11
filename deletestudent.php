<?php

require_once('class/dataAccess.php');

$id = $_GET['id'];

$query = "DELETE FROM student WHERE studentId='".$id."'";
if ($conn->query($query) === TRUE) {
    header('Location: viewstudent.php?msg=success');
    include ('session.php');
    $conn->query("INSERT INTO tbllogs(userId, activity, time) VALUES ('$user_check','Student Deleted $id','".date("Y-m-d h:i:sa")."')");        
} else {
    header('Location: viewstudent.php?msg=error');
}

$conn->close();
