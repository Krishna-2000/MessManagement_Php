<?php
  include 'db.php';
    if (isset($_POST['update_profile'])) {
	$user = $_GET['username'];
	$fullname = $_POST['fullname'];
	$rollno = $_POST['rollno'];
	$phoneno = $_POST['phoneno'];
	$roomno = $_POST['roomno'];
	$block = $_POST['block'];
	$parentsno = $_POST['parentsno'];
	$update_profile = $mysqli->query("UPDATE users SET full_name = '$fullname',
                      rollno= '$rollno', phoneno = $phoneno, roomno = '$roomno'
                      ,block=$block,parentsno=$parentsno WHERE username = '$user'");
	    if ($update_profile) {
		   header("Location: personalinfo.php?user=$user");
	    } else {
		  echo $mysqli->error;
	    }
	}
?>
