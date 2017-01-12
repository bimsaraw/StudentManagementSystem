<!DOCTYPE html>
<?php $breadcrumb = "";
 error_reporting(0);
require_once('class/dataAccess.php');

$studentId=$_GET['studentId'];

$validateId=$conn->query("SELECT COUNT(studentId) FROM student WHERE studentId='".$studentId."'");
$enrollments=$conn->query("SELECT enroll.studentId, enroll.batchId, batch.name, enroll.structId FROM enroll INNER JOIN batch ON enroll.batchId=batch.batchId WHERE studentId='".$studentId."'");

if(isset($_GET['submit'])){
    echo $_GET['studentId'];
    $batchId=$_GET['sel_enrollment'];
    $date=date("Y-m-d h:i:sa");
    $installments=$_GET['payinginstallments'];
    $amount=$_GET['amount'];
    
    $insert = "INSERT INTO payments('studentId','batchId','date','installments','amount') VALUES ('$studentId','$batchId','$date','$installments','$amount')";
    
    if($conn->query($insert)===true){
        $msg = "error";
    }   
    else {
        echo $conn->error;
    }
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Management System - Saegis Campus</title>
        <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
        <link href="css/commonmain.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        
        <?php include 'includes/topnav.php'; ?>
        
        <div class="container" style="margin-top: 55px;">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                
                <div class="col-xs-12 col-md-3">
                    <!-- Adding Side menus -->
                    <?php include 'includes/sidemenu1.php'; 
                            include 'includes/sidemenu2.php' ; ?>
                    <!--/ End of side menus -->
                </div>

                <div class="col-xs-12 col-md-9">
                    <div class="boxarea">
                        <div class="insideholder">
                            <h1>New Payment</h1>
                            <hr>
                            <?php echo $msg; ?>
                            <form class="form-horizontal" method="get" action="">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="studentId">Student ID:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="studentId" name="studentId" value="<?php echo $studentId; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="sel_enrollment">Enrollment:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="sel_enrollment" name="sel_enrollment" required>
                                            <?php if($enrollments->num_rows>0) { 
                                                while($row=$enrollments->fetch_assoc()){ ?>
                                            <option value="">Please select</option>
                                                    <option value="<?php echo $row['batchId']; ?>"><?php echo $row['name']; ?></option>
                                                <?php }    } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="payinginstallments">Installments paying:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="payinginstallments" name="payinginstallments">

                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Amount:</label>
                                    <div class="col-sm-10" id="amount">
                                        <input type='text' class='form-control' id='amount' name='amount' value='' disabled>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="submit" class="btn btn-success">Complete Payment</button>
                                        <a href="newpayment.php" class="btn btn-danger">Go Back</a>
                                    </div>                                    
                                </div>                                
                            </form>
                        </div>
                    </div>
                </div> 
                
            </div> 
        </div>
            
            <?php include 'includes/footer.php'; ?>
            
        </div>
<!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#sel_enrollment').on('change',function(){
            var studentId = document.getElementById('studentId').value;
            var batchId = document.getElementById('sel_enrollment').value;
            if(batchId){
                $.ajax({
                    type:'POST',
                    url:'paymentData.php',
                    data:{studentId:studentId,batchId:batchId},
                    success:function(html){
                        $('#payinginstallments').html(html);
                    }
                }); 
            }else{
                $('#payinginstallments').html('<option value="">Select country first</option>');
            }
        });  
        $('#payinginstallments').on('change',function(){
            var studentId = document.getElementById('studentId').value;
            var batchId = document.getElementById('sel_enrollment').value;
            var installments = $(this).val();
            if(installments){
                $.ajax({
                    type:'POST',
                    url:'paymentData.php',
                    data:{studentId:studentId,bId:batchId,installments:installments},
                    success:function(html){
                          $('#amount').value(html);
                    }
                }); 
            }else{
                $('#payinginstallments').html('<option value="">Select country first</option>');
            }
        });   
    });
    </script>
    </body>
</html>
<!-- End -->




