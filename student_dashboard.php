<?php
    require "db.php";
    require_once "partials.php";
    session_start();
    if(!$_SESSION['rollno'])
    {
        header("location: login.html");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="application.js"></script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Grid</title>
  <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.esm.js"></script>
  <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core@next/css/ionic.bundle.css"/>
    <script type="module">
    
    import { toastController } from 'https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/index.esm.js';
    window.toastController = toastController;
    import { popoverController } from 'https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/index.esm.js';
    window.popoverController = popoverController;
</script>
  <style>
    .extraToast
    {
        --background: green;
    }
    ion-item.side_tabs.item:hover {
  --ion-background-color: #a179d5 !important;
  border-radius: 4px;
    }
    ion-item.active.item:hover {
  --ion-background-color: #b88eed !important;
  border-radius: 4px;
    }
    ion-item.side_tabs{
        --ion-background-color: #8f15f4;
        border-radius: 4px;
        margin-top: 4px;
    }
    ion-item.active
    {
    --ion-background-color: #b88eed;
        border-radius: 4px; 
    }
    ion-list.side_list
    {
        --ion-background-color: #8f15f4;
    }
    .side_icons
    {
        font-size: 25px; color: white; margin-top: 15px
    }
    .side_label
    {
        position: relative; left: 15px;bottom: 5px; color: white; font-size: 14px
    }
    .navlink:hover
    {
        color: black;
    }
    .navlink
    {
        color: grey;
    }
    :root {

        --input-color: #99A3BA;
        --input-border: #CDD9ED;
        --input-background: #fff;
        --input-placeholder: #CBD1DC;
    
        --input-border-focus: #275EFE;
    
    }
    
    .form-field {
        display: block;
        width: 100%;
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
 #x{
    --ion-background-color: #8f15f4;
    color: white;
  }
  #y{
    background-color: #8f15f4;
    height: 64px;
  }   


  </style>
</head>
<body>
  <ion-app>
      <ion-content>
      
      <ion-grid class="ion-no-padding">
        <ion-row  style="height: 1000px">
            <ion-col class="ion-no-padding" size='2.035' style="background-color: #8f15f4;">
                <ion-row style="height: 63px">
                    <ion-col style="border-bottom: 1px solid rgba(255, 255, 255, 0.2)">
                        <label style="position: relative; left: 45px; top: 20px; weight: 500; font-weight: 400; font-size: 18px; color: white;">STUDENT DASHBOARD</label>
                    </ion-col>
                </ion-row>
                <ion-row>
                    <ion-col>
                        <ion-list class="side_list" class="ion-no-padding" style="margin-top: 20px; margin-left: 15px; margin-right: 15px">
                            <ion-item lines='none' class="side_tabs" onClick="viewOptionStudent(event,'profile');
                            document.getElementById('profile_content').innerHTML='<ion-spinner></ion-spinner>'; post('/studentprofile','student_profile[student_id]=<%= @student.id %>',(data)=>{onGetProfile(data,'profile_content',false)})" id="defaultOpen">
                                <div style="height: 57px;">
                                    <a>
                                        <ion-icon name="person-outline" class="side_icons"></ion-icon>
                                        <label class="side_label">PROFILE</label>
                                    </a>
                                </div>
                            </ion-item>
                            <ion-item lines='none' class="side_tabs" onClick="viewOptionStudent(event,'extra');  ">
                                <div style="height: 57px;">
                                    <a>
                                        <ion-icon name="beer-outline" class="side_icons"></ion-icon>
                                        <label class="side_label">EXTRAS</label>
                                    </a>
                                </div>
                            </ion-item>
                            <ion-item lines='none' class="side_tabs" onClick="  
                            viewOptionStudent(event,'guests');">
                                <div style="height: 57px;">
                                    <a>
                                        <ion-icon name="people-outline" class="side_icons"></ion-icon>
                                        <label class="side_label">GUESTS</label>
                                    </a>
                                </div>
                            </ion-item>
                            <ion-item lines='none' class="side_tabs" onClick="viewOptionStudent(event,'messcut')">
                                <div style="height: 57px;">
                                    <a>
                                        <ion-icon name="home-outline" class="side_icons"></ion-icon>
                                        <label class="side_label">MESS CUT</label>
                                    </a>
                                </div>
                            </ion-item>
                        
                            <ion-item lines='none' class="side_tabs"  onClick="viewOptionStudent(event,'fee')">
                                <div style="height: 57px;">
                                    <a>
                                        <ion-icon name="newspaper-outline" class="side_icons"></ion-icon>
                                        <label class="side_label">CHECK MESS FEE</label>
                                    </a>
                                </div>
                            </ion-item>

                        </ion-list>
                
                    </ion-col>
                </ion-row>

            </ion-col>
            <ion-col>
                <ion-row style="height: 63px; border-bottom: 1px solid rgba(0, 0, 0, 0.2)">
                    <ion-col size='3'>
                        <label style="position: relative; left: 500px; top: 20px; weight: 500; font-weight: 400; font-size: 19px; color: grey">MESS MANAGEMENT</label>
                    </ion-col>
                    <ion-col offset='6' size='3'>
                        <a style="text-decoration: none; position: relative; left: 45px; top: 20px; font-size: 16px;" onClick="changePasswordPopover(event)" class="navlink">Change Password</a>
                        <a class="navlink" href="logout.php" style="text-decoration:none; position: relative; left: 75px; top: 20px; font-size: 16px;">Logout</a>
                    </ion-col>
                </ion-row>
                <ion-row style="height: 1000px">
                    <ion-col>
                        <div>
                    
                

                        <div id="profile" class="tabcontent" style="display:none;">

                            <?php 
                                $roll_no = $_SESSION['rollno'];
                                $query = "select * from students where students.rollno='".$roll_no."';";
                                $exec = mysqli_query($con,$query);
                                if(!$exec)
                                {
                                    die('Some error has occured!');
                                }
                                $result = mysqli_fetch_array($exec);
                               // echo $result[1];
                            ?>

                            <ion-row>
                            
                                <ion-col offset=2 size=8>
                                <br>
                                        <div  style="text-align: center;"><h1>PERSONAL INFORMATION</h1></div><br>
                            <br><br>            
                                        <ion-card>
                                            <ion-card-container>
                                                <ion-list lines="none">
                                                    <ion-item>
                                                        <ion-col size=4.5>
                                                            <ion-label> Name</ion-label>
                                                        </ion-col>
                                                        <ion-col size=2>
                                                            :
                                                        </ion-col>
                                                        <ion-col size=5.5>
                                                           <?php echo $result[1]; ?>
                                                        </ion-col>    
                                                    </ion-item>
                                                    <ion-item>
                                                        <ion-col size=4.5>
                                                            <ion-label>E-Mail</ion-label>
                                                        </ion-col>
                                                        <ion-col size=2>
                                                            :
                                                        </ion-col>
                                                        <ion-col size=5.5>
                                                           <?php echo $result[2]; ?>
                                                        </ion-col>    
                                                    </ion-item>
                                                    <ion-item>
                                                        <ion-col size=4.5>
                                                            <ion-label>Roll No</ion-label>
                                                        </ion-col>
                                                        <ion-col size=2>
                                                            :
                                                        </ion-col>
                                                        <ion-col size=5.5>
                                                           <?php echo $result[3]; ?>
                                                        </ion-col>    
                                                    </ion-item>
                                                    <ion-item>
                                                        <ion-col size=4.5>
                                                            <ion-label>Mess Code</ion-label>
                                                        </ion-col>
                                                        <ion-col size=2>
                                                            :
                                                        </ion-col>
                                                        <ion-col size=5.5>
                                                           <?php echo $result[6]; ?>
                                                        </ion-col>    
                                                    </ion-item>
                                                    <ion-item>
                                                        <ion-col size=4.5>
                                                            <ion-label>Room No</ion-label>
                                                        </ion-col>
                                                        <ion-col size=2>
                                                            :
                                                        </ion-col>
                                                        <ion-col size=5.5>
                                                           <?php echo $result[5]; ?>
                                                        </ion-col>    
                                                    </ion-item>
                                                </ion-list>
                                            </ion-card-container>
                                        </ion-card>
                                </ion-col>
                            </ion-row>
                            
                        

                    </div>

                    <div id="guests" class="tabcontent" style="display:none;"><br>
                    <div style="text-align: center;"><h1 >MY GUESTS</h1></div>
                    <br>
                        
                    <ion-row><ion-col offset=2 size=8>
                    <ion-card>
                    <ion-card-header id="y"><ion-item id="x"><ion-col>S.No</ion-col><ion-col>Guest Name</ion-col><ion-col>Student Roll No</ion-col></ion-item></ion-card-header>
                    <ion-card-content style="padding-bottom: 0px;">
                    <ion-list style="padding-bottom: 0px">

                    <?php
                        $roll_no = $_SESSION['rollno'];
                        $query = "select * from guests where guests.rollno='".$roll_no."';";
                        $query2 = "select count(*) from guests where guests.rollno='".$roll_no."';";
                        $exec = mysqli_query($con,$query);
                        $exec2 = mysqli_query($con,$query2);
                        if(!$exec || !$exec2)
                        {
                            die("Error");
                        }
                        //$res1 = mysqli_fetch_array($exec);
                        $res2 = mysqli_fetch_array($exec2);
                        
                        if($res2[0]==0)
                        {
                            echo "No Guests have been recorded yet.";
                        }
                    
                        else
                        {
                            $i=0;
                                   
                                while($result=mysqli_fetch_array($exec))
                                {
                                   $i++;
                                    echo '<ion-item>
                                    <ion-col>
                                       '.$i.'
                                    </ion-col>
                                   <ion-col>
                                        '.$result[1].'
                                   </ion-col>
                                    <ion-col>
                                        '.$result[3].'
                                    </ion-col>
                                    </ion-item>';
                                    

                                }
                            
                        }
                    ?>
                    <br>
                    </ion-col></ion-row>
                    </div>

                    <div id="staff_list" class="tabcontent" style="display:none;">
                    <h3>Staff List</h3>
                    <p>List of all staff goes here</p> 
                    </div>


                    <div id="messcut" class="tabcontent" style="display:none;"><br>
                    <div style="text-align: center;"><h1>MESS CUT ENTRY</h1></div>
                    <br><br>
                    <ion-row><ion-col offset=1.9 size=8>
                    <ion-card style="width:900px;">
                        <br><br>
                        <ion-card-container>

                        <?php
                            if(isset($_REQUEST['from_date']))
                            {
                                $from_date = $_REQUEST['from_date'];
                                $to_date = $_REQUEST['to_date'];

                            }
                            else
                            {
                        ?>

                        <form id="myform" class="mess_cut" method="post" action="">
                            <ion-list lines="none">
                                <ion-item>
                                    <ion-col>
                                    
                                        From Date&emsp;
                                    </ion-col>
                                    <ion-col>
                                        <input  type="date"  id="from_date" name="pickup_date" onchange="cal()" format="dd/mm/yyyy" class="form-field">
                                    
                                    </ion-col>
                                    <ion-col>
                                        &emsp;To Date&emsp;
                                    </ion-col>
                                    <ion-col>
                                        <input  type="date" id="to_date" name="dropoff_date" onchange="cal()" format="dd/mm/yyyy" class="form-field">
                                    </ion-col>
                                    
                                    <ion-col>
                                       &emsp; No Of Days&emsp;
                                    </ion-col>
                                    <ion-col>
                                    <input type="text" class="form-field" id="no_of_days" name="numdays"/>
                                    </ion-col>
                                </ion-item>
                                <br> 
                                <br>
                            <ion-item>
                            <ion-col></ion-col>
                            
                            <ion-col>
                            <ion-button id="submit" onClick="post('/addMessCut.php',postData('form-field'),onMessCut);" style = "width:200px;height:40px;background-color: #8f15f4;color:white;" color="#8f15f4">SUBMIT</ion-button>
                            </ion-col>
                            <ion-col>
                            <ion-button id="reset" type="reset" style = "width:200px;height:40px;background-color: #8f15f4;color:white;" color="#8f15f4">RESET</ion-button>
                            </ion-col>
                            <ion-col></ion-col>
                            </ion-item>
                            </ion-list>
                            </form>
                    <?php } ?>
                        </ion-card-container>
                        <br>
                    </ion-card></ion-col></ion-row>
                        <br><br>
                    <div style="text-align: center;"><h3>MY DETAILED MESS CUT LIST</h3></div><br>
                    <ion-row><ion-col offset=2 size=8>
                    <div id="p">
                    <ion-card>
                            <ion-card-header id="y">
                                <ion-item id="x"><ion-col>S.No</ion-col><ion-col>From Date</ion-col><ion-col>To Date</ion-col><ion-col>No Of Days</ion-col></ion-item>
                            </ion-card-header>
                            <ion-card-content style='padding-bottom: 0px;'>
                                <ion-list style='padding-bottom: 0px;'>
                                <?php
                        $roll_no = $_SESSION['rollno'];
                        $query = "select * from mess_cuts where mess_cuts.rollno='".$roll_no."';";
                        $query2 = "select count(*) from mess_cuts where mess_cuts.rollno='".$roll_no."';";
                        $exec = mysqli_query($con,$query);
                        $exec2 = mysqli_query($con,$query2);
                        if(!$exec || !$exec2)
                        {
                            die("Error");
                        }
                        //$res1 = mysqli_fetch_array($exec);
                        $res2 = mysqli_fetch_array($exec2);
                        
                        if($res2[0]==0)
                        {
                            echo "No Mess cuts have been recorded yet.";
                        }
                    
                        else
                        {
                            $i=0;
                                   
                                while($result=mysqli_fetch_array($exec))
                                {
                                   $i++;
                                    echo '<ion-item>
                                    <ion-col>
                                       '.$i.'
                                    </ion-col>
                                   <ion-col>
                                        '.$result[2].'
                                   </ion-col>
                                    <ion-col>
                                        '.$result[3].'
                                    </ion-col>
                                    <ion-col>
                                        '.$result[4].'
                                    </ion-col>
                                    </ion-item>';
                                    

                                }
                            
                        }
                        ?>
                        </ion-list>
                            </ion-card-content>
                        </ion-card>
                                 
                                            
                                
                    </div>
                    </ion-col></ion-row>
                    </div>

                    
                    <div id="extra" class="tabcontent" style="display:none;"><br>
                    <div style="text-align: center;"><h1>MY EXTRAS</h1></div>
                        <br>
             
                        <ion-row><ion-col offset=2 size=8>
                        <?php
                        $roll_no = $_SESSION['rollno'];
                        $query = "select * from extras where extras.rollno='".$roll_no."';";
                        $query2 = "select count(*) from extras where extras.rollno='".$roll_no."';";
                        $exec = mysqli_query($con,$query);
                        $exec2 = mysqli_query($con,$query2);
                        if(!$exec || !$exec2)
                        {
                            die("Error");
                        }
                        //$res1 = mysqli_fetch_array($exec);
                        $res2 = mysqli_fetch_array($exec2); ?>
                        <ion-card>
                            <ion-card-header id="y"><ion-item id="x"><ion-col>S.no</ion-col><ion-col>Item Name</ion-col><ion-col>Item Price</ion-col></ion-item></ion-card-header>
                            <ion-card-content>
                        <?php
                        $sum=0;
                        if($res2[0]==0)
                        {
                            echo "No Extras have been recorded yet.";
                        }
                    
                        else
                        {
                            $i=0;    
                                while($result=mysqli_fetch_array($exec))
                                {
                                   $i++;
                                    echo '<ion-item>
                                    <ion-col>
                                       '.$i.'
                                    </ion-col>
                                   <ion-col>
                                        '.$result[2].'
                                   </ion-col>
                                    <ion-col>
                                        '.$result[3].'
                                    </ion-col>
                                    </ion-item>';

                                     $sum=$sum+$result[3];

                                }
                            
                                
                            
                        }
                        
                    ?>
                    </ion-card-content>
                            <ion-card-footer id="y"><ion-item id="x"><ion-col></ion-col><ion-col>Total Amount</ion-col><ion-col><?php echo $sum;?></ion-col></ion-item></ion-card-footer>
                        </ion-card>
                       
                        <br>
                        </ion-col></ion-row>
                    </div>

                    
                    <div id="fee" class="tabcontent">
                        <ion-row>
                            <ion-col size=4 offset=3>
                                <ion-row><ion-col offset=1><div style="text-align: center;"><h1>My Mess Fee</h1></div><br><br></ion-col></ion-row>
                                <?php echo "<input type=hidden value='0'/><ion-button expand='block' value=0 onClick='check(\"".$_SESSION['rollno']."\",\"fees\",this);'  style='height:40px;background-color: #8f15f4;color:white;' color='#8f15f4'>GET DETAILED FEE<ion-icon slot='end' name='chevron-down'></ion-icon></ion-button>"; ?>
                                <br>
                                <div id='fees'></div>
                            </ion-col>
                        </ion-row>
                    </div>

                </div>
                    </ion-col>
                </ion-row>
            </ion-col>
        </ion-row>
      </ion-grid>
    </ion-content>
  </ion-app>
</body>
<script type='text/javascript'>





    customElements.define('change-password', class ModalContent extends HTMLElement {
      connectedCallback() {
        this.innerHTML =`<?php echo $changePasswordStudent; ?>`;
      }
    });
    document.getElementById('defaultOpen').click();

</script>
</html>
