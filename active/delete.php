<?php

session_start();

include ("database.php");


if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM signup Where id ='$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script>alert('Data Deleted Succefully');</script>";
        header("location:../me/me.php");
    }else{
        echo "<script>alert('Error deleting data');</script>";

    }

}




?>