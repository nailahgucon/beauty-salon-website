<?php
session_start();
     require_once("connection.php");

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_SESSION['thisuser'];
    $mobileno = $_POST['mobileno'];

    $sql = "UPDATE userdetails SET fullname='$fullname', email='$email', mobileno='$mobileno' WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    header('location: profile.php');
?>

