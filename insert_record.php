<?php
session_start();
$sn = $_POST['SName'];
$p = $_POST['Price'];
$d = $_POST['datetime'];
$stat = 'Booked';
$u = $_SESSION['thisuser'];

require_once("connection.php");

$sql = "INSERT INTO booking(SName, Price, username, datetime, status) VALUES ('$sn','$p','$u', '$d', '$stat')";

mysqli_query($conn, $sql);

header("location:view_booking.php");

?>