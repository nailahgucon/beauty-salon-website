<?php
session_start();
?>
<?php
$CName = $_GET['CName']; //...?code=YYY
//connect
require_once("connection.php");

//specify -> get info of selected country
$sql = "SELECT * FROM myservices WHERE CName='$CName'";
//"SELECT * FROM country WHERE Code=AFG'";
$sql_h = "SELECT * FROM myservices WHERE CName='$CName' GROUP BY Cheader";
//DO IT
$result = mysqli_query($conn, $sql);
//$cat_selected = mysqli_fetch_assoc($result);
$result_h = mysqli_query($conn, $sql_h);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
       <title>173585P</title>
       <link rel="stylesheet" type="text/css" href="common.css">
<style>    
* {
    box-sizing: border-box;
}

.column {
    float: left;
    width: 33.33%;
    padding: 5px;
}

/* Clearfix (clear floats) */
#row::after {
    content: "";
    clear: both;
    display: table;
}
    
.booknow{background-color: white; color: darkred; padding: 5px; transition: all 0.5s;}
    
.booknow span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.booknow span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.booknow:hover span {
  padding-right: 10px;
}

.booknow:hover span:after {
  opacity: 1;
  right: 0;
}

@media only screen and (min-width: 769px) {
html{background-image: url(images/FloralBackground.png); background-size: 1280px 830px; }
#header{
    color: white;
    margin: 0px auto;
    width: 1100px;
    text-align: center;
    margin-top:20px;
}

#header h1{font-family: "Calisto MT";}
.services{
    margin: 0px auto;
    width: 1000px;
    height: 400px;
    text-align: center; 
    padding-top: 20px;
    display: flex; 
    justify-content:space-around; 
          }

.services a, p{
        color: floralwhite;
        display:block;
        text-align: center;
        text-decoration:none;
        font-size: 24px;
        font-family: "Calisto MT";
}

.services p{padding-top: 10px;}

.description{font-size: 18px;}
    
.book_now{position: relative; top: 215px;}

#border{
margin: 0px auto;
width: 1100px;
height: 660px;
margin-top: 30px;
border: 2px solid white;
background-color: rgba(158, 11, 15, 0.8);

}    
}
@media only screen and (min-width: 481px) and (max-width: 768px){
html{
    width: 768px;
    background-image: url(images/FloralBackground_Tablet.png);
    background-position:0px 290px;
    background-size: 768px 760px;
    }   
    .services{
    margin: 0px auto;
    width: 660px;
    height: 200px;
    text-align: center; 
    padding-top: 50px;
    display: flex; 
    justify-content:space-around; 
          }

.services a, p{
        display:block;
        text-align: center;
        text-decoration:none;
        font-size: 20px;
        color: white;
}

.services p{padding-top: 10px;}

.description{font-size: 15px;}
    
.book_now{position: relative; top: 230px;}

#header{
    margin: 0px auto;
    width: 708px;
    text-align: center;
    margin-top: 50px;
    font-family:  "Calisto MT";
    color: white;
}

#border{
margin: 0px auto;
width: 700px;
height: 750px;
margin-top: 30px;
border: 2px solid white;
background-color: rgba(158, 11, 15, 0.8);
margin-bottom: 20px;
}
}
@media only screen and (min-width: 50px) and (max-width: 480px){
html{background-image: url(images/FloralBackground_Mobile.png); background-repeat: repeat-y;}

.services{
    margin: 0px auto;
    width: 400px;
    height: 1220px;
    text-align: center; 
    padding-top: 40px;
    position: relative;
    z-index: 1;
    padding-bottom: 10px;
          }

.services a, p{
        display:block;
        text-align: center;
        text-decoration:none;
        font-size: 25px;
        color: white;
}

.services p{padding-top: 5px;}

.description{font-size: 15px; }

#border{
    margin: 0px auto;
    margin-top: 30px;
    z-index: -2;
    border: 2px solid white;
    height: 1650px;
    width: 340px;
    background-color: rgba(158, 11, 15, 0.8);
    padding-left: 10px;
}
#header{
    margin: 0px auto;
    width: 240px;
    text-align: center;
    margin-top: 50px;
    padding-right: 30px;
    color: white;
}  
    
#sidebar{top: 0px; }

#sidebar .toggle-btn span{
    display: block;
    width: 35px;
    height: 9px;
    background: white;
    border: 2px solid black;
    margin: 2px 10px; 
    margin-right: 50px;
}
    
.column {
        width: 80%;
}

}
#datetime{
      color: white;
      font-size: 15px;
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
<div id="border">
<!-- start of services codes -->
<?php
        $one_head = mysqli_fetch_assoc($result_h);     
        echo "<div id='header'>";
        echo "<img src='images/TopBorder.png'> ";
        echo "<h1 id='book_title'>" . $one_head['Cheader'] . "</h1> ";
        echo "</div>";
?>
   
        <div class="services" id="row">
<?php 
        while($one_cat = mysqli_fetch_assoc($result)){
        
        echo "<div class='column'>";
        echo "<img src='images/" . $one_cat['SPic'] . "'>";
        echo "<p>" . $one_cat['SName'] . "</p>";
        echo "<p class='description'>" . $one_cat['Description'] . "</p>";
        echo "<p>$" . $one_cat['Price'] . "</p>";
       
        echo "<form method='post' action='insert_record.php'>";
        echo "<br><br>";
        echo "<p id='datetime'>Date & Time: <input type='datetime-local' name='datetime'></p>";
        echo "<br><br>";
        echo "<button class='booknow'><span>Book Now</span></button>";
        echo "<input type='hidden' name='SName' value='" . $one_cat['SName'] . "'>";
        echo "<input type='hidden' name='Price' value='" . $one_cat['Price'] . "'>";
        echo "<input type='hidden' name='created' value='" . $one_cat['created'] . "'>";
        echo "</form>";
        echo "</div>";
    }

?>
        </div>
</div><!-- end of border div-->
<!-- end of services codes -->

<!-- start of footer codes -->
<footer>Copyright© 2018 - Gucon Nailah Ginylle Pabilonia</footer>
<!-- end of footer codes -->
    
</body>
</html>

