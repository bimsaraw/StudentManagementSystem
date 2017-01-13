<?php   
require_once('class/dataAccess.php');
    $studentId = $_GET['studentId'];
    $batchId=$_GET['sel_enrollment'];
    $date=date("Y-m-d h:i:sa");
    $installments=$_GET['payinginstallments'];
    $amount=$_GET['amount'];
    
    $insert = "INSERT INTO payments (studentId, batchId, date, installments, amount)
            VALUES ('$studentId','$batchId','$date','$installments','$amount')";
    
    if($conn->query($insert)===true){
        $msg = "error";
    }   
    else {
        echo $conn->error;
    }
    
    ?>