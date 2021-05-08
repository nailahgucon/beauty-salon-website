<?php
session_start();
unset($_SESSION['thisuser']);
session_destroy();

//open connection and select database
require_once("connection.php");

//Write an SQL statement to extract unique categories from myservices table
$sql_cat = "SELECT * FROM myservices GROUP BY CID";

//execute the SQL statement
$cat_list = mysqli_query ( $conn, $sql_cat);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>173585P</title>
<link rel="stylesheet" type="text/css" href="common.css">
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
@media only screen and (min-width: 481px) {
    .book_now{
        margin: 0px auto;
        border: 2px solid white;
        background-color: #d1fedd;
        border-radius: 10px;
        width: 170px;
        border-style: groove;
    }    
}
/*DESKTOP STYLE*/
@media only screen and (min-width: 769px) { 
html{ background-image: url(images/Background.png);} 
.services{
    margin: 0px auto;
    width: 1000px;
    height: 400px;
    text-align: center; 
    padding-top: 500px;
    display: flex; 
    justify-content:space-around; 
          }

.services a, p{
        color: white;
        display:block;
        text-align: center;
        text-decoration:none;
        font-size: 24px;
}

.services p{ padding-top: 210px;}

.book_now{ position: relative; top: 75px;}
}

@media only screen and (min-width: 481px){
table{font-family: "Calisto MT"; margin: 0px auto; padding:110px;}
th{ font-size: 56px; padding-bottom: 20px; }
td{ font-size: 36px; padding-bottom: 20px; }

.reviews{ padding-top: 120px; }
        
#customers{
    margin: 0px auto;
    width: 1280px;
    text-align: center; 
    padding-top: 110px;
    display: flex; 
    justify-content: space-around; 
          }

h2{
    width: 1280px;
    margin: 0px auto;
    text-align: center;
    padding-top: 30px;
    color: white;
    font-size: 46px;
}

.visitus{
    width: 1280px;
    margin: 0px auto;
    text-align: center; 
    padding-top: 350px;
    display: flex; 
    justify-content: space-around;  
}

#map{ background: url(images/Map.png) no-repeat; display: block; width:592px; height:445px; }

h1{padding-top: 30px; padding-right: 100px; font-size: 46px; font-family: "Calisto MT"; }

.address{padding-top: 20px; padding-right: 90px; font-size: 36px;}

.address p{font-family: "Calisto MT"; color: black;}
}

/*TABLET STYLE*/
@media only screen and (min-width: 481px) and (max-width: 768px){
#wrapper{ background-image: url(images/Background_Tablet.png); }
.services{
    margin: 0px auto;
    width: 590px;
    height: 330px;
    text-align: center; 
    padding-top:415px;
    display: flex; 
    justify-content:space-around; 
          }

.services a{
        color: white;
        display:block;
        text-align: center;
        text-decoration:none;
        font-size: 20px;
        padding: 10px;
        
}

.book_now{position: relative; top: 45px; width: 110px;}
    
table{
font-family: "Calisto MT";
margin: 0px auto;
padding:100px;
}
th{font-size: 30px; padding-bottom: 20px;}

td{font-size: 25px; padding-bottom: 20px;}

.reviews{
    width: 768px;
    padding-top: 10px;
    height: 400px;
    padding-bottom: 0px;
}
#customers{
    position: relative;
    margin: 0px auto;
    width: 768px;
    text-align: center; 
    padding-top: 80px;
    display: flex; 
    justify-content: space-around; 
    height: 200px;
    color: white;
          }

#customers p{ font-size: 20px;}
h2{
    width: 768px;
    margin: 0px auto;
    text-align: center;
    color: white;
    font-size: 36px;
}

#R1{position: absolute; padding-left: 370px; padding-top: 170px;}
    
#R2{position: absolute; padding-top: 170px; padding-right: 440px;}
    
.visitus{
    width: 768px;
    margin: 0px auto;
    text-align: center; 
    padding-top: 200px;
    display: flex; 
    justify-content: space-around;  
}

#map{
background: url(images/Map_Tablet.png) no-repeat;
display: block;
width:353px;
height:266px;
padding-bottom: 15px;
}

h1{
    padding-top: 0px;
    padding-right: 60px;
    font-size: 36px;
    font-family: "Calisto MT";
}

.address{padding-top: 20px; padding-right: 55px; font-size: 16px;}

.address p{ font-family: "Calisto MT"; color: black;}    
}

/*HANDPHONE STYLE*/
@media only screen and (min-width: 50px) and (max-width: 480px){
html{ background-image: url(images/Background_HP.png);}   
    
.services{
    margin: 0px auto;
    width: 400px;
    height: 1120px;
    text-align: center; 
    padding-top: 460px;
    position: relative;
    z-index: 1;
    padding-bottom: 10px;
          }

.services a{
        display:block;
        text-align: center;
        text-decoration:none;
        font-size: 25px;
        color: white;
}

    .zoom{
        margin: 25px 0px 85px;
    }    
    
.book_now{position: absolute; visibility: hidden;}


table{
font-family: "Calisto MT";
margin: 0px auto;
padding:90px;
z-index: -1;
margin-top: 25px;
}

th{font-size: 25px; padding-bottom: 20px; padding-top: 50px;}

td{font-size: 20px; padding-bottom: 20px;}

.reviews{
    width: 480px;
    padding-top: 30px;
    height: 700px;
    padding-bottom: 0px;
    z-index: -1;
}

#customers{
    position: relative;
    margin: 0px auto;
    width: 480px;
    text-align: center; 
    padding-top: 70px;
    display: flex; 
    justify-content: space-around; 
    height: 200px;
    z-index: -1;
    color: white;
          }

#customers p{font-size: 20px;}

h2{
    width: 480px;
    margin: 0px auto;
    text-align: center;
    color: white;
    font-size: 30px;
    
}

#R1{position: absolute;}

#R2{position: absolute; bottom: 0px; left: 130px;}

#R3{position: absolute; top: 390px;}

#R4{position: absolute; top: 530px;}

.visitus{
    width: 480px;
    margin: 0px auto;
    text-align: center; 
    padding-top: 65px;
    display: inline-block;
    z-index: -1;
}

#map{
    background: url(images/Map_HP.png) no-repeat;
    display: block;
    width:312px;
    height:235px;
    margin-left: 90px;
    margin-bottom: 10px;
}

h1{
    padding-top: 10px;
    padding-right: 5px;
    font-size: 20px;
    font-family: "Calisto MT";
}

.address{ padding-top: 2px; padding-right: 0px;}

.address p{font-family: "Calisto MT"; color: black; font-size: 15px;}
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
<div id="wrapper">
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
<!-- end of services codes -->

<!-- start of promotions codes -->
<div id="promotions">
<table>
  <tr>
      <th colspan="2">SAKURA SPECIALS</th>
  </tr>
  <tr>
    <td>Eyebrow Sculpting</td>
    <td>$20</td>
  </tr>
  <tr>
    <td>Shiatsu Massage</td>
    <td>$65</td>
  </tr>
  <tr>
    <td>Body Scrub</td>
    <td>$70</td>
  </tr>
</table>  
</div>
<!-- end of promotions codes -->  
    
<!-- start of reviews codes -->
<div class="reviews">
<h2>REVIEWS</h2>
<div id="customers">
<div id="R1">
<p>Great Service!</p>
<p>~ Jane, 28</p>
</div>
<div id="R2" style="padding-left: 60px;">
<p>Refreshing!</p>
<p>~ Mary, 35</p>
</div>
<div id="R3">
<p>Love my new hair!</p>
<p>~ Amy, 18</p>
</div>
<div id="R4">
<p>I feel young again!</p>
<p>~ Penny, 60</p>
</div>
</div>
</div>
<!-- end of reviews codes -->    

<!-- start of visit us codes -->
<div class="visitus">
<div>
<a href="https://www.google.com/maps" id="map" title="Map" target="_blank"></a>     
</div>
<div>
<h1>VISIT US</h1>
<div class="address">
<p>Address:</p>
<p>180 Ang Mo Kio Avenue 8</p>
<br>
<p>Opening Hours:</p>
<p>Monday - Friday : 11am - 6pm</p>
<p>Saturday - Sunday : 10am - 9pm</p>
</div>
</div>
</div>
<!-- end of visit us codes -->
</div>
<!-- start of footer codes -->
<footer>Copyright© 2018 - Gucon Nailah Ginylle Pabilonia</footer>
<!-- end of footer codes -->
    
</body>
</html>

