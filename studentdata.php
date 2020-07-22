<?php
    require('db.php');
    session_start();
    $mess_id = $_SESSION['mess_id'];
    $query = "select * from students where students.mess_id='".$mess_id."';";
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