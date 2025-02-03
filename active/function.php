<?php
    function check_login($conn){
        if(isset($_SESSION['email'])){
            $id = $_SESSION['email'];
            $sql = "SELECT * FROM signup WHERE email = '$id' limit 1";

            $result = mysqli_query($conn, $sql);
             if($result && mysqli_num_rows($result) > 0){
                $data = mysqli_fetch_assoc($result);
                return $data;

                 
             }
        }
        //redirect
        header("location: ../authenticate/login.php");

    }