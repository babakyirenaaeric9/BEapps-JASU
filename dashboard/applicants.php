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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DB Administrators Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../active/style.css">
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
        <center>
            <img src="../../images/stu_jasu.png" alt="LOGO" style="width: 150px;">
            <h1>SUNYANI TECHNICAL UNIVERSITY</h1>
            <h2>JIRAPA AREA STUDENTS UNION (JASU)</h2>
            
        </center>

        <div></div>
            
            <hr>

            <div class="abt_us">
                <center>
                    <h2>Applicante Information</h2>
                </center>

                <table border="black">
                    <thead>
                        <th>S/N</th>
                        <th>DB Admin ID</th>
                        <th>Fullname</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>See More</th>
                        <th>delete</th>
                        <th>update</th>

                        

                    </thead>

                    <tbody>
                    <?php
// Ensure database connection exists
if (!isset($conn)) {
    die("Database connection not established.");
}

$sql = "SELECT * FROM applicant_info";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Ensure keys exist before accessing them
        $id = isset($row['id']) ? $row['id'] : 'N/A';
        $student_id = isset($row['student_id']) ? $row['student_id'] : 'N/A';
        $surname = isset($row['surname']) ? $row['surname'] : 'N/A'; // FIXED
        $middlename = isset($row['middlename']) ? $row['middlename'] : 'N/A';
        $lastname = isset($row['lastname']) ? $row['lastname'] : 'N/A';
        $dob = isset($row['dob']) ? $row['dob'] : 'N/A';
        $gender = isset($row['gender']) ? $row['gender'] : 'N/A';
        $email = isset($row['email']) ? $row['email'] : 'N/A';
        $phone = isset($row['phone']) ? $row['phone'] : 'N/A';

        echo '
        <tr>
            <td>' . $id . '</td>
            <td>' . $student_id . '</td>
            <td>' . $surname . ' ' . $middlename . ' ' . $lastname . '</td>
            <td>' . $dob . '</td>
            <td>' . $gender . '</td>
            <td>' . $email . '</td>
            <td>' . $phone . '</td>
            <td><button class="btn btn-primary"><a href="../../info/student_info_detail.php?seemoreid=' . $id . '" class="text-light">See More</a></button></td>
            <td><button class="btn btn-danger"><a href="../../active/delete_ap.php?deleteid=' . $id . '" class="text-light">Delete</a></button></td>
            <td><button class="btn btn-primary"><a href="../../authenticate/application_form_update.php?updateid=' . $id . '" class="text-light">Update</a></button></td>
        </tr>';
    }
} else {
    echo "<tr><td colspan='10'>No records found</td></tr>";
}
?>

                    </tbody>
                </table>

            </div> 

            <br>
                <br>
                <br>
                <hr>



    </div>
    <footer>
                This website is designed by Babakyirenaa Eric <img src="../../images/pass.jpg" alt="passport of me" width="50px">
            </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>