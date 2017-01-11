<!DOCTYPE html>
<?php 
error_reporting(0);
$breadcrumb = ""; 
require_once('class/dataAccess.php');
require_once('class/upload.class.php');        

$responseerror = "";
$success = "";

$batchId = false;
if(isset($_GET['id'])) {
	$batchId = $_GET['id'];
	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$type = $_POST['type'];
		$course = $_POST['course'];
		
		$validatetype=$conn->query("SELECT CourseId, Type FROM course WHERE CourseId='".$course."'");
		$validatetype=$validatetype->fetch_assoc();
		
		if($validatetype['Type']==$type) {		
			$update = "UPDATE batch SET name='$name', type='$type', CourseId='$course'
				WHERE batchId='".$batchId."'";
				if ($conn->query($update) === TRUE) {
                                    include ('session.php');
                                    $conn->query("INSERT INTO tbllogs(userId, activity, time) VALUES ('$user_check','Student Batch Edited $batchId','".date("Y-m-d h:i:sa")."')");
                                    Header('Location:viewbatch.php?msg=success');
					
				} else {
					echo $responseerror = $conn->error; 
				} 
		$conn->close(); 
		} else {
			$responseerror = "There is a mismatch between the time shedules(Type) of Course and the Batch";
		}
	}
}
if((isset($_GET["id"]) && !isset($_POST['submit'])) || $responseerror != ""){
    $editquery = "SELECT batch.batchId, batch.name, batch.type, batch.CourseId, course.courseName FROM batch 
					INNER JOIN course ON batch.CourseId=course.CourseId WHERE batchId='".$_GET['id']."'";
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
                            <h2>Edit Batch</h2>
                            <hr>
                            <?php if ($responseerror != "") { ?>
                            <div class="alert alert-warning alert-dismissible fade in">
                                <strong>Error! </strong><?php echo $responseerror; ?>
                            </div>
                            <?php } ?>							
                            <form class="form-horizontal" method="post" action="" id="createBatch">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="batchId">Batch ID:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="batchId" name="batchId" value="<?php echo $result['batchId']; ?>" placeholder="Enter an unique batch Id" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="name">Batch Name:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $result['name']; ?>" placeholder="Enter the batch name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="type">Type:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="type" required>
											<option value="<?php echo $result['type']; ?>"><?php echo $result['type']; ?></option>
											<option value="Full Time">Full Time</option>
											<option value="Part Time">Part Time</option>
										</select>
                                    </div>
                                </div> 
                                <div class="form-group">
									<?php $coursequery = "SELECT CourseId, courseName FROM course";
									    $resultc = $conn->query($coursequery);
										 ?>
                                    <label class="control-label col-sm-2" for="course">Course:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="course" required>
											<option value="<?php echo $result['CourseId']; ?>"><?php echo $result['courseName']; ?></option>
											<?php while($row = $resultc->fetch_assoc()) { ?>
												<option value="<?php echo $row['CourseId']; ?>"><?php echo $row['courseName']; ?></option>
											<?php } ?>
										</select>
                                    </div>
                                </div> 								
                                <div class="form-group"> 
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="submit" class="btn btn-success">Update Batch</button>
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



