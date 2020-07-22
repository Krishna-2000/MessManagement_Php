<?php
    require "db.php";
    require_once "partials.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="application.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grid</title>
  <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.esm.js"></script>
  <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/ionic.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core@next/css/ionic.bundle.css"/>
  <script type="module">
    import { toastController } from 'https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/index.esm.js';
    window.toastController = toastController;
    import { modalController } from 'https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/index.esm.js';
    window.modalController = modalController;
    import { alertController } from 'https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/index.esm.js';
    window.alertController = alertController;
    import { popoverController } from 'https://cdn.jsdelivr.net/npm/@ionic/core@next/dist/ionic/index.esm.js';
    window.popoverController = popoverController;
  </script>
  <style>
    .student_select .popover-content {
  width: 500px;
  max-height: 600px;
}
    .extraToast
    {
        --background: green;
    }

    .searchbar-clear-icon {
display: none !important;
}

    .alertbuttonyes{
  color: red !important;
}
.alertbuttonno{
  color: #8f15f4 !important;
}

    .addstaff .modal-wrapper {
  height: 275px !important;
  width: 300px !important;
  position: relative;
  bottom: 150px;
  left: 50px;

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
    ion-button{
        --ion-background-color: #8f15f4;
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

.extra-field {
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
    background: var(--input-backgro und);
    transition: border .3s ease;
    &::placeholder {
        color: var(--input-placeholder);
    }
    &:focus {
        outline: none;
        border-color: var(--input-border-focus);
    }
}
.guest-field {
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



.mess-cut-field {
    display: block;
    width: 195%;
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
                        <label style="position: relative; left: 45px; top: 20px; weight: 500; font-weight: 400; font-size: 18px; color: white;">MESS DASHBOARD</label>
                    </ion-col>
                </ion-row>
                <ion-row>
                    <ion-col>
                        <ion-list class="side_list" class="ion-no-padding" style="margin-top: 20px; margin-left: 15px; margin-right: 15px">
                            <ion-item lines='none' class="side_tabs" onClick="viewOptionMess(event,'extra')" id="defaultOpen">
                                <div style="height: 57px;">
                                    <a>
                                        <ion-icon name="fast-food-outline" class="side_icons"></ion-icon>
                                        <label class="side_label">ADD EXTRA</label>
                                    </a>
                                </div>
                            </ion-item>
                            <ion-item lines='none' class="side_tabs" onClick="viewOptionMess(event,'guest')">
                                <div style="height: 57px;">
                                    <a>
                                        <ion-icon name="person-add-outline" class="side_icons"></ion-icon>
                                        <label class="side_label">ADD GUEST</label>
                                    </a>
                                </div>
                            </ion-item>
                            <ion-item lines='none' class="side_tabs" onClick="viewOptionMess(event,'student_list')">
                                <div style="height: 57px;">
                                    <a>
                                        <ion-icon name="list-outline" class="side_icons"></ion-icon>
                                        <label class="side_label">STUDENT LIST</label>
                                    </a>
                                </div>
                            </ion-item>
                            <ion-item lines='none' class="side_tabs" onClick="viewOptionMess(event,'staff_list')">
                                <div style="height: 57px;">
                                    <a>
                                        <ion-icon name="people-outline" class="side_icons"></ion-icon>
                                        <label class="side_label">MESS STAFF LIST</label>
                                    </a>
                                </div>
                            </ion-item>
                            <ion-item lines='none' class="side_tabs" onClick="viewOptionMess(event,'messcut');document.getElementById('mess_cut_data').style.display='block';">
                                <div style="height: 57px;">
                                    <a>
                                        <ion-icon name="home-outline" class="side_icons"></ion-icon>
                                        <label class="side_label">MESS CUT</label>
                                    </a>
                                </div>
                            </ion-item>
                            <ion-item lines='none' class="side_tabs"  onClick="viewOptionMess(event,'fee')">
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
                <ion-row style="height: 63px; border-bottom: 1px solid rgba(0, 0, 0, 0.2);">
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
                    <div id="guest" class="tabcontent" style="display:none;">
                    
                    
                  
                     <div style="text-align: center;"><h1 >ADD GUEST</h1></div><br> <br>
                     <ion-row><ion-col size=4 offset=2.5>
                         <ion-card style = "width: 700px">
                          <form >  
                            <ion-card-content>
                            <ion-list lines="none" class="line-input">
            
                            <ion-item>
                                <ion-col>
                                 Student Roll No
                             </ion-col>
                             <ion-col>
                               <input type="text"  onfocus="selectRollGuest(event)" id="guest[student_id]" class="guest-field"/>
                             </ion-col>   
                            </ion-item>
                            <br>
                            <ion-item>
                            <ion-col>
                             Guest Name
                         </ion-col>
                         <ion-col>
                           <input type="text" name="item"  id="guest[name]" class="guest-field">
                         </ion-col>   
                        </ion-item>
                        <br>
                        <ion-item>
                        <ion-col>
                         Guest Roll No
                     </ion-col>
                     <ion-col>
                       <input type="text" name="price" id="guest[rollno]"  class="guest-field">
                     </ion-col>   
                    </ion-item>
                    <br>
                            </ion-list>
                            <ion-col offset="2.3">
                            <ion-button  onClick="this.innerHTML='<ion-spinner></ion-spinner>'; post('/mess/addguest',postData('guest-field'),(data)=>{onAddGuest(data,this)});" style = "width:200px;height:40px;background-color: #8f15f4;color:white;" color="#8f15f4">ADD GUEST</ion-button>
                            <ion-button  type="reset" id='reset2' style = "width:200px;height:40px;background-color: #8f15f4;color:white;" color="#8f15f4">RESET</ion-button>
                          </ion-col>
  
                        </ion-card-content>
                        </form>
                        </ion-card>
                        </ion-col></ion-row>
                        <br>
                        <br>
                        <br>

                    </div>

                    <div id="student_list" class="tabcontent" style="display:none;">
                        <ion-grid>
                            <ion-row>
                                <ion-col size=5 offset=3>
                                    <h3 style="text-align: center; padding-right:34px">STUDENT LIST</h3><br> 
                                    <ion-row><ion-col size=6>
                                    <ion-searchbar placeholder="Type Name" id="nameSearchBar_list_student"  onInput="filterStudentsByName('list_student')"></ion-searchbar></ion-col>
                                    <ion-col size=6>
                                    <ion-searchbar placeholder="Type Roll No" id="rollSearchBar_list_student" onInput="filterStudentsByRollNo('list_student')"></ion-searchbar></ion-col>
                                    </ion-row>
                                    <div id="list_student"><ion-spinner></ion-spinner></div>
                                </ion-col>
                            </ion-row>
                        </ion-grid>
                    </div>

                    <div id="staff_list" class="tabcontent" style="display:none;">
                        <ion-grid>
                    <ion-row>
                        <ion-col offset=3 size=5>
                            <h3 style="text-align: center;">STAFF LIST
                            </h3><br>
                                <div style="text-align: center;"><ion-button style="--ion-color-primary: #8f15f4;margin-right: 10px" id="addbutton" onClick="addStaffModal()">Add Staff<ion-icon slot="end" name='add'></ion-icon></ion-button></div>
                            <div id="stafflist"><ion-spinner style="position:relative; left: 50px; top:70px"></ion-spinner></div>

                        </ion-col>
                    </ion-row>
                </ion-grid>

                    </div>

                    <div id="messcut" class="tabcontent" style="display:none;">
                    <ion-row>
                   
                    <ion-col offset=2 size=8>
                    <div style="text-align: center;"><h3>MESS CUT: DETAILED LIST</h3></div><br>
                    <br>
                    <div id="mess_cut_area">
                    <!-- <div  style="text-align: center;"><small id="blink"><b>Select a date for a Sorted List</b></small></div>
                      <ion-row>
                      
                      <ion-col size=6 offset=0.2><input onfocus="this.type='date'" onblur="this.type='date'"  type="date" placeholder="Date" class="mess-cut-field" onChange="filterMessCuts();" id="filter_date" /></ion-col></ion-row>
                      <div id="noMatch" style="text-align: center;display: none;">There are no mess cuts on this date</div> -->
                    <div id="mess_cut_data">
                    <br>
                      <ion-card>
                        
                           <ion-card-header id="y"><ion-item id="x"><ion-col size=1>S.No</ion-col><ion-col offset=1.5>Roll No</ion-col><ion-col>From Date</ion-col><ion-col>To Date</ion-col><ion-col>No Of Days</ion-col>
                            </ion-item></ion-card-header>
                            <ion-card-content style="padding-bottom: 0px;">
                            <ion-list style="padding-bottom: 0px;"> 
                            <?php 
                              $query = " select * from mess_cuts where mess_cuts.rollno in (select students.rollno from students where students.mess_id='".$_SESSION['mess_id']."');";
                              $exec = mysqli_query($con,$query);
                              $count = " select count(*) from mess_cuts where mess_cuts.rollno in (select students.rollno from students where students.mess_id='".$_SESSION['mess_id']."');";
                              $exec2 = mysqli_query($con,$count);
                       
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
                                        '.$result[1].'
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
                      
                      </ion-list></ion-card-content></ion-card>
                    </div>
                  </div>




                  </ion-col></ion-row>
                  
                    </div>

                    <div id="extra" class="tabcontent" style="display: none;">
                        
                        
                        
                            <div style="text-align: center;"><h1>ADD EXTRA</h1></div><br><br>
                            <ion-row><ion-col size=4 offset=2.5> 
                        <ion-card style = "width: 700px">
                          <form id="myform" method = "post" action="">  
                          
                            <ion-card-content>
                            <ion-list lines="none" class="line-input">
            
                            <ion-item>
                                <ion-col>
                                 Roll No
                             </ion-col>
                             <ion-col>
                               <input type="text" onfocus="selectRollExtra(event)" name="student_id" id="extra[student_id]" class="extra-field"/>
                             </ion-col>   
                            </ion-item>
                            <br>
                            <ion-item>
                            <ion-col>
                             Item
                         </ion-col>
                         <ion-col>
                           <input type="text" name="item" id="extra[item]" class="extra-field"/>
                         </ion-col>   
                        </ion-item>
                        <br>
                        <ion-item>
                        <ion-col>
                         Price 
                     </ion-col>
                     <ion-col>
                       <input type="text" name="price" id="extra[price]" class="extra-field"/>
                     </ion-col>   
                    </ion-item>
                    <br>
                            </ion-list>
                            <ion-col offset="2.3">
                            <ion-button id="reset" onClick="this.innerHTML='<ion-spinner></ion-spinner>';post('/mess/extra',postData('extra-field'),(data)=>{onPostExtra(data,this)});" style = "width:200px;height:40px;background-color: #8f15f4;color:white;" color="#8f15f4">ADD EXTRA</ion-button>
                            <ion-button id="reset1" type="reset" style = "width:200px;height:40px;background-color: #8f15f4;color:white;" color="#8f15f4">RESET</ion-button>
                            </ion-col>
  
                        </ion-card-content>
                        </form>
                        </ion-card>
                        </ion-col></ion-row>
                        <br>
                        <br>
                        <br>
                    </div>

                   

                   <div id="fee" class="tabcontent" style="display:none;">
                    <ion-row><ion-col offset=2 size=8>
                    <div style="text-align: center;"><h3>MONTHLY MESS FEE</h3></div><br>

                    <br><br>
                    <ion-card>
                          <ion-card-header id="y">
                            
                              <ion-item id="x" lines="none"><ion-col><b>S.No</b></ion-col><ion-col><b>Roll No</b></ion-col><ion-col><b>Total Amount</b></ion-col>
                              </ion-item></ion-card-header>
                              <ion-card-content style="padding-bottom: 0px;"><ion-list style="padding-bottom: 0px;">

                    <?php 
                        $query1 = "select count(*) from students where mess_id='".$_SESSION['mess_id']."';";
                        $exec1 = mysqli_query($con,$query1);
                        if(!$exec1)
                        {
                          die('Error');
                        }
                        $res1=mysqli_fetch_array($exec1);
                        if($res1[0]==0)
                        {
                            echo "No one enlisted in the mess";
                        }
                        else
                        {
                              $i=0;
                              $query2 = "select rollno from students where mess_id='".$_SESSION['mess_id']."';";
                              $exec2 = mysqli_query($con,$query2);
                              $sum = 80*30;
                              
                              while($result=mysqli_fetch_array($exec2))
                              {

                                $extra = "select sum(item_price) from extras where rollno='".$result[0]."';";
                                $guests = "select count(*) from guests where rollno='".$result[0]."';";
                                $mess_cuts = "select sum(no_of_days) from mess_cuts where rollno='".$result[0]."';";
                                $ex1 = mysqli_query($con,$extra);
                                $ex2 = mysqli_query($con,$guests);
                                $ex3 = mysqli_query($con,$mess_cuts); 
                                if(!$ex1 || !$ex2 || !$ex3)
                                {
                                  die('Error');
                                }
                                $r1 = mysqli_fetch_array($ex1);
                                $r2 = mysqli_fetch_array($ex2);
                                $r3 = mysqli_fetch_array($ex3);
                                $sum += ($r1[0]+($r2[0]*80))-($r3[0]*80);
                                
                                // echo $r1[0];
                                // echo "hi";
                                // echo $r2[0];
                                // echo $r3[0];

                                 $i++;
                                  echo '<ion-item>
                                  <ion-col>
                                     '.$i.'
                                  </ion-col>
                                 <ion-col>
                                      '.$result[0].'
                                 </ion-col>
                                  <ion-col>
                                      '.$sum.'
                                  </ion-col>
                                  
                                  </ion-item>';
                                  $sum = 80*30;

                              }
                        }
                    ?>
                    </ion-list>
                        </ion-card-content>
                      </ion-card>
                    </div>
                    </ion-col>
                </ion-row>
            </ion-col>
        </ion-row>
      </ion-grid>
    </ion-content>
  </ion-app>
</body>

<script>

  customElements.define('student-data', class ModalContent extends HTMLElement {
      connectedCallback() {
        this.innerHTML = `<%= render partial: 'student_data' %>`;
      }
    });


    customElements.define('select-roll-guest', class ModalContent extends HTMLElement {
      connectedCallback() {
        this.innerHTML = `<%= render partial: 'search_list', :locals=>{:id=>'guest'} %>`;
      }
    });


    customElements.define('change-password', class ModalContent extends HTMLElement {
      connectedCallback() {
        this.innerHTML =  `<?php echo $changePasswordMess; ?>`;
      }
    });





    customElements.define('select-roll-extra', class ModalContent extends HTMLElement {
      connectedCallback() {
        this.innerHTML = `<%= render partial: 'search_list', :locals=>{:id=>'extra'} %>`;
      }
    });






customElements.define('add-staff-form', class ModalContent extends HTMLElement {
      connectedCallback() {
        this.innerHTML = `<%= render partial: 'add_staff'%> `;
      }
    });

    let currentModal = null;



// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();


// var blink = document.getElementById('blink');
// setInterval(function() {
//    blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
// }, 3000); 



</script>
</html>