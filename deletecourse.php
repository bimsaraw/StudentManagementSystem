<?php

require_once('class/dataAccess.php');

$id = $_GET['id'];

$query = "DELETE FROM Course WHERE CourseId='".$id."'";
if ($conn->query($query) === TRUE) {
    header('Location: viewcourse.php?msg=success');
} else {
    header('Location: viewcourse.php?msg=error');
}

$conn->close();

