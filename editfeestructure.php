<!DOCTYPE html>
<?php 
//error_reporting(0);
$breadcrumb = ""; 
require_once('class/dataAccess.php');
require_once('class/upload.class.php');        

$responseerror = "";
$success = "";

$batchId = false;
if(isset($_GET['id'])) {
	$structId = $_GET['id'];
	if (isset($_POST['submit'])) {
                $structName = $_POST['structName'];
                $amount = $_POST['amount'];
                $installments = $_POST['installments'];
		
                $update = "UPDATE fee_structure SET structName='$structName', amount='$amount', installments='$installments'
                        WHERE structId='".$structId."'";
                        if ($conn->query($update) === TRUE) {
                            include ('session.php');
                            $conn->query("INSERT INTO tbllogs(userId, activity, time) VALUES ('$user_check','Fee Structure Edited $structId','".date("Y-m-d h:i:sa")."')");                                    
                            Header('Location:viewstructures.php?msg=success');
                        } else {
                            echo $conn->error; 
                        } 

		$conn->close();   
	}
}
if((isset($_GET["id"]) && !isset($_POST['submit'])) || $responseerror != ""){
    $editquery = "SELECT * FROM fee_structure WHERE structId='".$_GET['id']."'";
    $result = $conn->query($editquery);
    $result = $result->fetch_assoc();
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
                            <h2>Edit Fee Structure</h2>
                            <hr>
                            <?php if ($responseerror != "") { ?>
                            <div class="alert alert-warning alert-dismissible fade in">
                                <strong>Error! </strong><?php echo $responseerror; ?>
                            </div>
                            <?php } ?>							
                            <form class="form-horizontal" method="post" action="">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="structId">Fee Structure ID:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="structId" name="structId" value="<?php echo $result['structId']; ?>" placeholder="Enter an unique Structure Id" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="structName">Fee Structure Name:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="structName" name="structName" value="<?php echo $result['structName']; ?>" placeholder="Enter the fee structure name" required>
                                    </div>
                                </div>   
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="amount">Amount:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="amount" name="amount" value="<?php echo $result['amount']; ?>" placeholder="Enter the total fee amount" required>
                                    </div>
                                </div>                                  
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="installments">Installments:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="installments" required>
                                                <option value="<?php echo $result['installments']; ?>"><?php echo $result['installments']; ?></option>
                                                <option value="6">6</option>
                                                <option value="9">9</option>
                                                <option value="12">12</option>
                                                <option value="24">24</option>                                                
                                        </select>
                                    </div>
                                </div> 							
                                <div class="form-group"> 
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="submit" class="btn btn-success">Update Fee Structure</button>
                                        <button type="reset" class="btn btn-danger">Discard</button>
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
    </body>
</html>
<!-- End -->



