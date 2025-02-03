<?php
session_start();

include ("../active/database.php");
include ("../active/function.php");

$user_data = check_login($conn);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../active/style.css">
</head>
<body>
    
<nav class="navbar navbar-expand-lg fixed-top px-5" >
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                WELCOME: <span id="username"><?php echo $user_data['surname'] ." ". $user_data['middlename']. " " . $user_data['lastname']; ?></span>, 
                <span id="usertype">User Type: <?php echo $user_data['usertype']; ?></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../helps/learn_more.php">Learn More</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../helps/contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menu
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../profile/profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="https://stu.edu.gh/">STU Portal</a></li>
                            <li><a class="dropdown-item" href="../active/logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    
    <br>
    <br>
    <br>
    <br>
    <br>



    <div class="wrapper">
        <center>
            <img src="../images/stu_jasu.png" alt="LOGO" style="width: 150px;">
            <h1>SUNYANI TECHNICAL UNIVERSITY</h1>
            <h2>JIRAPA AREA STUDENTS UNION (JASU)</h2>
            
        </center>
        <br>
        <hr>
        <br>

    
<center>
<h1>passport</h1>
    <div class="user_message">
        <h2>
            <b>Dear:</b> <?php echo $user_data['surname'] ." ".$user_data['lastname']." ".$user_data['middlename']  ?>,
        </h2>
        
            <?php
            $mail = $user_data['email'];
            $sid = $user_data['student_id'];
            $check = $conn->query("SELECT * FROM applicant_info WHERE student_id = '$sid'");
            if ($check->num_rows == 0) { ?>

            <h3>
                You haven't applied for the scholarship, click <a href="../authenticate/application_form.php">HERE</a> to apply
             <br>
             <b><h1>THANK YOU!!</h1></b>
            </h3>

            <?php }else{?>
                <h3>Your Application is done. You will be called or Emailed if you are qualified for the interview.
                Please also in your status from time to time to check if you are selected.</h3>
                <b><h1>THANK YOU!!</h1></b>



            <?php }?>
            
    </div>



</div>

</center>
<footer>
        This website is designed by Babakyirenaa Eric <img src="../images/pass.jpg" alt="passport of me" width="50px">
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>