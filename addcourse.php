<!DOCTYPE html>
<?php $breadcrumb = ""; 
require_once('class/dataAccess.php');
require_once('class/upload.class.php');        

$responseerror = "";
$success = "";
error_reporting(0);

if (isset($_POST['submit'])) {
    $CourseId = $_POST['CourseId'];
    $Name = $_POST['Name'];
    $Duration = $_POST['Duration'];
    $CourseType = $_POST['CourseType'];
    $Type = $_POST['Type'];
    
    $validateId = "SELECT CourseId FROM course WHERE CourseId='".$CourseId."'";
   if($conn->query($validateId)->num_rows>0){
        $responseerror = "Course Id is not unique.";  
   }
   else {
        $insert = "INSERT INTO Course (CourseId, courseName, Duration, CourseType, Type)
            VALUES ('$CourseId','$Name','$Duration','$CourseType','$Type')";
        if ($conn->query($insert) === TRUE) {
			$_POST=array();
            $success = "Course added successfully!";
                include ('session.php');
                $conn->query("INSERT INTO tbllogs(userId, activity, time) VALUES ('$user_check','Course Added $CourseId','".date("Y-m-d h:i:sa")."')");            
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
                            <h2>Add Course</h2>
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
                                    <label class="control-label col-sm-2" for="CourseId">Course ID:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="courseId" name="CourseId" value="<?php echo $_POST['CourseId']; ?>" placeholder="Enter an unique course Id" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="Name">Course Name:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Name" name="Name" value="<?php echo $_POST['Name']; ?>" placeholder="Enter the course name" required>
                                    </div>
                                </div>   
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="Duration">Duration:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Duration" name="Duration" value="<?php echo $_POST['Duration']; ?>" placeholder="Enter the course duration as months" required>
                                    </div>
                                </div>    
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="CourseType">Course Type:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="CourseType" name="CourseType">
                                            <option value="<?php echo $_POST['CourseType']; ?>"><?php echo $_POST['CourseType']; ?></option>
                                            <option value="Certificate">Certificate</option>
                                            <option value="Diploma">Diploma</option>
                                            <option value="Degree">Degree</option>
                                        </select>
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="Type">Type:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="Type" name="Type">
                                            <option value="<?php echo $_POST['Type']; ?>"><?php echo $_POST['Type']; ?></option>
                                            <option value="Part Time">Part Time</option>
                                            <option value="Full Time">Full Time</option>
                                        </select>
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



