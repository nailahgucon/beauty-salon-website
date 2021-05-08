<?php
session_start();
?>
<?php
require_once("connection.php");

$sql = "SELECT * FROM myservices";

$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
       <title>173585P</title>
       <link rel="stylesheet" type="text/css" href="common.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });
});
</script>
<style>
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

@media only screen and (min-width: 769px){
    html{ background-image: url(images/Reg_FloralBackground.png); background-repeat: repeat-y;}
    #zigzag{margin-left: 490px;}
    .container{margin: 0px auto; width: 1100px;}
    #searchbox{
    margin-left: 100px;
    }
     #myInput{
        padding: 5px 350px;
    }
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
#searchbox{margin-left: 60px;}
#myInput{padding: 5px 160px;}
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

#myInput{padding: 5px 80px;}
    footer{position: absolute; bottom: 0px;}
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
    <h1 style="text-align: center; color:white;">Search</h1>
    <br>
<h2 id="searchbox">&#x1F50E; <input id="myInput" type="text" placeholder="--Search Category/Service--"></h2>
<br><br>

<table>
  <thead>
    <tr>
      <th>Category</th>
      <th>Service</th>
    </tr>
  </thead>
  <tbody id="myTable">
      <?php 
        while($one_cat = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td ><a style='text-decoration:none; color:black;' href='services.php?CName=". $one_cat['CName'] . "'>" . $one_cat['Cheader'] . "</a></td>";
        echo "<td><a style='text-decoration:none; color:black;' href='services.php?CName=". $one_cat['CName'] . "'>" . $one_cat['SName'] . "</a></td>";
        echo "</tr>";
        }

?>
  </tbody>
</table>
  </div>

<!-- start of footer codes -->
<footer>Copyright© 2018 - Gucon Nailah Ginylle Pabilonia</footer>
<!-- end of footer codes -->
    
</body>
</html>