<?php
require "db.php";
session_start();
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in']!=true)
{
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>Bootstrap Profile Page Design - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
    body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}    </style>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          window.parent.postMessage( iframe_height, 'https://bootsnipp.com');
        });
    </script>
</head>
<body>

    <div class="container emp-profile">
            <form method="post" action="roll-call-action.php">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                            <?php
                                $user=$_SESSION['username'];
                                $sql="select * from student where username='".$user."'";
                                $exec=mysqli_query($con,$sql);
                                $result=mysqli_fetch_array($exec);
                                   echo '<h5><b>
                                        '.$result[1].'</b>
                                    </h5>
                                    <h6>
                                        Student : National Institute of Technology Calicut
                                    </h6>';
                                ?>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Roll List</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href=logout.php class="profile-edit-btn" name="btnAddMore">Logout</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <?php
                                
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
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$result[1].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Roll No</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$result[2].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone No</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$result[3].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Room No</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$result[4].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Block</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$result[5].'</p>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <label>Parent\'s No</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$result[6].'</p>
                                            </div>
                                        </div>';

                                ?>
                                <div>
                                                         

                                            

                                            <?php
                                                $roll_no=$result['roll_no'];

                                               // echo $roll_no;
                                                //$_SESSION['username']=$result[0];
                                                $_SESSION['roll_no']=$roll_no;
                                            ?>
                     
                                        <input type="submit" name="roll_call" value="Roll In" />

                                    </form>  
                                </div>          
                                    
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <?php
                                    require "db.php";
                                    $sql="select * from student_status";
                                    $exec=mysqli_query($con,$sql);
                                    while($result=mysqli_fetch_array($exec))
                                    {
                                        echo '<div class="row"><div class="col-md-6"><label>'.$result[0].'</label></div><div class="col-md-6"><p>'.$result[1].'</p></div></div>';
                                    }
                                    ?>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>  <script type="text/javascript">
        </script>
</body>
</html>
