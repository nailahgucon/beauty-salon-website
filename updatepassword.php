<?php
session_start();
     require_once("connection.php");

    $username = $_SESSION['thisuser'];
    $password = $_POST['password'];

    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE userdetails SET password='$hashedpwd', confirmpassword='$hashedpwd' WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    header('location: profile.php');
?>

