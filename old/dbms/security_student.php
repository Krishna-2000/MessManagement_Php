
<html>    
<head>       
<meta charset="UTF-8">
<title>Student details</title>
</head>
<body>
<?php
require_once "db.php";

$sql = "SELECT roll_no,status FROM student_status";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Roll No: " . $row["roll_no"]. " - Status: " .$row["status"]. "<br>";
    }
} else {
    echo "0 results";
}
$con->close();
?>

<INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);"/>

</body>
</html> 
