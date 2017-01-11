<?php

require_once('class/dataAccess.php');

$id = $_GET['id'];

$query = "DELETE FROM batch WHERE batchId='".$id."'";
if ($conn->query($query) === TRUE) {
    include ('session.php');
    $conn->query("INSERT INTO tbllogs(userId, activity, time) VALUES ('$user_check','Batch Deleted $id','".date("Y-m-d h:i:sa")."')");    
    header('Location: viewbatch.php?msg=success');
} else {
    header('Location: viewbatch.php?msg=error');
}

$conn->close();

