<?php
    require "db.php"; 
    session_start();
    $mess_name=$_REQUEST['mess_name'];
    $password=$_REQUEST['password'];
    $query="select * from messes where mess_name='".$mess_name."';";
    $execute = mysqli_query($con,$query);
        if(!$execute)
        {
            die("Some error occurred. <a href='index.html'>Go back</a>");
        }

    $row = mysqli_fetch_assoc($execute);
    if(mysqli_num_rows($execute)!=1)
    {
        echo "invalid rollno. <a href='index.html'>Go back</a>";
    }
    elseif($row["password"]!=$password)
    {
        echo "wrong password. <a href='index.html'>Go back</a>";

    }
    else{
        $_SESSION['mess_id'] = $row['mess_id'];
        header("location:mess_dashboard.php");
    }

?>