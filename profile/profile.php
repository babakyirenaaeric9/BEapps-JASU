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
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../active/style.css"></head>
<body>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">WELCOME: <span id="username"><?php echo $user_data['surname'] ." ". $user_data['middlename']. " " . $user_data['lastname']?>,     </span> <span id="usertype">     User Type: <?php echo $user_data['usertype']?></span></a>
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
                            
                            <a class="dropdown-item" href="https://stu.edu.gh/bkapps/pages/students/">STU Student Portal</a>
                            <li><a class="dropdown-item" href="../logout/logout.php">Logout</a></li>
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
                    <div>
                        


                        <br>
                        <hr>
                        <br>
                        <div class="main_body">
                            <center>
                            <?php/* echo "<img src='{$user_data['passport']}' alt='passport' width='30px' height='50px' " */?>
                            </center>


                                                <div class="input_box">
                                                    <p><b>Full Name : </b> <strong><?php echo $user_data['surname'] ." ". $user_data['middlename']. " " . $user_data['lastname']?></strong></p>
                                                    
                                                </div>

                                                <div class="input_box">
                                                    <p><b>Student/admins ID :</b> <strong><?php echo $user_data['student_id']?></strong></p>
                                                    
                                                </div>

                                                <div class="input_box">
                                                    <p><b>Date Of Birth :</b><strong><?php echo $user_data['dob']?></strong></p>
                                                    
                                                </div>

                                                <div class="input_box">
                                                    <p><b>Gender : <strong><?php echo $user_data['gender']?></strong></b></p>
                                                </div>

                                                <div class="input_box">
                                                    <p><b>E-mail:</b><strong><?php echo $user_data['email']?></strong></p>
                                                </div>

                                                <div class="input_box">
                                                    <p><b>Phone Number :</b><strong><?php echo $user_data['phone']?></strong></p>
                                                </div>

                                                

                                                <div class="input_box">
                                                    <p><b>Residential Address :</b> <strong><?php echo $user_data['region'] .", ". $user_data['municipal']. ", " . $user_data['hometown']?></strong></p>
                                                </div>

                                                <div class="input_box">
                                                    <p><b>Region, District & Hometown :</b><strong><?php echo $user_data['region'] .", ". $user_data['municipal']. ", " . $user_data['hometown']?></strong></p>
                                                </div>

                                                <div class="input_box">
                                                    <p><b>Date Account Was Created :</b> <strong><?php echo $user_data['data_of_signup']?></strong</p>
                                                </div>
                                                <br>
                                                

                                                <footer>
                                                    This website is designed by Babakyirenaa Eric <img src="../images/pass.jpg" alt="passport of me" width="50px">
                                                </footer>
                    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>