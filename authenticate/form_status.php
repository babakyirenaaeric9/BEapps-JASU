<?php
session_start();
include("../active/database.php");
include("../active/function.php");

// Ensure user is logged in
$user_data = check_login($conn);
if (!$user_data) {
    header("Location: ../authenticate/login.php");
    exit();
}

$studentid = $user_data['student_id']; // This might be a student ID (string) instead of an integer

// Use prepared statement to avoid SQL injection
$stmt = $conn->prepare("SELECT * FROM applicant_info WHERE id = ?");
$stmt->bind_param("s", $studentid);  // "s" because ID might be a string (e.g., 'HOME12345')
$stmt->execute();
$result = $stmt->get_result();

// Fetch the result
$row = $result->fetch_assoc();
$stmt->close();

// Handle case where no application data is found
if (!$row) {
    die("Error: No application data found for ID: " . htmlspecialchars($studentid));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../active/style.css">

</head>
<body class="bg-light">

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


    <div class="container shadow-sm">    
        <div class="header">
            <header class="text-center py-4 mt-5">
                <img src="../images/stu_jasu.png" alt="LOGO" style="width: 150px;">
                <h1 class="mt-2">SUNYANI TECHNICAL UNIVERSITY</h1>
                <h2>JIRAPA AREA STUDENTS UNION (JASU)</h2>
                <p><?php echo date('l, F d Y'); ?></p>
            </header>
        </div>

        <h4 class="text-center text-uppercase fw-bold">2024/2025 Jirapa Area Students Uninion Schoalarship Application Status</h4>
        <br>
            <center>
            <div class="col-md-3 text-center">
                <img src="../images/pass.jpg" alt="Candidate Photo" class="rounded-circle candidate-photo">
            </div>
            </center>
        <br>
        <div class="row mt-4">
            
            <div class="col-md-9">
                
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th class="stts_fom">Candidate's Name</th>
                            <td><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']?></td>
                        </tr>
        
                        <tr>
                            <th class="stts_fom">Student ID</th>
                            <td><?php echo $row['student_id'] ?></td>
                        </tr>
                        <tr>
                            <th class="stts_fom">Date of Submission</th>
                            <td>2024-10-30 22:39:50</td>
                        </tr>
                       
                        <tr>
                            <th class="stts_fom">Processing Status</th>
                            <td>PROCESSED</td>
                        </tr>
                        <tr>
                            <th class="stts_fom">Stage Of Schoalarship Processing</th>
                            <td>Short Listing</td>
                        </tr>
                        <tr>
                            <th class="stts_fom">Department</th>
                            <td>Computer Science</td>
                        </tr>
                        <tr>
                            <th class="stts_fom">Programmebn mn hjbbn </th>
                            <td>Bachelor of Technology (B-Tech) in Wood Construction Technology (4-Year)</td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>

        <div class="text-end mt-3">
            <a href="../active/logout.php" class="btn btn-outline-secondary">Logout</a>
        </div>
    </div>

    <footer>
        This website is designed by Babakyirenaa Eric 
        <img src="../images/pass.jpg" alt="passport of me" width="50px">
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

    
</body>
</html>