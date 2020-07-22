<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require_once "db.php";
session_start();
if (isset($_REQUEST['username'])){
	$username=$_REQUEST['username'];
	$email=$_REQUEST['email'];
	$password=$_REQUEST['password'];
	$password_hash=password_hash($password,PASSWORD_DEFAULT);
	$trn_date = date("Y-m-d H:i:s");
	$category =$_REQUEST['category'];
	 $query = "INSERT into `users` (username,email,password,trn_date,category) VALUES ('$username','$email', '".md5($password)."', '$trn_date','$category')";
	$exec=mysqli_query($con,$query);
	if(!exec)
	{
		die("Some error occured");
	}
	$_SESSION['username']=$username;
	$_SESSION['email']=$email;
	if($category=="warden")
	{
		header("location:profile_warden.php");
	}
	elseif($category=="student")
        {
                header("location:profile_student.php");
	}
	else
	{
		header("location:profile_security.php");
        }

    }else{
?>
<form class="login" action="" method="post">
    <h1 class="login-title">Register | NITC LADIES HOSTEL</h1>
    <input type="text" class="login-input" name="username" placeholder="Username" required />
    <input type="text" class="login-input" name="email" placeholder="Email Adress" required />
    <input type="password" class="login-input" name="password" placeholder="Password" required />
    <br>
	<input type="radio" name="category" value="warden">warden
	<input type="radio" name="category" value="student">student
	<input type="radio" name="category" value="security">security
	</br></br>
    <input type="submit" name="submit" value="Register" class="login-button">
	 <p class="login-lost">Already Registered? <a href="login.php">Login Here</a></p>
 </form>
<?php } ?>
</body>
</html>
