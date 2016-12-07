<!DOCTYPE html>
<?php $breadcrumb = "" ?>
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
                            <form class="form-horizontal" method="post" action="">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="CourseId">Course ID:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="courseId" name="CourseId" value="<?php echo $result['CourseId']; ?>" placeholder="Enter an unique course Id" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="Name">Course Name:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Name" name="Name" value="<?php echo $result['Name']; ?>" placeholder="Enter the course name" required>
                                    </div>
                                </div>   
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="Duration">Duration:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Duration" name="Duration" value="<?php echo $result['Duration']; ?>" placeholder="Enter the course duration as months" required>
                                    </div>
                                </div>    
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="Duration">Duration:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Duration" name="Duration" value="<?php echo $result['Duration']; ?>" placeholder="Enter the course duration as months" required>
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


