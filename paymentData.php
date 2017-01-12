<?php
require_once('class/dataAccess.php');

if(isset($_POST['studentId']) && isset($_POST['batchId'])){

    $studentId=$_POST['studentId'];
    $batchId=$_POST['batchId'];

    $countpayments = $conn->query("SELECT SUM(installments) FROM payments WHERE studentId='".$studentId."' AND batchId='".$batchId."'");
    $countpayments = $countpayments->fetch_array();
    $remain = $conn->query("SELECT enroll.batchId, enroll.structId, fee_structure.installments FROM enroll INNER JOIN fee_structure ON enroll.structId=fee_structure.structId");
    $remain = $remain->fetch_assoc();

    $remain = $remain['installments']-$countpayments[0];

    for($i=1; $i<=$remain; $i++){
        echo "<option value=".$i.">".$i."</option>";
    }
} 

if(isset($_POST['studentId']) && isset($_POST['bId']) && isset($_POST['installments'])){
    $studentId=$_POST['studentId'];
    $batchId=$_POST['bId'];
    $installments=$_POST['installments'];
    
    $amount = $conn->query("SELECT enroll.studentId, enroll.batchId, enroll.structId, fee_structure.amount, fee_structure.installments FROM enroll INNER JOIN fee_structure ON enroll.structId=fee_structure.structId WHERE studentId='".$studentId."'");
    $amount = $amount->fetch_assoc();
    $amount = $amount['amount']/$amount['installments']*$installments;
    
    echo $amount;
}
?>