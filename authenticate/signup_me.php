<?php
session_start();

include("../active/database.php");
include("../active/function.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $student_id = $_POST['studentID'];
    $surname = $_POST['surname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $region = $_POST['region'];
    $municipal = $_POST['municipal'];
    $hometown = $_POST['hometown'];
    $usertype = $_POST['usertype'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $passport = addslashes(file_get_contents($_FILES['passport']['tmp_name']));

    if ($password === $confirm_password) {
        $check = $conn->query("SELECT * FROM signup WHERE email = '$email' OR student_id = '$student_id'");
        if ($check->num_rows > 0) {
            echo "<script>alert('Email or Student ID already exists.');</script>";
        } else {
            $sql = "INSERT INTO signup(student_id, surname, middlename, lastname, gender, dob, phone, email, region, municipal, hometown, password, usertype, passport) 
                    VALUES ('$student_id', '$surname', '$middlename', '$lastname', '$gender', '$dob', '$phone', '$email', '$region', '$municipal', '$hometown', '$password', '$usertype', '$passport')";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Registration successful.');</script>";
                header("location: ../authenticate/login.php");
                die;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "<script>alert('Password and Confirm password do not match!!!');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../active/style.css">

</head>
<body>
 
    <!-- Header -->
    <header>
        <h1 class="heading-primary">SUNYANI TECHNICAL UNIVERSITY</h1>
        <h2 class="heading-secondary">JIRAPA AREA STUDENT UNION (JASU)</h2>
    </header>

    <!-- Form -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <h3 class="text-center">Sign Up</h3>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="studentID" class="form-label">Student ID</label>
                            <input type="text" class="form-control" id="studentID" name="studentID" maxlength="20" required>
                        </div>
                        <div class="mb-3">
                            <label for="surname" class="form-label">Surname</label>
                            <input type="text" class="form-control" id="surname" name="surname" maxlength="30" required>
                        </div>
                        <div class="mb-3">
                            <label for="middlename" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="middlename" name="middlename" maxlength="30">
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" maxlength="30" required>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" maxlength="15" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" maxlength="70" required>
                        </div>
                        <div class="mb-3">
                            <label for="region" class="form-label">Region</label>
                            <input type="text" class="form-control" id="region" name="region" maxlength="70" value="Upper West" required>
                        </div>
                        <div class="mb-3">
                            <label for="municipal" class="form-label">Municipal</label>
                            <input type="text" class="form-control" id="municipal" name="municipal" maxlength="70" value="JIRAPA" required>
                        </div>
                        <div class="mb-3">
                            <label for="hometown" class="form-label">Hometown</label>
                            <input type="text" class="form-control" id="hometown" name="hometown" maxlength="70" value="JIRAPA" required>
                        </div>
                        <div class="mb-3">
                            <label for="usertype" class="form-label">User Type</label>
                            <select class="form-select" id="usertype" name="usertype" required>
                                <option value="" disabled selected>User Type</option>
                                <option value="Student">Student</option>
                                <option value="Admin">Admin</option>
                                <option value="Database Admin">Database Admin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="passport" class="form-label">Passport Photo</label>
                            <input type="file" class="form-control" id="passport" name="passport" accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" maxlength="20" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Sign Up</button>
                        <div class="text-center mt-3">
                            <a href="login.php">Already have an account? Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
