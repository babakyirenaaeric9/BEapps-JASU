<?php
include "../active/database.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM signup WHERE email = '$email' limit 1";
    $result = mysqli_query($conn, $sql);

    if($result && mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_assoc($result);
        if($data['password'] === $password){
            if($data['usertype'] == 'Main'){
                $_SESSION['email'] = $data['email'];
                header('Location:../me/me.php');
                die;
            }elseif($data['usertype'] == 'Database Admin'){
                $_SESSION['email'] = $data['email'];
                header('Location:../dashboard/dashboard_database_admin.php');
                die;
            }elseif($data['usertype'] == 'Admin'){
                $_SESSION['email'] = $data['email'];
                header('Location:../dashboard/dashboard_admin.php');
                die;
            }elseif($data['usertype'] == 'Student' || "student"){
                $_SESSION['email'] = $data['email'];
                header('Location:../index.php');
                die;
            }else{
                echo "<script>alert('User Invalid');</script>";
                die;
            }

        }else{
            echo "<script>alert('Wrong Password, Check It And Try Again');</script>";
        }


    }else{
        echo "<script>alert('Wrong Email, Check It And Try Again');</script>";

    }
}

    /*if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Debugging inputs
        //var_dump($user['password']); // Hashed password from the database
        //var_dump($password); // Entered password

        // Verify password
        if (password_verify($password, $user['password'])) {
            if($user['usertype'] == 'Main'){
                $_SESSION['email'] = $user['email'];
                header('Location:../dashboard/main_dashboard.php');
                die;
            }elseif($user['usertype'] == 'Database Admin'){
                $_SESSION['email'] = $user['email'];
                header('Loacation:../dashboard/db_admin.php');
                die;
            }elseif($user['usertype'] == 'Admin'){
                $_SESSION['email'] = $user['email'];
                header('Loacation:../dashboard/admin.php');
                die;
            }elseif($user['usertype'] == 'Student'){
                $_SESSION['email'] = $user['email'];
                header('Loacation:../dashboard/student_dashboard.php');
                die;
            }else{
                echo "<script>alert('User Inalid');</scritp>";
                die;
            }
            
        } else {
            echo "<script>alert('Password does not match.');</script>";
        }
    } else {
        echo "<script>alert('No user found with that email.');</script>";
    }
}

$conn->close();*/
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../active/style.css">
</head>
<body>
                <header>
                    <img src="../images/stu_jasu.png" alt="LOGO" style="width: 150px;">
                    <h1 class="heading-primary">SUNYANI TECHNICAL UNIVERSITY</h1>
                    <h2 class="heading-secondary">JIRAPA AREA STUDENT UNION (JASU)</h2>
                </header>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="form-container">
                    <h3 class="text-center">Login</h3>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            <a href="forgot_password.php" class="btn btn-danger mt-3">Forgot Password</a>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary w-100">Login</button>
                        <div class="text-center mt-3">
                            <a href="signup.php">Don't have an account? Sign Up</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>

