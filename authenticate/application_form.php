<?php
session_start();
include("../active/database.php");
include("../active/function.php");

$user_data = check_login($conn);

if (isset($_POST['submit'])) {
    /*ECHO "<PTR";
    print_r($_POST);*/
    $studentID = $_POST['studentID'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $maritalstatus = $_POST['maritalstatus'];
    $numOfChilrn = $_POST['numOfChilrn'];
    $disability = $_POST['disability'];
    $typeofdisability = $_POST['typeofdisability'];
    $address = $_POST['address'];
    $hometown = $_POST['hometown'];
    $district = $_POST['district'];
    $region = $_POST['region'];
    $reason = $_POST['reason'];
    $reasonTW = $_POST['reasonTW'];
    $signid = $_POST['signid'];

    // Father
    $f_fullname = $_POST['f_fullname'];
    $f_nationality = $_POST['f_nationality'];
    $f_district = $_POST['f_district'];
    $f_hometown = $_POST['f_hometown'];
    $f_phone = $_POST['f_phone'];
    $f_email = $_POST['f_email'];
    $f_address = $_POST['f_address'];
    $f_alivedeceased = $_POST['f_alivedeceased'];
    $f_occupation = $_POST['f_occupation'];

    // Mother
    $m_fullname = $_POST['m_fullname'];
    $m_nationality = $_POST['m_nationality'];
    $m_district = $_POST['m_district'];
    $m_hometown = $_POST['m_hometown'];
    $m_phone = $_POST['m_phone'];
    $m_email = $_POST['m_email'];
    $m_address = $_POST['m_address'];
    $m_alivedeceased = $_POST['m_alivedeceased'];
    $m_occupation = $_POST['m_occupation'];

    // Guardian
    $g_name = $_POST['g_name'];
    $g_email = $_POST['g_email'];
    $g_phone = $_POST['g_phone'];
    $g_address = $_POST['g_address'];
    $g_region = $_POST['g_region'];
    $g_district = $_POST['g_district'];
    $g_relation = $_POST['g_relation'];
    $g_employmentStatus = $_POST['g_employmentStatus'];

    // School
    $department = $_POST['department'];
    $program = $_POST['program'];
    $YearOfAdmission = $_POST['YearOfAdmission'];
    $YearOfCompletion = $_POST['YearOfCompletion'];
    $year = $_POST['year'];
    $duration = $_POST['duration'];

    // Document uploads
    $wassce = addslashes(file_get_contents($_FILES['wassce']['tmp_name']));
    $transcript = addslashes(file_get_contents($_FILES['transcript']['tmp_name']));
    $resultslip = addslashes(file_get_contents($_FILES['resultslip']['tmp_name']));
    $studentIdcard = addslashes(file_get_contents($_FILES['studentIdcard']['tmp_name']));
    $duesreciept = addslashes(file_get_contents($_FILES['duesreciept']['tmp_name']));

    // Check for duplicate records
    //$signid = $user_data['id'];

    // Check if the applicant already exists
$check = $conn->query("SELECT * FROM applicant_info WHERE email = '$email' OR student_id = '$studentID'");
if ($check->num_rows > 0) {
    echo "<script>alert('Details already exist.');</script>";
} else {
    // Insert query
    $sql = "INSERT INTO applicant_info (student_id, firstname, middlename, lastname, dob, gender, email, phone, maritalstatus, NoOfChildren, 
        disability, describe_disability, residentialAddress, hometown, district, region, WDYNTS, WDYTWSGYTS, 
        f_fullname, f_nationality, f_district, f_hometown, f_phone, f_email, f_address, f_livedeceased, 
        f_occupation, m_fullname, m_nationality, m_district, m_hometown, m_phone, m_email, m_address, 
        m_livedeceased, m_occupation, g_fullname, g_email, g_phone, g_address, g_region, g_district, 
        relationToGuardian, g_employmentstatus, department, program, year_of_admission, year_of_completion, 
        level, duration, wassce, transcript, resultslip, studentIdcard, duesreciept, signid
    ) VALUES ('$studentID', '$firstname', '$middlename', '$lastname', '$date', '$gender', '$email', '$phone', '$maritalstatus', '$numOfChilrn', '$disability', '$typeofdisability', '$address', '$hometown', '$district', '$region', '$reason', '$reasonTW', '$f_fullname', '$f_nationality', '$f_district', '$f_hometown', '$f_phone', '$f_email', '$f_address', '$f_alivedeceased', '$f_occupation', '$m_fullname', '$m_nationality', '$m_district', '$m_hometown', '$m_phone','$m_email', '$m_address', '$m_alivedeceased', '$m_occupation', '$g_name', '$g_email', '$g_phone', '$g_address', '$g_region', '$g_district', '$g_relation', '$g_employmentStatus', '$department', '$program', '$YearOfAdmission', '$YearOfCompletion', '$year', '$duration', '$wassce', '$transcript', '$resultslip', '$studentIdcard', '$duesreciept', '$signid')";

    // Prepare the statement
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Data inserted successfully');</script>";
        header("location: ../dashboard/dashboard_student.php");
    }else {
        echo "<script>alert('Data not properly inserted');</script>";
    }

    // Close the statement
    $stmt->close();
}

}
?>


<?php 

/*$check = $conn->query("SELECT * FROM applicant_info WHERE email = '$email' OR student_id = '$studentID'");
if ($check->num_rows > 0) {
    echo "<script>alert('You Are Already An Applicant.');</script>";
} else { */?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Applicant Information</title>
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
                <h3>Applicant Information</h3>
            </center>

            <hr>

        <!-- Form -->
        <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                <h3 class="text-center">Fill Form</h3>
            <form action="#" method="POST" enctype="multipart/form-data">
                <fieldset class="border p-2">
                    <legend class="col-form-label text-primary">PERSONAL INFORMATION</legend>
                    <div class="mb-3">
                            <label for="studentID" class="form-label">ID</label>
                            <input type="text" readonly value="<?php echo $user_data['id']?>" class="form-control" id="signid" name="signid" maxlength="20" required>
                        </div>
                    <div class="mb-3">
                            <label for="studentID" class="form-label">Student ID</label>
                            <input type="text" readonly value="<?php echo $user_data['student_id']?>" class="form-control" id="studentID" name="studentID" maxlength="20" required>
                        </div>
                    <div class="input_box">
                        <label for="" class="form-label">First Name <b style="color: red;">*</b></label><br>
                        <input type="text" readonly name="firstname" value="<?php echo $user_data['surname']?>" class="form-control" placeholder="Enter Your First Name" required>
                    </div>
    
                    <div class="input_box">
                        <label for=""class="form-label">Middle Name</label><br>
                        <input type="text" name="middlename" readonly value="<?php echo $user_data['middlename']?>" class="form-control" placeholder="Enter Your Middle Name">
                    </div>

                    <div class="input_box">
                        <label for="" class="form-label">Last Name</label><br>
                        <input type="text" name="lastname" readonly value="<?php echo $user_data['lastname']?>" class="form-control" placeholder="Enter Your Middle Name">
                    </div>
    
                    <div class="input_box">
                        <label for="" class="form-label">Date Of Birth <b style="color: red;">*</b></label><br>
                        <input type="date" name="date" readonly value="<?php echo $user_data['dob']?>" class="form-control" placeholder="Enter Your Date Of Birth" required>
                    </div>
    
                    <div class="input_box">
                        <label for="" class="form-label">Gender <b style="color: red;">*</b></label><br>
                        <select name="gender" class="form-select" id="" required>
                            <option disabled selected>Choose Your Gender</option>
                            <Option readonly value="<?php echo $user_data['gender']?>"><?php echo $user_data['gender']?></option>
                        </select>
                    </div>
    
                    <div class="input_box">
                        <label for="">Email <b style="color: red;">*</b></label><br>
                        <input type="email" name="email" readonly value="<?php echo $user_data['email']?>" class="form-control" placeholder="Enter Your Active Email" required>
                    </div>
    
                    <div class="input_box">
                        <label for="" class="form-label">Tell. Number<b style="color: red;">*</b></label><br>
                        <input type="text" name="phone" readonly value="<?php echo $user_data['phone']?>" class="form-control" placeholder="Enter Your Active Phone Number" required>
                    </div>
    
                    <div class="input_box">
                        <label for="" class="form-label">Marital Status<b style="color: red;">*</b></label><br>
                        <select name="maritalstatus" class="form-select" id="" required>
                            <option disabled selected>Select one</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Single">Single</option>
                        </select>
                    </div>
    
                    <div class="input_box">
                        <label for="" class="form-label">If married, Enter Number of Children<b style="color: red;">*</b></label><br>
                        <input type="number" name="numOfChilrn" class="form-control" placeholder="Enter Your Number Of Childrem">
                    </div>
    
                    <div class="input_box" class="input_box">
                        <label for="" class="form-label">Do Your Have Any form of Disabilities<b style="color: red;">*</b></label><br>
                        <select name="disability" class="form-select" id="" required>
                            <option value="" disabled selected>Choose An Option</option>
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                        </select>
                        
                        <div class="input_box">
                            <label for="" class="form-label">If Yes, State The Type Of disability</label><br>
                            <input type="text" name="typeofdisability" class="form-control" placeholder="State Type Of disability">
                        </div>
                    </div>
                    
                </fieldset class="border p-2">
               
                <fieldset class="border p-2">
                    <legend class="col-form-label text-primary">Residence</legend>
                    <div class="mb-3">
                        <label for="" class="form-label">Residencial Address<b style="color: red;">*</b></label><br>
                        <input type="text" name="address" class="form-control" placeholder="Enter Your Residencial Address" required>
                    </div>
    
                    <div class="mb-3">
                        <label for="" class="form-label">Town & Hometown<b style="color: red;">*</b></label><br>
                        <input type="text" name="hometown" readonly value="<?php echo $user_data['hometown']?>" class="form-control" placeholder="Enter Your Hometown" required>
                    </div>
    
                    <div class="mb-3">
                        <label for="" class="form-label">District<b style="color: red;">*</b></label><br>
                        <input type="text" name="district" readonly value="<?php echo $user_data['municipal']?>" class="form-control" placeholder="Enter Your District" required>
                    </div>
    
                    <div class="input_box">
                        <label for="" class="form-label">Region<b style="color: red;">*</b></label><br>
                        <input type="text" name="region" readonly value="<?php echo $user_data['region']?>" class="form-control" placeholder="Enter Your Region" required>
                    </div>
                </fieldset>
    
                <fieldset class="border p-2">
                    <legend class="col-form-label text-primary">Required Information </legend><br>
                    <div class="mb-3">
                        <label for="" class="form-label">Why Do You Need The Scholarship?<b style="color: red;">*</b></label><br>
                        <textarea name="reason" class="form-control" id="" rows="5" cols="40" placeholder="Tell Us Why You Really Need This Scholarship" required>
                            
                        </textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="" class="form-label">Why Do You Think We Should Give You the Scholarship?<b style="color: red;">*</b></label><br>
                        <textarea name="reasonTW" class="form-control" id="" rows="5" cols="40" placeholder="Tell Us Why You Think We Should Give You This Scholarship" required>
                            
                        </textarea>
                    </div>
                </fieldset>

                <center>
                    <h2>PARENTS INFORMATION</h2>
                </center>
                <fieldset class="border p-2">
                    <legend class="col-form-label text-primary">FATHER</legend>
                    <div class="mb-3">
                        <label for="" class="form-label">Full Name<b style="color: red;">*</b></label><br>
                        <input type="text" name="f_fullname" class="form-control" placeholder="Enter Father's Fullname" required>
                    </div>
    
                    <div class="mb-3">
                        <label for="" class="form-label">Nationality<b style="color: red;">*</b></label><br>
                        <input type="text" name="f_nationality" class="form-control" placeholder="Enter Father's Nationality" required>
                    </div>
    
                    <div class="input_box">
                        <label for="" class="form-label">District<b style="color: red;">*</b></label><br>
                        <input type="text" name="f_district" class="form-control" placeholder="District" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Hometown<b style="color: red;">*</b></label><br>
                        <input type="text" name="f_hometown" class="form-control" placeholder="Enter Father's hometown" required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Tell. Number<b style="color: red;">*</b></label><br>
                        <input type="number" name="f_phone" class="form-control" placeholder="Enter Father's Phone Number" required>
                    </div>
    
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label><br>
                        <input type="email" name="f_email" class="form-control" placeholder="Enter Father's Email" >
                    </div>
    
                    <div class="mb-3">
                        <label for="" class="form-label">Address<b style="color: red;">*</b></label><br>
                        <input type="text" name="f_address" class="form-control" placeholder="Enter Father's Address" required>
                    </div>


                    <div class="mb-3">
                        <label for="" class="form-label">Alive Or Deceased<b style="color: red;">*</b></label><br>
                        <select name="f_alivedeceased" class="form-select" id="">
                        <option disabled selected>Select Status</option>
                            <option value="Alive">Alive</option>
                            <option value="Deceased">Deceased</option>
                        </select>
                    </div>
    
                    
    
                    <div class="mb-3">
                        <label for="" class="form-label">Occupation<b style="color: red;">*</b></label><br>
                        <input type="text" name="f_occupation" class="form-control" placeholder="Enter Father's Occupation" required>
                    </div>
                </fieldset>
                <br>
                <hr>
                <br>
    
                <fieldset class="border p-2">
                    <legend class="col-form-label text-primary">MOTHER</legend>
                    <div class="mb-3">
                        <label for="" class="form-label">Full Name<b style="color: red;">*</b></label><br>
                        <input type="text" name="m_fullname" class="form-control" placeholder="Enter Father's Fullname" required>
                    </div>
    
                    <div class="mb-3">
                        <label for="" class="form-label">Nationality<b style="color: red;">*</b></label><br>
                        <input type="text" name="m_nationality" class="form-control" placeholder="Enter Father's Nationality" required>
                    </div>
    
                    <div class="mb-3">
                        <label for="" class="form-label">District<b style="color: red;">*</b></label><br>
                        <input type="text" name="m_district" class="form-control" placeholder="District" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Hometown<b style="color: red;">*</b></label><br>
                        <input type="text" name="m_hometown" class="form-control" placeholder="Enter Father's hometown" required>
                    </div>

                    <div class="input_box">
                        <label for="" class="form-label">Tell. Number<b style="color: red;">*</b></label><br>
                        <input type="number" name="m_phone" class="form-control" placeholder="Enter Father's Phone Number" required>
                    </div>
    
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label><br>
                        <input type="email" name="m_email" class="form-control" placeholder="Enter Father's Email" >
                    </div>
    
                    <div class="mb-3">
                        <label for="" class="form-label">Address<b style="color: red;">*</b></label><br>
                        <input type="text" name="m_address" class="form-control" placeholder="Enter Father's Address" required>
                    </div>


                    <div class="mb-3">
                        <label for="" class="form-label">Alive Or Deceased<b style="color: red;">*</b></label><br>
                        <select name="m_alivedeceased" class="form-select" id="">
                            <option disabled selected>Select Status</option>
                            <option value="Alive">Alive</option>
                            <option value="Deceased">Deceased</option>
                        </select>
                    </div>
    
                    
    
                    <div class="mb-3">
                        <label for="" class="form-label">Occupation<b style="color: red;">*</b></label><br>
                        <input type="text" name="m_occupation" class="form-control" placeholder="Enter Father's Occupation" required>
                    </div>
                </fieldset>

                <center>
                   <H2>GUARDIAN INFORMATION</H2>
                </center>

                <fieldset class="border p-2">
                <legend class="col-form-label text-primary">GUARDIAN INFORMATION</legend>
                <div class="mb-3">
                    <label for="" class="form-label">Guardian Name<b style="color: red;">*</b></label><br>
                <input type="text" name="g_name" class="form-control" placeholder="Enter Guardian Name" required>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Guardian Email<b style="color: red;">*</b></label><br>
                    <input type="email" name="g_email" class="form-control" placeholder="Enter Guardian Email" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Guardian Phone<b style="color: red;">*</b></label><br>
                    <input type="number" name="g_phone" class="form-control" placeholder="Enter Guardian Phone Number" required>
                </div>

                <div class="mb-3">
                    <label for="">Guardian Address<b style="color: red;">*</b></label><br>
                <input type="text" name="g_address" class="form-control" placeholder="Enter Guardian Address" required>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Region<b style="color: red;">*</b></label><br>
                <input type="text" name="g_region" class="form-control" placeholder="Enter Region" required>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">District<b style="color: red;">*</b></label><br>
                <input type="text" name="g_district" class="form-control" placeholder="Enter Guardian District" required>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Relation eg  Aunt, Father etc<b style="color: red;">*</b></label><br>
                <input type="text" name="g_relation" class="form-control" placeholder="Enter Relationship To Guardian" required>
                </div>
                
                <div class="mb-3">
                    <label for="" class="form-label">Guardian Employment Status<b style="color: red;">*</b></label><br>
                <input type="text" name="g_employmentStatus" class="form-control" placeholder="Enter Guardian Employment Status" required>
                </div>


                <center>
                <h2>EDUCATIONAL INFORMATION</h2>
                </center>
                <fieldset class="border p-2">
                    <legend class="col-form-label text-primary">Educational Info</legend>
                    <div class="mb-3">
                        <label for="" class="form-label">Department<b style="color: red;">*</b></label><br>
                        <input type="text" name="department" class="form-control" placeholder="Enter your Department" required>
                    </div>
        
                    <div class="mb-3">
                        <label for="" class="form-label">Program<b style="color: red;">*</b></label><br>
                        <input type="text" name="program" class="form-control" placeholder="Enter your Program" required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Year Of Admission<b style="color: red;">*</b></label><br>
                        <input type="text" name="YearOfAdmission" class="form-control" placeholder="Enter your Of Admission" required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Year Of Completion<b style="color: red;">*</b></label><br>
                        <input type="text" name="YearOfCompletion" class="form-control" placeholder="Enter your Of Completion" required>
                    </div>
        
                    <div class="mb-3">
                        <label for="" class="form-label">Year Or Level<b style="color: red;">*</b></label><br>
                        <input type="text" name="year" class="form-control" placeholder="Enter your Year Or Level" required>
                    </div>
        
                    <div class="mb-3">
                        <label for="" class="form-label">What is the Duration Of The Course<b style="color: red;">*</b></label><br>
                        <input type="text" name="duration" class="form-control" placeholder="Enter The Duration Of The Course" required>
                    </div>
                </fieldset>



                <center>
                <h2>SUPPORTING DOCUMENTS</h2>
                <p style="color: red"><b>NOTE:</b> All documents must be in a pdf format.</p>

                </center>

                <fieldset class="border p-2">
                <legend class="col-form-label text-primary">Upload Neccesary Document</legend>

                <div class="mb-3">
                        <label for="" class="form-label">Upload WASSCE Certificate<b style="color: red;">*</b></label><br>
                        <input type="file" name="wassce" class="form-control" accept=".pdf" required>
                    </div>
    
                    <div class="mb-3">
                        <label for="" class="form-label">Upload Stamped Transcript<b style="color: red;">*</b></label><br>
                        <input type="file" name="transcript" class="form-control" accept=".pdf" required>
                    </div>
    
                    <div class="mb-3">
                        <label for="" class="form-label">Upload STU Result slip<b style="color: red;">*</b></label><br>
                        <input type="file" name="resultslip" class="form-control" accept=".pdf" required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Upload Scanned Copy of Studend ID<b style="color: red;">*</b></label><br>
                        <input type="file" name="studentIdcard" class="form-control" accept=".pdf" required>
                    </div>
    
                    <div class="mb-3">
                        <label for="" class="form-label">Upload Scanned Copy of All Your Dues Reciept<b style="color: red;">*</b></label><br>
                        <input type="file" name="duesreciept" class="form-control" accept=".pdf" required>
                    </div>
                </fieldset>


                    <input type="submit" value="Proceed" name="submit" class="btn btn-success w-100">
            </form>
            </div>
            </div>
        </div>
    </div>
         
            <br>
            <br>
            <hr>
            
        </div>
    </div>
            <footer>
                This website is designed by Babakyirenaa Eric <b>(BE TECH)</b>  <img src="../images/pass.jpg" alt="passport of me" width="50px">
            </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

