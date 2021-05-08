<!doctype html>
<?php
session_start();
?>
<html>
<head>
<meta charset="utf-8">
<title>173585P</title>
<link rel="stylesheet" type="text/css" href="common.css">
<?php

//open connection and select database
require_once("connection.php");

//Write an SQL statement to extract unique categories from myservices table
$sql_cat = "SELECT * FROM myservices GROUP BY CID";

//execute the SQL statement
$cat_list = mysqli_query ( $conn, $sql_cat);

?> 
<style>
.zoom {
    transition: transform .2s;
}

.zoom:hover {
    transform: scale(1.1); 
}
    .caption{
            margin: 0px auto;
        width: 180px;
    }
@media only screen and (min-width: 769px){
html{background-image: url(images/FloralBackground.png); background-repeat: repeat-y; }
#header{
    margin: 0px auto;
    width: 1280px;
    text-align: center;
    margin-top: 50px;
    margin-bottom: 20px;
}

#ser_title{
    font-family: "Calisto MT";
}
    
.services{
    margin: 0px auto;
    width: 1000px;
    height: 400px;
    text-align: center; 
    padding-top: 20px;
    display: flex; 
    justify-content:space-around; 
          }

.services a{
        display:block;
        text-align: center;
        text-decoration:none;
        font-size: 25px;
        color: black;
}

}
@media only screen and (min-width: 481px) and (max-width: 768px){
html{
    width: 768px;
    background-image: url(images/FloralBackground_Tablet.png);
    background-position:0px 290px;
    background-repeat: repeat-y;
    }   
.services{
    margin: 0px auto;
    width: 660px;
    height: 240px;
    text-align: center; 
    padding-top: 50px;
    display: flex; 
    justify-content:space-around; 
    padding-bottom: 30px;
          }

.services a{
        color: black;
        display:block;
        text-align: center;
        text-decoration:none;
        font-size: 18px;
        border-color: black;
}

#header{
    margin: 0px auto;
    width: 768px;
    text-align: center;
    margin-top: 50px;
}

#ser_title{
    font-family: "Calisto MT";
}
}
    
@media only screen and (min-width: 50px) and (max-width:480px){
html{background-image: url(images/FloralBackground_Mobile.png); background-repeat: repeat-y;}

.services{
    margin: 0px auto;
    width: 400px;
    height: 895px;
    text-align: center; 
    padding-top: 50px;
    position: relative;
    z-index: 1;
    padding-bottom: 10px;
          }

.services a{
        color: black;
        display:block;
        text-align: center;
        text-decoration:none;
        font-size: 24px;
        padding: 10px;
}


#header{
    margin: 0px auto;
    width: 480px;
    text-align: center;
    margin-top: 50px;
}

#ser_title{
    font-family: "Calisto MT";
}
#sidebar{
top: 0px;        
}
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
<div id="header">
<img src="images/TopBorderBlack.png"> 
<h1 id="ser_title">Services</h1>    
</div>  
<!-- start of services codes -->
<div class="services">
<?php While ( $one_cat = mysqli_fetch_assoc($cat_list)  ) {    

for ($one_cat['CID'] = 1; $one_cat['CID'] <2; $one_cat['CID']++) { ?>
    <div class="zoom">
    <a href="services.php?CName=<?=$one_cat['CName']?>"><img src="images/<?php echo $one_cat['CName'];?>"/></a>
    <a class="caption" href="services.php?CName=<?=$one_cat['CName']?>"><?php echo $one_cat['caption'];?></a>
    </div>
<?php } ?>
<?php } ?>
</div>
 
  

 <!-- start of footer codes -->
<footer>Copyright© 2018 - Gucon Nailah Ginylle Pabilonia</footer>
<!-- end of footer codes -->
</body>
</html>