<!DOCTYPE html>
<?php $breadcrumb = ""; 
require_once('class/dataAccess.php');
require_once('class/upload.class.php');        

$responseerror = "";
$success = "";
error_reporting(0);

if (isset($_POST['submit'])) {
    $structId = $_POST['structId'];
    $structName = $_POST['structName'];
    $amount = $_POST['amount'];
    $installments = $_POST['installments'];
    
    $validateId = "SELECT structId FROM fee_structure WHERE structId='".$structId."'";
	
   if($conn->query($validateId)->num_rows>0){
        $responseerror = "Structure Id is not unique.";  
   }
   else {
        $insert = "INSERT INTO fee_structure (structId, structName, amount, installments)
            VALUES ('$structId','$structName', '$amount', '$installments')";
        if ($conn->query($insert) === TRUE) {
            $_POST = array();
            $success = "Fee Structure added successfully!";
            include ('session.php');
            $conn->query("INSERT INTO tbllogs(userId, activity, time) VALUES ('$user_check','Fee Structure Added $structId','".date("Y-m-d h:i:sa")."')");
        } else {
            $responseerror = $conn->error;
        }
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
                            <h2>Add Fee Structure</h2>
                            <hr>
                            <?php if ($responseerror != "") { ?>
                            <div class="alert alert-warning alert-dismissible fade in">
                                <strong>Error! </strong><?php echo $responseerror; ?>
                            </div>
                            <?php } ?>
                            <?php if ($success != "") { ?>
                            <div class="alert alert-success alert-dismissible fade in">
                                <strong>Success! </strong><?php echo $success; ?>
                            </div>           
                            <?php } ?>  
                            <form class="form-horizontal" method="post" action="">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="structId">Fee Structure ID:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="structId" name="structId" value="<?php echo $_POST['structId']; ?>" placeholder="Enter an unique Structure Id" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="structName">Fee Structure Name:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="structName" name="structName" value="<?php echo $_POST['structName']; ?>" placeholder="Enter the fee structure name" required>
                                    </div>
                                </div>   
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="amount">Amount:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="amount" name="amount" value="<?php echo $_POST['amount']; ?>" placeholder="Enter the total fee amount" required>
                                    </div>
                                </div>                                  
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="installments">Installments:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="installments" required>
                                                <option value="<?php echo $_POST['installments']; ?>"><?php echo $_POST['installments']; ?></option>
                                                <option value="6">6</option>
                                                <option value="9">9</option>
                                                <option value="12">12</option>
                                                <option value="24">24</option>                                                
                                        </select>
                                    </div>
                                </div> 							
                                <div class="form-group"> 
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="submit" class="btn btn-success">Add Fee Structure</button>
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



