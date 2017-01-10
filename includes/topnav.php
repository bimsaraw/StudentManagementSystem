<nav class="navbar navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header" style="margin-left: 15px; margin-right: 30px;">
            <div class="navbar-brand">Saegis Campus - Student Management System</div>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <?php include('session.php'); ?>              
            <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $user_check." "; ?>
            <span class="glyphicon glyphicon-log-out"></span></a>
            <ul class="dropdown-menu">
                <li><a href="logout.php">Logout</a></li>
            </ul>                           
        </ul>
    </div>
</nav>