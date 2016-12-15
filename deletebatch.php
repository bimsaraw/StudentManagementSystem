<?php

require_once('class/dataAccess.php');

$id = $_GET['id'];

$query = "DELETE FROM batch WHERE batchId='".$id."'";
if ($conn->query($query) === TRUE) {
    header('Location: viewbatch.php?msg=success');
} else {
    header('Location: viewbatch.php?msg=error');
}

$conn->close();

