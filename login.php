<!DOCTYPE html>
<?php 

$msg = $_GET['msg'];


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
        
        <div class="container" style="margin-top: 55px;">
        <div class="row">
            <div class="col-xs-12 col-md-offset-4 col-md-4">
                <div class="boxarea">
                    <div class="insideholder">
                        <h3>Student Management System</h3>
                        <hr>
                        <?php if($msg == "loginerror"){ ?>
                        <div class="alert alert-danger"><strong>Error!</strong> Please check your login credentials and re-enter.</div>
                        <?php } elseif ($msg == "pleaselogin") { ?>
                        <div class="alert alert-warning"><strong>Please Login!</strong>You have not signed in or your session has expired.</div>    
                        <?php }?>
                        <form method="post" action="authenticate.php">
                            <div class="form-group">
                                <input type="text" class="form-control" name="userId" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>  
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
<!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
<!-- End -->



