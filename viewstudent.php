<!DOCTYPE html>
<?php 
$breadcrumb = "";
error_reporting(0);
require_once('class/dataAccess.php');
$sql = "SELECT studentId,Name,Mobile,Guardian,Guardian_TP FROM student ORDER BY Date_added ASC";
$result = $conn->query($sql);

$msg = $_GET['msg'];

$conn->close();
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Management System - Saegis Campus</title>
        <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
        <link href="css/commonmain.css" type="text/css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" type="text/css" rel="stylesheet">
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
                            <h2>View Students</h2>
                            <hr>
                            <?php if($msg == "success"){ ?>
                            <div class="alert alert-success">Student updated/deleted successfully!</div>
                            <?php } else if($msg =="error") { ?>
                            <div class="alert alert-danger">Student cannot be updated/deleted!</div>
                            <?php } ?>
                            <div class="table-responsive">
                                <table id="student" class="table table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Guardian</th>
                                            <th>Guardian Contact</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php if ($result->num_rows > 0){ 
                                           while($row = $result->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $row['studentId']; ?></td>
                                                <td><?php echo $row['Name']; ?></td>
                                                <td><?php echo $row['Mobile']; ?></td>
                                                <td><?php echo $row['Guardian']; ?></td>
                                                <td><?php echo $row['Guardian_TP']; ?></td>
                                                <td>
                                                    <a href="addstudent.php?id=<?php echo $row['studentId']; ?>" class="btn btn-info btn-sm">Edit</a>
                                                    <a href="deletestudent.php?id=<?php echo $row['studentId']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                       <?php } } else { ?>
                                            <tr>
                                                <td colspan="6">No Students in the system. <a href="addstudent.php">Click here</a> to add now.</td>
                                            </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script>$(document).ready(function() {
    $('#student').DataTable();
} );</script>
    </body>
</html>
<!-- End -->



