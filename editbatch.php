<!DOCTYPE html>
<?php $breadcrumb = ""; 
require_once('class/dataAccess.php');
require_once('class/upload.class.php');        

$responseerror = "";
$success = "";


if (isset($_POST['submit'])) {
    $batchId = $_POST['batchId'];
    $name = $_POST['name'];
    
        $update = "UPDATE batch SET name='$name'
            WHERE batchId='".$batchId."'";
            if ($conn->query($update) === TRUE) {
                Header('Location:viewbatch.php?msg=success');
            } else {
                echo $conn->error; 
            } 

    $conn->close();   
}
if($_GET["id"]!="" && !isset($_POST['submit'])){
    $editquery = "SELECT * FROM batch WHERE batchId='".$_GET['id']."'";
    $result = $conn->query($editquery);
    $result = $result->fetch_assoc();
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
                            <h2>Edit Course</h2>
                            <hr>
                            <form class="form-horizontal" method="post" action="">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="batchId">Batch ID:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="batchId" name="batchId" value="<?php echo $result['batchId']; ?>" placeholder="Enter an unique course Id" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="name">Batch Name:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $result['name']; ?>" placeholder="Enter the course name" required>
                                    </div>
                                </div>   
                                <div class="form-group"> 
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="submit" class="btn btn-success">Add Course</button>
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



