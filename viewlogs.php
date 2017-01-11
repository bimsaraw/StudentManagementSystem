<!DOCTYPE html>
<?php 
$breadcrumb = "logs";
error_reporting(0);
require_once('class/dataAccess.php');
$sql = "SELECT * FROM tbllogs ORDER BY log_id DESC";
$result = $conn->query($sql);

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
                            <h2>View Logs</h2>
                            <hr>
                            <div class="table-responsive">
                                <table id="logs" class="table table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Log ID</th>
                                            <th>User</th>
                                            <th>Activity</th>
                                            <th>Date and Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php if ($result->num_rows > 0){ 
                                           while($row = $result->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $row['log_id']; ?></td>
                                                <td><?php echo $row['userId']; ?></td>
                                                <td><?php echo $row['activity']; ?></td>
                                                <td><?php echo $row['time']; ?></td>
                                            </tr>
                                       <?php } } else { ?>
                                            <tr>
                                                <td colspan="6">No logs in the system.</td>
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
    $('#logs').DataTable();
} );</script>
    </body>
</html>
<!-- End -->



