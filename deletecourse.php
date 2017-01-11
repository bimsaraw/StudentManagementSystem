<?php

require_once('class/dataAccess.php');

$id = $_GET['id'];

$query = "DELETE FROM Course WHERE CourseId='".$id."'";
if ($conn->query($query) === TRUE) {
    header('Location: viewcourse.php?msg=success');
    include ('session.php');
    $conn->query("INSERT INTO tbllogs(userId, activity, time) VALUES ('$user_check','Course Deleted $id','".date("Y-m-d h:i:sa")."')");    
} else {
    header('Location: viewcourse.php?msg=error');
}

$conn->close();

