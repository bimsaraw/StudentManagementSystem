<!DOCTYPE html>
<?php $breadcrumb = "" ;
require_once('class/dataAccess.php');
require_once('class/upload.class.php');   

$courselist = "SELECT CourseId, Name FROM course";
$result = $conn->query($courselist);

$select = "";

if(isset($_POST['select'])){
    $selectstudentquery = "SELECT studentId, name FROM student";
    $selectstudent = $conn->query($selectstudentquery);
    $conn->close();
}

if(isset($_POST['enroll'])){
    
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
                            <h2>Enroll Students</h2>
                            <hr> 
                            <form class="form-inline" method="post" action="">
                                <div class="form-group">
                                    <label class="control-label" for="selectCourse">Select the course to enroll:</label>
                                        <select class="form-control" name="selectCourse">
                                            <?php if(isset($_POST['select'])) { ?>
                                            <option value="<?php echo $_POST['selectCourse']; ?>"><?php echo $_POST['selectCourse']; ?></option>
                                            <?php } else { ?>
                                           <?php if ($result->num_rows > 0){ 
                                               while($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['CourseId']; ?>"><?php echo $row['Name']; ?></option>
                                            <?php } } }?>
                                        </select>
                                </div>
                                <button type="submit" class="btn btn-info" name="select">Select</button>
                            </form>
                            <br>

                            <?php if(isset($_POST['select'])) { ?>
                                <form method="post" action="">\
                                    <div class="form-group">
                                        <label class="control-label" for="selectBatch">Select batch</label>                                   
                                        <select multiple name="selectBatch" class="form-control">
                                           <?php if ($selectbatch->num_rows > 0){ 
                                               while($row = $selectstudent->fetch_assoc()) { ?>
                                               <option value="<?php echo $row['studentId']; ?>"><?php echo $row['Name']; ?></option>
                                           <?php } } ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-success" name="enroll">Enroll Batch</button>
                                </form>                               
                            <?php } ?>
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



