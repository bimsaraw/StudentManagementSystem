<div class="boxarea">
    <div class="insideholder">
        <ul class="nav nav-pills nav-stacked">
            <li class="<?php if($breadcrumb=="home"){ echo "active"; } ?>"><a href="index.php"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Home</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-calendar"></span>&nbsp;&nbsp;Attendance
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="addcourse.php">Mark Attendance</a></li>
                    <li><a href="editcourse.php">Student Attendance Report</a></li>
                </ul>
            </li>            
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-education"></span>&nbsp;&nbsp;Students
                <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="addstudent.php">Add</a></li>
                        <li><a href="viewstudent.php">View</a></li>                       
                        <li><a href="#">Create Batch</a></li>
                        <li><a href="#">Export to SaegisOnline</a></li>
                    </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-euro"></span>&nbsp;&nbsp;Payments
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="newpayment.php">New Payment</a></li>
                    <li><a href="#">Fees Structures</a></li>
                    <li><a href="paymentreports.php">Payment Reports</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Courses
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="addcourse.php">Add Course</a></li>
                    <li><a href="editcourse.php">Edit/Remove Course</a></li>
                    <li><a href="#">Assign Students/Batch</a></li>
                </ul>
            </li>
            <li class="<?php if($breadcrumb=="leavebalance"){ echo "active"; } ?>"><a href="leavebalance.php"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;View Leave Balance</a></li>
        </ul>
    </div>
</div>