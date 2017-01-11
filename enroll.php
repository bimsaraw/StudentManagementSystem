<!DOCTYPE html>
<?php $breadcrumb = "" ;
require_once('class/dataAccess.php');
require_once('class/upload.class.php');   

$courselist = "SELECT batchId, name FROM batch";
$result = $conn->query($courselist);


    $selectstudentquery = "SELECT studentId, Name FROM student";
    $selectstudent = $conn->query($selectstudentquery);


if(isset($_POST['enroll'])){    
    $select = $_POST['selectBatch'];
    foreach($_POST['selectStudents'] as $students){
        $enrollquery = "INSERT INTO enroll('studentId','batchId','structId','date') 
            VALUES('$students','$select','nullfornow','".date()."')";
        if ($conn->query($enrollquery) === TRUE) {
            echo "added";
        } else {
            echo $conn->error;
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
                            <h2>Enroll Students</h2>
                            <hr> 
                            <br>

                                <form method="post" action="">
                                    <div class="form-group">
                                    <label class="control-label" for="selectBatch">Select the course to enroll:</label>
                                        <select class="form-control" name="selectBatch">
                                            <?php if(isset($_POST['select'])) { ?>
                                            <option value="<?php echo $_POST['selectBatch']; ?>"><?php echo $_POST['selectBatch']; ?></option>
                                            <?php } else { ?>
                                           <?php if ($result->num_rows > 0){ 
                                               while($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['batchId']; ?>"><?php echo $row['name']; ?></option>
                                            <?php } } }?>
                                        </select>
                                    </div>                                    
                                    <div class="form-group">
                                        <label class="control-label" for="selectStudents">Select Students</label>                                   
                                        <select multiple name="selectStudents" class="form-control">
                                           <?php if ($selectstudent->num_rows > 0){ 
                                               while($row = $selectstudent->fetch_assoc()) { ?>
                                               <option value="<?php echo $row['studentId']; ?>"><?php echo $row['Name']; ?></option>
                                           <?php } } ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-success" name="enroll">Enroll Students</button>
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



