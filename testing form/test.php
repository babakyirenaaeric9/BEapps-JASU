<?php
include("../active/database.php");
include("../active/function.php");


    if(isset($_POST['submit'])){
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


                $check = $conn->query("SELECT * FROM applicant_info WHERE email = '$email' OR student_id = '$studentID'");
        if ($check->num_rows > 0) {
            echo "<script>alert('Details already exist.');</script>";
        } else {
            // Insert query
            $sql = "INSERT INTO applicant_info (
                student_id, firstname, middlename, lastname, dob, gender, email, phone, maritalstatus, NoOfChildren, 
                disability, describe_disability, residentialAddress, hometown, district, region, WDYNTS, WDYTWSGYTS) ALUES ('$studentID', '$firstname', '$middlename', '$lastname', '$date', '$gender', '$email', '$phone', '$maritalstatus', '$numOfChilrn', '$disability', '$typeofdisability', '$address', '$hometown', '$district', '$region', '$reason', '$reasonTW')
                }
            }
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>testing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../active/style.css">
</head>
<body>


<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <h3 class="text-center">Sign Up</h3>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="studentID" class="form-label">Student ID</label>
                            <input type="text"  value="" class="form-control" id="studentID" name="studentID" maxlength="20" required>
                        </div>
                    <div class="input_box">
                        <label for="" class="form-label">First Name <b style="color: red;">*</b></label><br>
                        <input type="text"  name="firstname" value="" class="form-control" placeholder="Enter Your First Name" required>
                    </div>
    
                    <div class="input_box">
                        <label for=""class="form-label">Middle Name</label><br>
                        <input type="text" name="middlename"  value="" class="form-control" placeholder="Enter Your Middle Name">
                    </div>

                    <div class="input_box">
                        <label for="" class="form-label">Last Name</label><br>
                        <input type="text" name="lastname"  value="" class="form-control" placeholder="Enter Your Middle Name">
                    </div>
    
                    <div class="input_box">
                        <label for="" class="form-label">Date Of Birth <b style="color: red;">*</b></label><br>
                        <input type="date" name="date"  value="" class="form-control" placeholder="Enter Your Date Of Birth" required>
                    </div>
    
                    <div class="input_box">
                        <label for="" class="form-label">Gender <b style="color: red;">*</b></label><br>
                        <select name="gender" class="form-select" id="" required>
                            <option disabled selected>Choose Your Gender</option>
                            <Option>M</option>
                        </select>
                    </div>
    
                    <div class="input_box">
                        <label for="">Email <b style="color: red;">*</b></label><br>
                        <input type="email" name="email"  value="" class="form-control" placeholder="Enter Your Active Email" required>
                    </div>
    
                    <div class="input_box">
                        <label for="" class="form-label">Tell. Number<b style="color: red;">*</b></label><br>
                        <input type="text" name="phone"  value="" class="form-control" placeholder="Enter Your Active Phone Number" required>
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
                        <input type="text" name="hometown"  class="form-control" placeholder="Enter Your Hometown" required>
                    </div>
    
                    <div class="mb-3">
                        <label for="" class="form-label">District<b style="color: red;">*</b></label><br>
                        <input type="text" name="district"  value="" class="form-control" placeholder="Enter Your District" required>
                    </div>
    
                    <div class="input_box">
                        <label for="" class="form-label">Region<b style="color: red;">*</b></label><br>
                        <input type="text" name="region"  value="" class="form-control" placeholder="Enter Your Region" required>
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
                <input type="submit" value="Proceed" name="submit" class="btn btn-success w-100">

    </form>
    </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>