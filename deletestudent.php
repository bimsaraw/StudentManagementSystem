<?php

require_once('class/dataAccess.php');

$id = $_GET['id'];

$query = "DELETE FROM student WHERE studentId='".$id."'";
if ($conn->query($query) === TRUE) {
    header('Location: viewstudent.php?msg=success');
} else {
    header('Location: viewstudent.php?msg=error');
}

$conn->close();
