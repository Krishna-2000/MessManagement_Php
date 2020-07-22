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
	$name=$_REQUEST['name'];
	$roll_no=$_REQUEST['roll_no'];	
	$phone_no=$_REQUEST['phone_no'];
	$room_no=$_REQUEST['room_no'];
	$block=$_REQUEST['block'];
echo $block;
	$parent_no=$_REQUEST['parent_no'];
	
	
	
	$sql= "INSERT into student (username,name,roll_no,phone_no,room_no,block,parent_no) values ('".$username."','".$name."','".$roll_no."','".$phone_no."','".$room_no."','".$block."','".$parent_no."')";
	$sql1="insert into student_status(roll_no,status) values ('".$roll_no."','absent')";
	$exec=mysqli_query($con,$sql);
	if(!exec)
	{
		die("Some error occurred");
	}
	$exec1=mysqli_query($con,$sql1);
	if(!exec1)
	{
		die("Some error occurred");
	}
	header("location:login.php");
	
}else{
?>
<form class="login" action="" method="post">
    <h1 class="login-title">Warden_Registration | NITC LADIES HOSTEL</h1>
    
    <input type="text" class="login-input" name="name" placeholder="Your Name">
    <input type="text" class="login-input" name="roll_no" placeholder="Roll No.">
    <input type="text" class="login-input" name="phone_no" placeholder="Phone Number">
    <input type="text" class="login-input" name="room_no" placeholder="Room No.">	
    <input type="text" class="login-input" name="block" placeholder="Block No.">
    <input type="text" class="login-input" name="parent_no" placeholder="Parent's Phone Number">    
    <input type="submit" name="submit" value="Submit" class="login-button">
         <p class="login-lost">Already Registered? <a href="login.php">Login Here</a></p>
 </form>
<?php } ?>

</body>
</html>
