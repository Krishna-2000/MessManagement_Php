<?php
require_once "db.php"; 
session_start();
   if (isset($_SESSION['username'])) {
	  $user = $_SESSION['username'];
	  $query = "SELECT * FROM student WHERE username = '$user'";
	  $get_user = mysqli_query($con,$query) or die(mysql_error());
	  $user_data = $get_user->fetch_assoc();
    } else 
    {
	   header("Location: index.php");
    }?>

<html>
    <head>  
	<meta charset="UTF-8">
		<title><?php echo $user_data['username'] ?>'s Profile Settings</title>
    </head> 
	<body>        Back to <a href="student.php?user=<?php echo $user_data['username'] ?>"><?php echo $user_data['username'] ?></a>'s Profile        
		<h3>Update Profile Information</h3> 
		       <form method="post" action="update-profile-action.php?user=<?php echo $user_data['username'] ?>">            			<label>Name:</label><br> 
			         <input type="text" name="name" value="<?php echo $user_data['full_name'] ?>" /><br> 
			         <label>Roll No:</label><br>
			         <input type="text" name="roll_no" value="<?php echo $user_data['roll_no'] ?>" /><br> 
			         <label>Phone No:</label><br> 
			         <input type="text" name="phone_no" value="<?php echo $user_data['phone_no'] ?>" /><br>
			         <label>Room No:</label><br>          
			         <input type="text" name="room_no" value="<?php echo $user_data['roomno'] ?>" /><br><br>  
			         <label>Block:</label><br> 
			         <input type="text" name="block" value="<?php echo $user_data['block'] ?>" /><br> 
				<label>Parents Phone No:</label><br> 
			         <input type="text" name="parent_no" value="<?php echo $user_data[''] ?>" /><br> 
				   <input type="submit" name="update_profile" value="Update Profile" />
		</form>    
	</body>
</html>
