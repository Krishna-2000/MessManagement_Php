<?php
    require('db.php');
    session_start();
    $rollno = $_REQUEST['rollno'];
    $query = "select * from students where rollno='".$rollno."';";
    $result = mysqli_query($con,$query);
    if(!$result)
    {
                die("Some error occurred. <a href='login.php'>Go back</a>");
    } 
    $row = mysqli_fetch_assoc($result);
    echo json_encode(['data'=>$row]);   

?>