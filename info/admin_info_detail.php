<?php
session_start();

include ("../active/database.php");
include ("../active/function.php");

$user_data = check_login($conn);

$id = $_GET['seemoreid'];

$sql = "SELECT * FROM signup where id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$surname = $row['surname'];
$middlename = $row['middlename'];
$lastname = $row['lastname'];
$student_id = $row['student_id'];
$gender = $row['gender'];
$email = $row['email'];
$phone = $row['phone'];
$region = $row['region'];
$municipal = $row['municipal'];
$hometown = $row['hometown'];
$dateofsignup = $row['data_of_signup'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicante Information Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../active/style.css">
</head>
<body>


    <!-- Navbar -->
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
        <div>
            <center>
                <img src="../images/stu_jasu.png" alt="LOGO" style="width: 150px;">
                <h1>SUNYANI TECHNICAL UNIVERSITY</h1>
                <h2>JIRAPA AREA STUDENTS UNION (JASU)</h2>
                <h3>Applicante Information</h3>
            </center>

            <br>
            <hr>
                <div class="input_box">
                    <p><b>Full Name :</b> <?php echo $surname ." ". $middlename ." ". $lastname ?></p>
                    
                </div>

                <div class="input_box">
                    <p><b>Admin ID :</b>  <?php echo $student_id ?></p>
                    
                </div>

                <div class="input_box">
                    <p><b>Gender :</b> <?php echo $gender ?></p>
                </div>

                <div class="input_box">
                    <p><b>E-mail:</b> <?php echo $email ?></p>
                </div>

                <div class="input_box">
                    <p><b>Phone Number :</b> <?php echo $phone ?></p>
                </div>

                <div class="input_box">
                    <p><b>Applicant Residential Address :</b> <?php echo $region .", ". $municipal .", ". $hometown ?></p>
                </div>

                <div class="input_box">
                    <p><b>Nationality, Region, District & Hometown :</b> <?php echo $region .", ". $municipal .", ". $hometown ?></p>
                </div>

                <div class="input_box">
                    <p><b>Date Account Was Created :</b> <?php echo $dateofsignup ?></p>
                </div>

                
            <br>
            <footer>
                This website is designed by Babakyirenaa Eric <img src="../images/pass.jpg" alt="passport of me" width="50px">
            </footer>
            
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>