<html>
<head>
<meta charset="utf-8">

<link
rel="stylesheet" href="style.css"/>
</head>

<body>
<h1 > <?php session_start(); $username=$_SESSION['username'];  ?>!</h1>

<?php
require_once "db.php";


if(isset($_REQUEST['name'])){
	$email=$_SESSION['email'];
	$name=$_REQUEST['name'];
	$phone_no=$_REQUEST['phone_no'];
	$sql= " INSERT into warden (username,email,name,phone_no) values ('".$username."','".$email."','".$name."','".$phone_no."')";
	$exec=mysqli_query($con,$sql);
	if(!exec)
	{
		die("Some error occurred");
	}
	header("location:login.php");
	
}else{
?>
<form class="login" action="" method="post">
    <h1 class="login-title">Warden_Registration | NITC LADIES HOSTEL</h1>
    
    <input type="text" class="login-input" name="name" placeholder="Your Name">
    <input type="text" class="login-input" name="phone_no" placeholder="Mobile Number">
    
    <input type="submit" name="submit" value="Submit" class="login-button">
         <p class="login-lost">Already Registered? <a href="login.php">Login Here</a></p>
 </form>
<?php } ?>

</body>
</html>
