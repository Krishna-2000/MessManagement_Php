<?php 
require_once "db.php";
session_start();
if (isset($_SESSION['username']))
{
$user = $_SESSION['username'];
$query = "SELECT * FROM security WHERE username = '$user'";
$get_user = mysqli_query($con,$query) or die(mysql_error());

if (mysqli_num_rows($get_user) == 1)
{	
    $profile_data = $get_user->fetch_assoc();
}
       
} 
?>

<html>    
<head>       
<meta charset="UTF-8">
<title>
<?php 
	echo $profile_data['name'] ?>'s Profile
</title>
</head>
<body>

<a href="login.php">Home</a> | 
<?php 
	echo $profile_data['username'] ?>'s Profile        
<h3>Personal Information | 
<?php
	$visitor = $_SESSION['username'];
        if ($user == $visitor)
{ ?>
<a href="edit-profile.php?user=	<?php
echo $profile_data['username'] ?>" > Edit Profile
</a>
<?php }  ?>
</h3>        
      


<form method="post" action="security_student.php?user=
<?php 
echo 	$profile_data['username'] ?>">            			
<label>Name:<?php echo $profile_data['name'] ?></label><br>
			        
<label>Phone No:<?php echo $profile_data['phone_no'] ?></label><br> 
<input type="submit" name="get_list" value="Get List" />

</form>    
</body>





echo '<div class="row">
                                            <div class="col-md-6">
                                                <label>Username</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$result[0].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$result[1].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$result[2].'</p>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$result[3].'</p>
                                            </div>
                                        </div>';





</html> 

