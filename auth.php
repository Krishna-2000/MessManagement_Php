<?php
    require "db.php";
    session_start();
    $rollno=$_REQUEST['rollno'];
    $password=$_REQUEST['password'];
    $query="select * from students where rollno='".$rollno."';";
    $execute = mysqli_query($con,$query);
        if(!$execute)
        {
            die("Some error occurred. <a href='login.php'>Go back</a>");
        }

    $row = mysqli_fetch_assoc($execute);
    if(mysqli_num_rows($execute)!=1)
    {
        echo "invalid rollno. <a href='login.html'>Go back</a>";
    }
    elseif($row["password"]!=$password)
    {
        echo "wrong password. <a href='login.html'>Go back</a>";

    }
    else{
        $_SESSION['rollno'] = $rollno;
        header("location:student_dashboard.php");
    }

?>