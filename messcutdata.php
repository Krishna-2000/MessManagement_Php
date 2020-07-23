<?php
    require('db.php');
    session_start();
    $rollno = $_REQUEST['rollno'];
    $query = "select * from students,mess_cuts where students.rollno=mess_cuts.rollno and students.rollno='".$rollno."';";
    $result = mysqli_query($con,$query);
    if(!$result)
    {
                die("Some error occurred. <a href='login.php'>Go back</a>");
    } 
    $data=array();
    while($row = mysqli_fetch_assoc($result))
    {
        if(sizeof($row)>0)
        {

            array_push($data,$row);
        } 
    }
    echo json_encode(['data'=>$data]);  

?>