<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
       <title>173585P</title>
       <link rel="stylesheet" type="text/css" href="common.css">
<style>
@media only screen and (min-width: 769px) { 
html{background-image: url(images/FloralBackground.png); background-repeat: repeat-y;} 
}
    
@media only screen and (min-width: 481px) and (max-width:768px){   
html{background-image: url(images/FloralBackground_Tablet.png); background-position:0px 290px;}
}
    
@media only screen and (min-width: 481px){
#login{
width:1280px;
margin: 0px auto;
background: url(images/Profile%20Pic.png) no-repeat;
display: block;
width:216px;
height: 216px;
margin-top: 50px;
padding-bottom: 210px;
}

#userlogin{margin-top: 200px; width: 250px; }

.center{text-align: center;}
} 

@media only screen and (min-width: 50px) and (max-width:480px){   
html{background-image: url(images/FloralBackground_Mobile.png);}
#login{
margin: 0px auto;
background: url(images/Profile%20Pic.png) no-repeat;
display: block;
width:250px;
height: 216px;
margin-top: 80px;
padding-bottom: 210px;
}
#userlogin{
margin-top: 200px;       
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
<?php
if(isset($_GET['id'])){
    echo "<h2 style='color:red; text-align:center;'>Registration Successful!</h2>";
}    
?>
<form id="login" method="post" action="login.php">
<br><br>
<div id="userlogin">
Username: <input type="text" name="username"><br><br>
Password: <input type="password" name="password"><br><br>
    <button id="loginbtn" style="background-color: #9e0b0f; border: none; color: white; padding: 5px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 13px; margin: 4px 70px;">LOGIN</button><br><br>
<p class="center">Not a member yet? <a href="register.php" title="registration">Register here</a></p>
</div>

<?php
if (isset($_POST['username'])){
    $u = $_POST['username'];
    $p = $_POST['password'];
    
    $p = str_replace("'","",$p);
    
    require_once("connection.php");
    $sql = "SELECT * FROM userdetails WHERE username = '$u'";
    $searchresult= mysqli_query($conn, $sql);
    $result = mysqli_num_rows($searchresult);
    
    if($result>=1){
    if($row = mysqli_fetch_assoc($searchresult)){
    $hashedPwdCheck = password_verify($p, $row['password']);  
    if($hashedPwdCheck == true){
    session_start();
    $_SESSION['thisuser']=$u;
    header('location:profile.php');
    }else if($hashedPwdCheck == false){
    header('location:login.php?invalid=1');
    exit();
    }
    }
    }
    else{
        header('location:login.php?invalid=1');
        exit();
    }
}
?>
<?php
if (isset($_GET['invalid']))
    {
?>
<h3 class ="invalid" style="color:red; text-align:center;">Login failed.<br> Please register first.</h3>
<?php
    }
?>
</form>
<!-- start of footer codes -->
<footer>Copyright© 2018 - Gucon Nailah Ginylle Pabilonia</footer>
<!-- end of footer codes -->
    
</body>
</html>