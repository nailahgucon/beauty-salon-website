<?php
session_start();

$user = $_SESSION['thisuser'];

//connect
require_once("connection.php");
//specify
$sql = "SELECT * FROM userdetails WHERE username = '$user'";
//do it (get the records)
$result = mysqli_query($conn, $sql);
//^ must have container to store data (e.g. $result)
$u = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
       <title>173585P</title>
       <link rel="stylesheet" type="text/css" href="common.css">
<style>
   h1{color: white;}
.table-container
{
	width: 100%;
	overflow-y: auto; 
	overflow: auto;
}
    
table {
    margin: 0px auto;
    font-family: "Calisto MT";
    border-collapse: collapse;
    width: 90%;
}
    th{
    background-color: black;
    color: white;
    font-size:18px;
    }
td, th {
    border: 3px ridge #dddddd;
    text-align: left;
    padding: 8px;
}
tr:nth-child(even) {
    background-color: #dddddd;
}
tr:nth-child(odd) {
    background-color: #ffffff;
} 
    table, th, td{
        text-align: center;
    }   
    .form{
        padding: 1em;
    }
    button{
        background-color: white;
        color: black;
        padding: 5px;
        cursor: pointer;
    }
    #myInput{
        padding: 5px 350px;
    }
    footer{position: absolute; bottom: 0px;}
@media only screen and (min-width: 769px){
    html{ background-image: url(images/Reg_FloralBackground.png); background-repeat: repeat-y;}
    #zigzag{margin-left: 490px;}
    .container{margin: 0px auto; width: 1100px;}
}
@media only screen and (min-width: 481px) {

.container {
  padding: 16px;
  border: 4px groove white;
}

}
@media only screen and (min-width: 481px) and (max-width:768px) {
html{background-image: url(images/Reg_FloralBackground_Tablet.png); background-position:0px 290px; background-repeat: repeat-y;}

.container{margin: 0px auto; width: 680px; margin-bottom: 20px;}

#zigzag{
margin-left: 280px;      
}

}
@media only screen and (min-width: 50px) and (max-width:480px) {
html{background-image: url(images/Reg_FloralBackground_Mobile.png); background-repeat: repeat-y;}   
    
.container {
  margin: 0px auto;
  width: 380px;
  padding: 16px;
  border: 4px groove white;
}

#zigzag{
margin-left: 130px;      
}

}
    
.container{
background-color: rgba(158, 11, 15, 0.8);
    }
</style>
</head>
<body>
<script>
function toggleSidebar(){    document.getElementById("sidebar").classList.toggle('active');
}
</script>
<div id="sidebar">
<div class="toggle-btn" onclick="toggleSidebar()">
<span></span>
<span></span>
<span></span>
</div>
<nav>
<ul class="logo">
<li><a href="index.php" title="Home"><img src="images/Logo.png" alt="Home"/></a></li>
</ul>
<ul class="content"> 
<li><b>
<?php 
if(isset($_SESSION['thisuser']))
{
    echo '<a href="profile.php" class="profile" style="float: left; text-decoration: none; color:white;">PROFILE</a>';
    echo '<a href="logout.php" class="logout" style="float: left; text-decoration: none; color:white;">LOGOUT</a>';
}
else{
    echo '<a href="login.php" style="text-decoration: none; color:white;">LOGIN</a>';
}
?>
<a href="login.php" title="Login" class="border" style="text-decoration:none; color: white;"></b></a></li>
<li class="dropdown">
<a href="categories.php" title="Services" style="text-decoration:none; color: white;"><b>SERVICES</b></a>
</li>
<li class="dropdown">
<a href="view_booking.php" title="Booking" style="text-decoration:none; color: white;"><b>BOOKING</b></a>
</li>
<li><a href="search.php" title="Search" style="text-decoration:none; color: white;"><b>SEARCH</b></a></li>
</ul>
<ul class="social">
<li><a href="https://www.facebook.com/" title="Facebook" target="_blank"><img src="images/Facebook%20icon.png" alt="Facebook"/></a></li>
<li><a href="https://www.instagram.com/" title="Instagram" target="_blank"><img src="images/Instagram%20Icon.png" alt="Instagram"/></a></li>
<li><a href="https://twitter.com/" title="Twitter" target="_blank"><img src="images/Twitter%20Icon.png" alt="Twitter"/></a></li>
</ul>
</nav>
</div>
<br>
<div class="container">
<img src="images/TopBorder.png" id="zigzag">
<h2 style="color:white; text-align:center;">Edit <?php echo $user;?>'s Profile Photo</h2>
<br>
<form method="post" action="editpic.php" enctype="multipart/form-data">
<?php
if(isset($_FILES['profilepic']['name'])){
$fname = $_FILES['profilepic']['name'];
$ftype = $_FILES['profilepic']['type'];
$fsize = $_FILES['profilepic']['size'];

$timestamp = date('Ymd_His');
$target = "userpics/". $timestamp . "_" . $fname;

if($ftype == 'image/jpeg' or $ftype == 'image/png' or $ftype == 'image/gif' or $ftype == 'image/jpg')
{
if($fsize < 100000) // if the file size is within limit of 100000 bytes
{
$result = move_uploaded_file($_FILES['profilepic']['tmp_name'], $target);
// returns true or false

//if($result == TRUE)
//if($result == true)
if($result)
{
    require_once("connection.php");
    $sql1 = "UPDATE userdetails SET profilepic = '$target' WHERE username = '$user';";
    mysqli_query($conn, $sql1);
    header('location: profile.php');
}
else
{
    echo"<h2 style='color:turquoise; text-align:center; padding:5px;'>Upload Failed</h2>"; 
}
}
else{
    echo"<h2 style='color:turquoise; text-align:center; padding:5px;'>File is too large</h2>";
}
}
else{
    echo"<h2 style='color:turquoise; text-align:center; padding:5px;'>Wrong File Type</h2>";
}
}
?>
<div class="table-container">
<table style="margin: 0px auto">
<tr>
<th>&nbsp;Profile Picture&nbsp;</th>  
<td><input type="file" name="profilepic"></td>  
</tr> 
</table>
</div>
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="submit">Update</button>
</form>
<br><br>
<p style="color:white;">Image Requirements: 100KB or less AND jpeg/png/gif/jpg file type</p>
</div>
<!-- start of footer codes -->
<footer>Copyright© 2018 - Gucon Nailah Ginylle Pabilonia</footer>
<!-- end of footer codes -->
    
</body>
</html>