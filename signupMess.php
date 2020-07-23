<script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.esm.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core@next/css/ionic.bundle.css"/>
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

<?php
    require_once('db.php');
    session_start();

    if(isset($_REQUEST['mess_name']))
    {
        $mess_name = $_REQUEST['mess_name'];
        $mess_id = $mess_name;
        $password = $_REQUEST['password'];
        $password_confirmation = $_REQUEST['password_confirmation'];
        $query = "insert into messes(mess_name,mess_id,password) values ('".$mess_name."','".$mess_id."','".$password."');";
        echo $query;    
        $exec = mysqli_query($con,$query);
        if(!$exec)
        {
            die("Some error has occured");
        }
        $_SESSION['mess_id'] = $mess_id;
        header("location: mess_dashboard.php");
    }
    else
    {

?>


<form class="mess_signup" action="" method="post">  
<ion-grid>
<ion-row>
  <ion-col></ion-col><ion-col>
    <ion-card style="width:500px;top:120px;"><br>
      <ion-card-title style="position:relative;left:200px;font-size:25px">SIGN UP</ion-card-title>
      <ion-list style="position:relative;left:70px;" lines="none">
        
        <br><ion-label>&emsp;&nbsp;Mess Name</ion-label>
        <ion-item>
          <input type="text" name="mess_name" class="form-field">
        </ion-item>
        <br><ion-label>&emsp;&nbsp;Password</ion-label>
        <ion-item>
          <input type="password" name="password" class="form-field">
        </ion-item>
        <br><ion-label>&emsp;&nbsp;Password Confirmation</ion-label>
        <ion-item>
          <input type="password" name="password_confirmation" class="form-field">
        </ion-item>
      </ion-list>

      <div style="position:relative;left:70px;"   >
        <input type="submit" class="btn-hover color-1" style="width: 300px;" name="Sign Up">
    </div>
    <div style="text-align: center;"><a style="text-decoration: none; font-size: 17px; color: rgba(0, 0, 0, 0.6);" onMouseOver="this.style.color='purple'" onMouseOut="this.style.color='rgba(0, 0, 0, 0.6)'" href="index.html">Login</a></div>
    <br><br>
    </ion-card>
  </ion-col>
  <ion-col></ion-col>
</ion-row>
</ion-grid>
</form>
</ion-content>

    <?php } ?>