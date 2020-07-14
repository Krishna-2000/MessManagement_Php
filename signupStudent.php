<script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.esm.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core@next/css/ionic.bundle.css"/>
<script type="text/javascript" src="application.js"></script>
<style>
:root {

    --input-color: #99A3BA;
    --input-border: #CDD9ED;
    --input-background: #fff;
    --input-placeholder: #CBD1DC;

    --input-border-focus: #275EFE;

}

.form-field {
    display: block;
    width: 70%;
    height: 80%;
    padding: 8px 16px;
    line-height: 25px;
    font-size: 14px;
    font-weight: 500;
    font-family: inherit;
    border-radius: 6px;
    -webkit-appearance: none;
    color: var(--input-color);
    border: 1px solid var(--input-border);
    background: var(--input-background);
    transition: border .3s ease;
    &::placeholder {
        color: var(--input-placeholder);
    }
    &:focus {
        outline: none;
        border-color: var(--input-border-focus);
    }
}
* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.buttons {
    margin: 10%;
    text-align: center;
}

.btn-hover {
    width: 200px;
    font-size: 16px;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
    margin: 20px;
    height: 55px;
    text-align:center;
    border: none;
    background-size: 300% 100%;

    border-radius: 50px;
    moz-transition: all .4s ease-in-out;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
}

.btn-hover:hover {
    background-position: 100% 0;
    moz-transition: all .4s ease-in-out;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
}

.btn-hover:focus {
    outline: none;
}

.btn-grad {background-image: linear-gradient(to right, #fc00ff 0%, #00dbde 51%, #fc00ff 100%)}
.btn-grad:hover { background-position: right center; }

.btn-hover.color-1 {
    background-image: linear-gradient(to right, #fc00ff 0%, #00dbde 51%, #fc00ff 100%);
    box-shadow: 0 4px 15px 0 rgba(49, 196, 190, 0.75);
}
html{
    background-image: black;
}
ion-content {
    --background: #ccc url("bg-01.jpg") no-repeat center center / cover;
}
</style>

<ion-content style="background-image: url('bg-01.jpg');">

<h1><?php session_start(); $rollno=$_SESSION['rollno']?></h1>
<?php 
    require_once('db.php');

    if(isset($_REQUEST['name']))
    {
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $password = $_SESSION['password'];
        $password_confirmation = $_REQUEST['password_confirmation'];
        $mess_id = $_REQUEST['mess_id'];
        $roomno = $_REQUEST['roomno'];
        
        $query = "INSERT INTO students(name,email,rollno,password,roomno,mess_id) VALUES ('".$name."','".$email."','".$rollno."','".$password."','".$roomno."','".$mess_id."')";
        $execute = mysql_query($con,$query);
        if(!execute)
        {
            die("Some error occurred");
        }
        header("location:login.php");
    }
    else
    {
    
?>


<form class="student_signup" method="post" action="" > 

          <ion-grid>
            <ion-row>
              <ion-col></ion-col><ion-col>
                <ion-card style="width:500px;top:50px;"><br>
                  <ion-card-title style="position:relative;left:200px;font-size:25px">SIGN UP</ion-card-title>
                  <ion-list style="position:relative;left:70px;" lines="none">
                    <br><ion-label>&emsp;&nbsp;Name</ion-label>
                    <ion-item>
                      <input type="text" name="name" class="form-field"><br>
                    </ion-item>
                    <br><ion-label>&emsp;&nbsp;E-Mail</ion-label>
                    <ion-item>
                      <input type="text" name="email" class="form-field"><br>
                    </ion-item>
                    <br><ion-label>&emsp;&nbsp;Roll No</ion-label>
                    <ion-item>
                      <input type="text" name="rollno" class="form-field"><br>
                    </ion-item>
                    <br><ion-label>&emsp;&nbsp;Password</ion-label>
                    <ion-item>
                      <input type="text" name="password" class="form-field"><br>
                    </ion-item>
                    <br><ion-label>&emsp;&nbsp;Password Confirmation</ion-label>
                    <ion-item>
                      <input type="text" name="Password_confirmation" class="form-field"><br>
                    </ion-item>
                    <br><ion-label>&emsp;&nbsp;Mess Name</ion-label>
                    <ion-item>
                        <select class="form-field">
                            <option>Mess1</option>
                            <option>Mess2</option>
                            <option>Mess3</option>
                        </select><br>
                    </ion-item>
                    <br><ion-label>&emsp;&nbsp;Room No</ion-label>
                    <ion-item>
                      <input type="text" name="roomno" class="form-field"><br>
                    </ion-item>
                  </ion-list>

                  <div style="position:relative;left:70px;"   >
                    <input type="submit" name="Sign Up" style="width: 300px;" class="btn-hover color-1">
                </div>
                <div style="text-align: center;"><a style="text-decoration: none; font-size: 17px; color: rgba(0, 0, 0, 0.6);" onMouseOver="this.style.color='purple'" onMouseOut="this.style.color='rgba(0, 0, 0, 0.6)'" href="login.php">Login</a></div>
                <br><br>
                </ion-card>
              </ion-col>
              <ion-col></ion-col>
            </ion-row>
          </ion-grid>
</form>
<?php } ?>
</ion-content>