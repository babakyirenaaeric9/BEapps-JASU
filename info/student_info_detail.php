<?php
session_start();

include ("../active/database.php");
include ("../active/function.php");

$user_data = check_login($conn);

// Validate and sanitize 'seemoreid' input
if (!isset($_GET['seemoreid']) || empty($_GET['seemoreid'])) {
    die("Invalid request: No ID provided.");
}

$id = mysqli_real_escape_string($conn, $_GET['seemoreid']); // Prevent SQL injection

// Fetch student details
$sql = "SELECT * FROM applicant_info WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    print_r ($id); 
    die("Error: No data found for the given ID.");
}

$row = mysqli_fetch_assoc($result);

// Safely access data with fallback values
$student_id = $row['student_id'] ?? 'N/A';
$surname = $row['surname'];  // Fixed: 'firstname' → 'surname'
$middlename = $row['middlename'] ?? 'N/A';
$lastname = $row['lastname'] ?? 'N/A';
$dob = $row['dob'] ?? 'N/A';
$gender = $row['gender'] ?? 'N/A';
$email = $row['email'] ?? 'N/A';
$phone = $row['phone'] ?? 'N/A';
$maritalstatus = $row['maritalstatus'] ?? 'N/A';
$noofchildren = $row['NoOfChildren'] ?? 'N/A';
$disability = $row['disability'] ?? 'N/A';
$describedisability = $row['describe_disability'] ?? 'N/A';
$residencialaddress = $row['residentialAddress'] ?? 'N/A';
$hometown = $row['hometown'] ?? 'N/A';
$district = $row['district'] ?? 'N/A';
$region = $row['region'] ?? 'N/A';
$wdynts = $row['WDYNTS'] ?? 'N/A';
$wdytwsgyts = $row['WDYTWSGYTS'] ?? 'N/A';

// Father's information
$f_fullname = $row['f_fullname'] ?? 'N/A';
$f_nationality = $row['f_nationality'] ?? 'N/A';
$f_district = $row['f_district'] ?? 'N/A';
$f_hometown = $row['f_hometown'] ?? 'N/A';
$f_phone = $row['f_phone'] ?? 'N/A';
$f_email = $row['f_email'] ?? 'N/A';
$f_address = $row['f_address'] ?? 'N/A';
$f_livedeceased = $row['f_livedeceased'] ?? 'N/A';
$f_occupation = $row['f_occupation'] ?? 'N/A';

// Mother's information
$m_fullname = $row['m_fullname'] ?? 'N/A';
$m_nationality = $row['m_nationality'] ?? 'N/A';
$m_district = $row['m_district'] ?? 'N/A';
$m_hometown = $row['m_hometown'] ?? 'N/A';
$m_phone = $row['m_phone'] ?? 'N/A';
$m_email = $row['m_email'] ?? 'N/A';
$m_address = $row['m_address'] ?? 'N/A';
$m_livedeceased = $row['m_livedeceased'] ?? 'N/A';
$m_occupation = $row['m_occupation'] ?? 'N/A';



//document
$wassce = $row['wassce'];
$transcript = $row['transcript'];
$resultslip = $row['resultslip'];
$studentIdcard = $row['studentIdcard'];
$duesreciept = $row['duesreciept'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../active/style.css">

    <style>
        .table thead {
            background-color: #28a745;
            color: white;
        }
    </style>
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
                <h3>Applicant Information</h3>
            </center>




            <br>
            <hr>
            <br>
            <center>

            <div class="container mt-4">
        <h2 class="text-center text-success">Applicant Information</h2>
        <div class="photo">
            <?php 
                $res = "SELECT passport FROM signup WHERE student_id = '$student_id' ";
                $re = mysqli_query($conn, $res);
                $data = mysqli_fetch_assoc($re);

             //echo " <img src={'$data['passport']'} >";
             ?>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Field</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <tr><td><b>Student ID</b></td><td><?php echo $student_id; ?></td></tr>
                <tr><td><b>Full Name</b></td><td><?php echo "$surname $middlename $lastname"; ?></td></tr>
                <tr><td><b>Date of Birth</b></td><td><?php echo $dob; ?></td></tr>
                <tr><td><b>Gender</b></td><td><?php echo $gender; ?></td></tr>
                <tr><td><b>Email</b></td><td><?php echo $email; ?></td></tr>
                <tr><td><b>Phone Number</b></td><td><?php echo $phone; ?></td></tr>
                <tr><td><b>Marital Status</b></td><td><?php echo $maritalstatus; ?></td></tr>
                <tr><td><b>Number of Children</b></td><td><?php echo $noofchildren; ?></td></tr>
                <tr><td><b>Disability</b></td><td><?php echo $disability; ?></td></tr>
                <tr><td><b>Disability Description</b></td><td><?php echo $describedisability; ?></td></tr>
                <tr><td><b>Residential Address</b></td><td><?php echo $residencialaddress; ?></td></tr>
                <tr><td><b>District & Hometown</b></td><td><?php echo "$region, $district"; ?></td></tr>
            </tbody>
        </table>

        <h2 class="text-center text-success">Parents Information</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Field</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <tr><td><b>Father's Name</b></td><td><?php echo $f_fullname; ?></td></tr>
                <tr><td><b>Father's Nationality</b></td><td><?php echo $f_nationality; ?></td></tr>
                <tr><td><b>Father's District & Hometown</b></td><td><?php echo "$f_district, $f_hometown"; ?></td></tr>
                <tr><td><b>Father's Phone</b></td><td><?php echo $f_phone; ?></td></tr>
                <tr><td><b>Father's Email</b></td><td><?php echo $f_email; ?></td></tr>
                <tr><td><b>Father's Address</b></td><td><?php echo $f_address; ?></td></tr>
                <tr><td><b>Father's Life Status</b></td><td><?php echo $f_livedeceased; ?></td></tr>
                <tr><td><b>Father's Occupation</b></td><td><?php echo $f_occupation; ?></td></tr>
                <tr><td><b>Mother's Name</b></td><td><?php echo $m_fullname; ?></td></tr>
                <tr><td><b>Mother's Nationality</b></td><td><?php echo $m_nationality; ?></td></tr>
                <tr><td><b>Mother's District & Hometown</b></td><td><?php echo "$m_district, $m_hometown"; ?></td></tr>
                <tr><td><b>Mother's Phone</b></td><td><?php echo $m_phone; ?></td></tr>
                <tr><td><b>Mother's Email</b></td><td><?php echo $m_email; ?></td></tr>
                <tr><td><b>Mother's Address</b></td><td><?php echo $m_address; ?></td></tr>
                <tr><td><b>Mother's Life Status</b></td><td><?php echo $m_livedeceased; ?></td></tr>
                <tr><td><b>Mother's Occupation</b></td><td><?php echo $m_occupation; ?></td></tr>
            </tbody>
        </table>

        <h2 class="text-center text-success">Guardian Information</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Field</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <tr><td><b>Guardian's Name</b></td><td><?php echo $row['g_fullname']; ?></td></tr>
                <tr><td><b>Guardian's Email</b></td><td><?php echo $row['g_email']; ?></td></tr>
                <tr><td><b>Guardian's Phone</b></td><td><?php echo $row['g_phone']; ?></td></tr>
                <tr><td><b>Guardian's Address</b></td><td><?php echo $row['g_address']; ?></td></tr>
                <tr><td><b>Guardian's Region, District & Hometown</b></td><td><?php echo "$row[g_region], $row[g_district]"; ?></td></tr>
                <tr><td><b>Relation to Guardian</b></td><td><?php echo $row['relationToGuardian']; ?></td></tr>
                <tr><td><b>Guardian's Employment Status</b></td><td><?php echo $row['g_employmentstatus']; ?></td></tr>
            </tbody>
        </table>
    </div>

                <center>
                    <h2>Applicant Educational Information</h2>
                </center>
                <table border="black">
                <table class="table table-bordered">
    <thead class="table-success">
        <tr>
            <th>Info Details</th>
            <th>Data</th>
            <th>Download</th>
            <th>Open</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Department</td>
            <td><?php echo $row['department'] ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Program</td>
            <td><?php echo $row['program'] ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Year Of Admission</td>
            <td><?php echo $row['year_of_admission'] ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Year Of Completion</td>
            <td><?php echo $row['year_of_completion'] ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Level</td>
            <td><?php echo $row['level'] ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Course Duration</td>
            <td><?php echo $row['duration'] ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
    <td>WASSCE</td>
    <td></td>
    <td><a href="download_pdf.php?id=<?php  ?>" class="btn btn-primary">Download PDF</a></td>
    <td><a href="view_pdf.php?id=<?php  ?>" target="_blank" class="btn btn-success">Open PDF</a></td>
</tr>
<tr>
    <td>Transcript</td>
    <td></td>
    <td><a href="download_pdf.php?id=<?php ?>" class="btn btn-primary">Download PDF</a></td>
    <td><a href="view_pdf.php?id=<?php  ?>" target="_blank" class="btn btn-success">Open PDF</a></td>
</tr>
<tr>
    <td>Result Slip</td>
    <td></td>
    <td><a href="download_pdf.php?id=<?php  ?>" class="btn btn-primary">Download PDF</a></td>
    <td><a href="view_pdf.php?id=<?php  ?>" target="_blank" class="btn btn-success">Open PDF</a></td>
</tr>
<tr>
    <td>Scanned Student ID</td>
    <td></td>
    <td><a href="download_pdf.php?id=<?php  ?>" class="btn btn-primary">Download PDF</a></td>
    <td><a href="view_pdf.php?id=<?php  ?>" target="_blank" class="btn btn-success">Open PDF</a></td>
</tr>
<tr>
    <td>Dues Receipts</td>
    <td></td>
    <td><a href="download_pdf.php?id=<?php  ?>" class="btn btn-primary">Download PDF</a></td>
    <td><a href="view_pdf.php?id=<?php  ?>" target="_blank" class="btn btn-success">Open PDF</a></td>
</tr>

    </tbody>
</table>
            </center>
            <br>

    </div>
    <footer>
                This website is designed by Babakyirenaa Eric <img src="../images/pass.jpg" alt="passport of me" width="50px">
            </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>