<html>    
<head>       
<meta charset="UTF-8">
<title>Student details</title>
</head>
<body>
<?php
require_once "db.php";

$sql = "SELECT roll_no FROM student_status WHERE status='absent' ";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	$roll=$row["roll_no"];
	$sql1 = "SELECT * FROM student WHERE roll_no='$roll'";
	$result1 = $con->query($sql1);
	$row1 = $result1->fetch_assoc();
        echo "Roll No: " . $row["roll_no"]."Name:".$row1["name"]."Room Number:".$row1["room_no"]."Block Number:".$row1["block"]."Phone Number:".$row1["phone_no"]."Parent Number:".$row1["parent_no"]. "<br>";
    }
} else {
    echo "0 results";
}
$con->close();
?>

<INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);"/>

</body>
</html> 
