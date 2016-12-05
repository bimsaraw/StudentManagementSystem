<?php 
require_once('class/dataAccess.php');

    $breadcrumb = "home"; 
       $studentId = $_POST['studentId'];
       $name = $_POST['name'];
       $address = $_POST['address'];
       $city = $_POST['city'];
       $country = $_POST['country'];
       $telephone = $_POST['telephone'];
       $mobile = $_POST['mobile'];
       $guardian = $_POST['guardian'];
       $guardian_TP = $_POST['guardian_TP'];
       $date_added = date("Y-m-d");

       $validateId = "SELECT studentId FROM student WHERE studentId='".$studentId."'";
       if($conn->query($validateId)->num_rows>0){
           echo "Error with StudentId";
       }
?>