<!DOCTYPE html>
<?php $breadcrumb = ""; 
require_once('class/dataAccess.php');
require_once('class/upload.class.php');        

$responseerror = "";
$success = "";
error_reporting(0);

if (isset($_POST['submit'])) {
    $batchId = $_POST['batchId'];
    $name = $_POST['name'];
    
    $validateId = "SELECT batchId FROM batch WHERE CourseId='".$batchId."'";
   if($conn->query($validateId)->num_rows>0){
        $responseerror = "Course Id is not unique.";  
   }
   else {
        $insert = "INSERT INTO batch (batchId, name)
            VALUES ('$batchId','$name')";
        if ($conn->query($insert) === TRUE) {
            $success = "Batch added successfully!";
        } else {
            $responseerror = $conn->error;
        }
    } 
    $conn->close();   
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
                            <h2>Create Batch</h2>
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
                                    <label class="control-label col-sm-2" for="batchId">Course ID:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="batchId" name="batchId" value="<?php echo $_POST['batchId']; ?>" placeholder="Enter an unique course Id" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="name">Batch Name:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $_POST['name']; ?>" placeholder="Enter the course name" required>
                                    </div>
                                </div>   
                                <div class="form-group"> 
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="submit" class="btn btn-success">Create Batch</button>
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



