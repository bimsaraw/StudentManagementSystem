<!DOCTYPE html>
<?php 

$date = date_create("2015-01-01");
$today = date_create(date("y-m-d"));
$diff =  date_diff($date,$today);
echo $diff->format("%R%a");

$breadcrumb = ""; 
require_once('class/dataAccess.php');
        
if (isset($_POST['submit'])) {
  $studentId = $_POST['studentId'];
  $batchId = $_POST['batchId'];
  
  $validatebatch = $conn->query("SELECT studentId FROM enroll WHERE batchId='".$batchId."'");
  $validateduration = $conn->query("SELECT batch.batchId, batch.CourseId, course.Duration FROM batch INNER JOIN course ON batch.CourseId = course.CourseId WHERE batch.batchId='".$batchId."'");
  
  if($validatebatch->num_rows==0){
      echo "This student is not enrolled to the selected batch and course. Please check again.";
  }
  else if($validateduration->num_rows==1){
      $getenrolldate = $conn->query("SELECT * FROM enroll WHERE studentId='".$studentId."' AND batchId='".$batchId."'");
      $enrolldate = $getenrolldate->fetch_assoc();
      $validateduration=$validateduration->fetch_assoc();
      $enrolledperiod = date_diff(date_create($enrolldate['date']),date_create(date("y-m-d")));
      $enrolledperiod = $enrolledperiod->format("%R%a");
      if($enrolledperiod>$validateduration['Duration']*30){
          $msg="Student enrollment is expired.";
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
                            <h1>Mark Attendance </h1>
                            <?php echo $msg.$validateduration['Duration']*30; ?>
                            <hr>
                            <form class="form-inline" method="post" action="">
                                <div class="form-group">
                                    <label for="batchId">Select Batch:</label>
                                    <select class="form-control" name="batchId" required>
                                        <?php $batch=$conn->query('SELECT * FROM batch');
                                              if($batch->num_rows>0){
                                                  while($row=$batch->fetch_assoc()){ ?>
                                        <option value="<?php echo $row['batchId']; ?>"><?php echo $row['name']; ?></option>
                                        <?php
                                                  }
                                              } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="studentId" id="studentId" placeholder="Please enter student Id" required>
                                </div>
                                <button type="submit" class="btn btn-info" name="submit">Mark Atttendance</button>
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



