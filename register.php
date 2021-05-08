
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
       <title>173585P</title>
       <link rel="stylesheet" type="text/css" href="common.css">
       <script src="jquery-1.12.4.js"></script>
<style>
.msg {border:1px solid #bbb; padding:5px; margin:10px 0px; background:#eee;}
@media only screen and (min-width: 769px) {
html{background-image: url(images/FloralBackground.png); background-size: 1280px 950px;}
}
@media only screen and (min-width: 481px) and (max-width:768px){
html{background-image: url(images/FloralBackground_Tablet.png); background-size: 1280px 1080px;}
}
@media only screen and (min-width: 50px) {

form{
    margin: 0px auto;
    width:380px;
    background-color: rgba(158, 11, 15, 0.8);
    color: white;
    font-family: "Calisto MT";
    margin-bottom: 30px;
}
* {box-sizing: border-box}

  input[type=text], input[type=password] {
  width: 100%;
  padding: 7px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

.resetbtn {
  padding: 14px 20px;
  background-color: #f44336;
  z-index: -100;
}

.resetbtn, .signupbtn {
  float: left;
  width: 50%;
}

.container {
  padding: 16px;
  border: 4px groove white;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
}
@media only screen and (min-width: 50px) and (max-width:480px){
html{background-image: url(images/FloralBackground_Mobile.png); background-size: 480px 780px;}
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
<li><a href="login.php" title="Login" class="border" style="text-decoration:none; color: white;"><b>LOGIN</b></a></li>
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
<br><br>
<form method="post" onsubmit = "return checkpassword();" action="register.php" enctype="multipart/form-data">
  <div class="container">
    <img src="images/TopBorder.png" style="margin-left: 115px;">
    <h2 style="text-align: center;">Register</h2>  
    
    <?php 
  if (isset($_POST['username'])) {
     require_once("connection.php");
     $username = "";
     $email = "";
  	$fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $mobileno = $_POST['mobileno'];
    $profilepic = $_FILES['profilepic']['name'];

  	$sql_u = "SELECT * FROM userdetails WHERE username='$username'";
  	$res_u = mysqli_query($conn, $sql_u);
    ?>
    
    <?php
    
if ($password == $confirmpassword){
  	if (mysqli_num_rows($res_u) > 0) {
  	  echo"<h3 style='color:turquoise;'>Sorry, Username already taken</h3>"; 
  	}else{
    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
    $hashedconpwd = password_hash($confirmpassword, PASSWORD_DEFAULT);
        
    $timestamp = date('Ymd_His');
    $target = "userpics/". $timestamp . "_" . $profilepic;
        
    $sql = "INSERT INTO userdetails (fullname, email, username, password, confirmpassword, mobileno, profilepic) VALUES ('$fullname', '$email', '$username', '$hashedpwd', '$hashedconpwd', '$mobileno', '$target')";
    mysqli_query($conn, $sql);
    $result = move_uploaded_file($_FILES['profilepic']['tmp_name'], $target);
    header('location: login.php?id=1');
    exit();
  	}
}else{ echo"<h3 style='color:turquoise;'>Both passwords must be the same</h3>"; }
  }
?>  
    <label for="fullname"><b>Full Name</b></label>
    <input type="text" placeholder="Enter Full Name" name="fullname" id="info1" pattern="[a-zA-Z_ ]{1,255}" title="No numbers/symbols" required>  
      
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email here" name="email" id="info2" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3}$" title="Please enter a valid email address. E.g. user@gmail.com" required>
      
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter username" name="username" id="info3" required>
      
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="info4" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onchange='check_pass();' required>

    <label for="con-repeat"><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm Password" name="confirmpassword" id="info5" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must be the same as password above" onchange='check_pass();' required>
      
    <label for="mobileNo">Mobile Number</label><br>
    <input type="tel" placeholder="Enter Mobile Number" name="mobileno" style="padding:6px; width=80px;" id="info6" pattern= "[8-9]{1}[0-9]{7}" title="Please enter Singapore Number" required><br><br>
    
    <label for="profilePic">Profile Picture</label><br>
    <input type="file" name="profilepic" id="info7"><br><br>
    <br>  
    <p>Please note that you will be unable to change your username once you register.</p>
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms &amp; Privacy</a>.</p>
    
    <div class="clearfix">
<script>
$(document).ready(function(){
//function to reset or clear selection.
$('#reset').click(function(){
$('#info1').val("");
$('#info2').val("");
$('#info3').val("");
$('#info4').val("");
$('#info5').val("");
$('#info6').val("");
$('#info7').val("");    
});// end of reset button click
});//end of document ready

var passvalid;
function checkpassword() {
    if ($("#info4").val() == $("#info5").val())
        {
            passvalid = true;
        }
    else
        {
            alert('Please ensure that the password and confirm password is the same');
            passvalid = false;
        }
    return passvalid;
}
</script>
      <button type="button" class="resetbtn" id="reset">Reset</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>
<!-- start of footer codes -->
<footer>Copyright© 2018 - Gucon Nailah Ginylle Pabilonia</footer>
<!-- end of footer codes -->
    
</body>
</html>