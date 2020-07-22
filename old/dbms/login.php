<?php
require_once "db.php";
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
{
	header("location: ".$_SESSION['who']."_dash.php");
}
?>
<html>
<head>
<meta charset="utf-8">
<title>Login | NITC Ladies Hostel</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
if (isset($_POST['username'])){

	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
        $query = "SELECT * FROM users WHERE username='$username'" ;

	$result = mysqli_query($con,$query) or die(mysql_error());

	$rows = mysqli_num_rows($result);
	$value=mysqli_fetch_array($result);
echo $value[5];
	$username=$value['username'];
	$_SESSION['username']=$username;
	$_SESSION['who']=$value[5];
	$_SESSION['logged_in']=true;
	if($rows==1){
		header("location: ".$_SESSION['who']."_dash.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{
?>
	<form class="login" action="" method="post" name="login">
    <h1 class="login-title">Login | NITC Ladies Hostel</h1>
    <input type="text" class="login-input" name="username" placeholder="Username" autofocus required/>
    <input type="password" class="login-input" name="password" placeholder="Password" required/>
    <input type="submit" value="Login" name="submit" class="login-button">
  <p class="login-lost">New Here? <a href="registration.php">Register</a></p>
  </form>
 
<?php } ?>
</body>
</html>
