function loginToggle(event)
{
  if(event.target.value=='student')
  {
    document.getElementById('studentLogin').style.display='block';
    document.getElementById('messLogin').style.display='none';
  }
  if(event.target.value=='mess')
  {
    document.getElementById('studentLogin').style.display='none';
    document.getElementById('messLogin').style.display='block';
  }

}


function studentDataOptionChange(event)
{
  var id=document.getElementById('student_data_id').value;
  document.getElementById('profileContent').innerHTML="<ion-spinner></ion-spinner>";
  if(event.target.value=='extras')
  {
    post('/extradata','extra_list[student_id]='+id,(data)=>{onGetExtraList(data,'profileContent')})
  }
  if(event.target.value=='guests')
  {
    post('/guestdata','guest_list[student_id]='+id,(data)=>{onGetGuestList(data,'profileContent')})
  }
  if(event.target.value=='profile')
  {

    post('/studentprofile','student_profile[student_id]='+id,(data)=>{onGetProfile(data,'profileContent',true)})
  }
  if(event.target.value=='messfee')
  {
        post('/feestructure','fee[student_id]='+id,(data)=>{onGetFee(data,'profileContent')});  
  }
  if(event.target.value=='messcuts')
  {
        post('/messcutdata','student_profile[student_id]='+id,(data)=>{onGetMessCuts(data,'profileContent')});  
  }
}

function onGetMessCuts(data,id)
{
  var txt="";
  var sum=0;
  var i;
  var myObj = JSON.parse(data);

            if(myObj.data.length==0)
            {
                txt += "<p style='text-align:center;''>No Mess Cuts Given</p>"
            }
            else
            {
                txt+="<br><ion-card ><ion-card-container><ion-list><ion-card-header><ion-item><ion-col>From</ion-col><ion-col>To</ion-col><ion-col>No of Days</ion-col></ion-item></ion-card-header>"
                for(i=0;i<myObj.data.length;i++)
                {
                    txt+="<ion-item lines='none' ><ion-col>"+myObj.data[i].from_date+"</ion-col><ion-col>"+myObj.data[i].to_date+"</ion-col><ion-col>"+myObj.data[i].no_of_days+"</ion-col></ion-item>"
                }

            } 
            document.getElementById(id).innerHTML = txt;

}



function onGetExtraList(data,id)
{
  var txt="";
  var sum=0;
  var i;
  var myObj = JSON.parse(data);

            if(myObj.data.length==0)
            {
                txt += "<p style='text-align:center;''>No Extra Taken</p>"
            }
            else
            {
                txt+="<br><ion-card><ion-card-container><ion-list><ion-card-header><ion-item><ion-col><strong>S.No</strong></ion-col><ion-col><strong>Item</strong></ion-col><ion-col><strong>Price</strong></ion-col></ion-item></ion-card-header>"
                for(i=0;i<myObj.data.length-1;i++)
                {
                    sum+=myObj.data[i].price;
                    txt+="<ion-item lines='none' ><ion-col>&emsp;"+(i+1)+"."+"</ion-col><ion-col>&nbsp;"+myObj.data[i].item+"</ion-col><ion-col>"+myObj.data[i].price+".00"+"</ion-col></ion-item>"
                }
                sum+=myObj.data[i].price;
                txt+="<ion-item><ion-col>&emsp;"+(i+1)+"."+"</ion-col><ion-col>&nbsp;"+myObj.data[i].item+"</ion-col><ion-col>"+myObj.data[i].price+".00"+"</ion-col></ion-item></ion-list><ion-list><ion-card-footer><ion-item><ion-col></ion-col><ion-col>Total Amount</ion-col><ion-col>"+sum+".00"+"</ion-col></ion-item></ion-card-footer></ion-list></ion-card-container></ion-card>"

            } 
            document.getElementById(id).innerHTML = txt;

}

function onGetGuestList(data,id)
{
  var txt="";
  var i;
  var myObj = JSON.parse(data);
            if(myObj.data.length==0)
            {
                    txt += "<p style='text-align:center;''>No Guests Taken</p>"            }
            else
            {
                txt+="<br><ion-card><ion-card-container><ion-list><ion-card-header><ion-item><ion-col><strong>S.No</strong></ion-col><ion-col><strong>Guest Name</strong></ion-col><ion-col><strong>Guest Roll No</strong></ion-col></ion-item></ion-card-header>"
                for(i=0;i<myObj.data.length-1;i++)
                {
                  
                    txt+="<ion-item lines='none' ><ion-col>&emsp;"+(i+1)+"."+"</ion-col><ion-col>&emsp;"+myObj.data[i].name+"</ion-col><ion-col>"+myObj.data[i].rollno+"</ion-col></ion-item>"
                }
                txt+="<ion-item lines='none'><ion-col>&emsp;"+(i+1)+"."+"</ion-col><ion-col>&emsp;"+myObj.data[i].name+"</ion-col><ion-col>"+myObj.data[i].rollno+"</ion-col></ion-item></ion-list></ion-card-container></ion-card>";
            }
            document.getElementById(id).innerHTML = txt;
}




function getGuests(){
    var txt="",i;
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            if(myObj.data.length==0)
            {
                txt += "<p id='noMatch' style='text-align:center;display:none;'>No matching students</p>"
            }
            else
            {
                txt+="<br><ion-card style='width:700px'><ion-card-container><ion-list><ion-card-header><ion-item --ion-color-primary='#8f15f4'><ion-col>S.No</ion-col><ion-col>Guest Name</ion-col><ion-col>Guest Roll No</ion-col></ion-item></ion-card-header>"
                for(i=0;i<myObj.data.length-1;i++)
                {
                  
                    txt+="<ion-item lines='none' ><ion-col>"+(i+1)+"."+"</ion-col><ion-col>"+myObj.data[i].name+"</ion-col><ion-col>"+myObj.data[i].rollno+"</ion-col></ion-item>"
                }
                console.log(txt);
                txt+="<ion-item lines='none'><ion-col>"+(i+1)+"."+"</ion-col><ion-col>"+myObj.data[i].name+"</ion-col><ion-col>"+myObj.data[i].rollno+"</ion-col></ion-item></ion-list></ion-card-container></ion-card>"
                document.getElementById("guestz").innerHTML = txt;
              

            }
        }
    };
    xmlhttp.open("GET",'/guestlist', true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();

}

function GetDays(){
    var dropdt = new Date(document.getElementById("messcut[to_date]").value);
    var pickdt = new Date(document.getElementById("messcut[from_date]").value);
    return parseInt((dropdt - pickdt) / (24 * 3600 * 1000));
}

function cal(){
if(document.getElementById("messcut[to_date]")){
document.getElementById("messcut[no_of_days]").value=GetDays();
}  
}





let currentPopover = null;


    async function selectRollGuest(ev) {
      popover = await popoverController.create({
        component: 'select-roll-guest',
        event: ev,
        translucent: true,
        cssClass: 'student_select'
      });
      currentPopover = popover;
      await popover.present();
      getStudents("list_guest",'fillRollNoGuest',false);

    }

    async function selectRollExtra(ev) {
      popover = await popoverController.create({
        component: 'select-roll-extra',
        event: ev,
        translucent: true,
        cssClass: 'student_select'
      });
      currentPopover = popover;
      await popover.present();
      getStudents("list_extra",'fillRollNoExtra',false);

    }

    async function changePasswordPopover(ev) {
      popover = await popoverController.create({
        component: 'change-password',
        event: ev,
        translucent: true,
        cssClass: 'change_password'
      });
      currentPopover = popover;
      await popover.present();

    }


    function dismissPopover() {
      if (currentPopover) {
        currentPopover.dismiss().then(() => { currentPopover = null; });
      }
    }


function postData(className)
{
  var arr=document.getElementsByClassName(className)
  data="";
  var i;
  for(i=0;i<arr.length;i++)
  {
    if(i!=0)
    {
      data+="&";
    }
    data+=arr[i].id+"="+arr[i].value;
  }
  return data;

}




function post(url,postdata,callback){
  
    var token = document.querySelector('meta[name="csrf-token"]').content;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            callback(this.responseText);
        }
    };
    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.setRequestHeader('X-CSRF-Token', token);
    xmlhttp.send(postdata);
   
}

function onGetProfile(data,id,isOpeningModal)
{

  var student = JSON.parse(data);
  if(isOpeningModal)
  {
    document.getElementById('student_data_modal_title').innerHTML=student.data.name;
  }
  document.getElementById(id).innerHTML=`<ion-card><ion-card-container><br><ion-list lines="none"><ion-item><ion-col size=4.5><ion-label> Name    
                                </ion-label>
                                </ion-col>
                                <ion-col size=2>
                                    :
                                </ion-col>
                                <ion-col size=5.5>
                                ${student.data.name}
                                
                                </ion-col>
                            </ion-item>

                            <ion-item>
                                
                                <ion-col size=4.5>
                                <ion-label>
                                   Roll No    
                                </ion-label>
                                </ion-col>
                                <ion-col size=2>
                                    :
                                </ion-col>
                                <ion-col size=5.5>
                                ${student.data.rollno}
                                
                                </ion-col>
                            </ion-item>

                            <ion-item>
                                
                                <ion-col size=4.5>
                                <ion-label>
                                   E-Mail   
                                </ion-label>
                                </ion-col>
                                <ion-col size=2>
                                    :
                                </ion-col>
                                <ion-col size=5.5>
                                ${student.data.email}
                                
                                </ion-col>
                            </ion-item>

                            <ion-item>
                                
                                <ion-col size=4.5>
                                
                                  Mess    
                                
                                </ion-col>
                                <ion-col size=2>
                                    :
                                </ion-col>
                                <ion-col size=5.5>
                                ${student.mess}
                                
                                </ion-col>
                            </ion-item>

                            <ion-item>
                                
                                <ion-col size=4.5>
                                
                                   Room No    
                                
                                </ion-col>
                                <ion-col size=2>
                                    :
                                </ion-col>
                                <ion-col size=5.5>
                                ${student.data.roomno}
                                
                                </ion-col>
                            </ion-item>

                        </ion-list>
                        
                        </ion-card-container>
                        <br>
                        </ion-card>`

}

function onMessCut(data){

  var myObj = JSON.parse(data);
  if(myObj.added)
  {
      showToast("Mess Cut Marked Successfully");
      document.getElementById('reset').click();
  }
  else
  {
      alert(myObj.errors.map((er)=>" "+er))
  }
}

function onPostExtra(data,el)
{
  el.innerHTML="ADD EXTRA";
  var myObj = JSON.parse(data);
            if(myObj.added)
            {
                showToast("Extra Added Successfully");
                document.getElementById('reset1').click();
            }
            else
            {
                alert(myObj.errors.map((er)=>" "+er))
            }
}

function onChangePassword(data)
{
  document.getElementById('change_button').innerHTML="Change";
  var myObj = JSON.parse(data);
            if(myObj.changed)
            {
                showToast("Password Changed Successfully");
                dismissPopover();
            }
            else
            {
              var i,txt="";
              txt="<ul>";
                errors=myObj.errors.map((er)=>" "+er)
                for(i=0;i<errors.length;i++)
                {
                  txt+="<li style='color:red'>"+errors[i]+"</li>"
                }
                txt+="</ul>";
                document.getElementById('change_password_errors').innerHTML=txt;

            }
}

function changePassword(user)
{
  document.getElementById('change_button').innerHTML="<ion-spinner></ion-spinner>";
  errors=document.getElementById('change_password_errors');
  errors.innerHTML="";
  var newPassword=document.getElementById('change_password[new]').value;
  var confirmation=document.getElementById('change_password_confirm').value;
  if(newPassword!=confirmation)
  {
    errors.innerHTML="<ul><li style='color: red;'>Passwords dont match</li></ul>";
    document.getElementById('change_button').innerHTML="Change";

  }
  else
  {

  post('/'+user+'/changepassword',postData('changepassword'),onChangePassword);

  }

  


}


function onAddGuest(data,el)
{
  el.innerHTML="ADD GUEST";
  var myObj = JSON.parse(data);
            if(myObj.added)
            {
                showToast("Guest Added Successfully");
                document.getElementById('reset2').click();
            }
            else
            {
                alert(myObj.errors.map((er)=>" "+er))
            }
}

function onCreateStaff(data)
{
  myObj = JSON.parse(data);
        if(myObj.added)
        {
            dismissModal();
            getStaffs();
        }
        else
        {
            alert(myObj.errors);
        }
        }



async function showToast(message) {
      const toast = await toastController.create({
        duration: 2000,
        message: message,
        cssClass: 'extraToast',
        position: 'top',
      });

      await toast.present();
    }
    


    async function addStaffModal() {
      const modal = await modalController.create({
        component: 'add-staff-form',
        cssClass: 'addstaff',
      });

      await modal.present();
      currentModal = modal;
    }

    async function studentDataModal(student_data_id) {
      const modal = await modalController.create({
        component: 'student-data',
        cssClass: 'profileData',
      });
      await modal.present();
      document.getElementById('student_data_id').value=student_data_id;
      document.getElementById('student_data_modal_title').innerHTML='<ion-spinner></ion-spinner>';
      document.getElementById('initialSelectedSegment').click();

      currentModal = modal;
    }



    function dismissModal() {
      if (currentModal) {
        currentModal.dismiss().then(() => { currentModal = null; });
      }
    }








function viewOptionMess(evt, option) {
  document.getElementById('mess_cut_data').style.display='none';
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("side_tabs");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace("active", "");
  }
  evt.currentTarget.className += " active";
  document.getElementById(option).style.display = "block";  
  if (option=="student_list")
  {
    getStudents("list_student",'studentDataModal',true);
  }
  if (option=="staff_list")
  {
    getStaffs();
  }
}

function viewOptionStudent(evt, option) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("side_tabs");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace("active", "");
  }
  evt.currentTarget.className += " active";
  document.getElementById(option).style.display = "block";  
}


function fillRollNoGuest(val)
{
    document.getElementById('guest[student_id]').value=val;
    dismissPopover();
}

function fillRollNoExtra(val)
{
    document.getElementById('extra[student_id]').value=val;
    dismissPopover();
}




function getStudents(id,callback,isOpeningModal)
{

    var obj, dbParam, xmlhttp, myObj, x, txt = "";
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
        if(myObj.length==0)
        {
            txt+="<p style='text-align: center;'>There are no Students in this mess currently</p>"
            document.getElementById(id).innerHTML = txt;
        }
        else
        {
          var functionCall="";
                  txt += "<p id='noMatch_"+id+"' style='text-align:center;display:none;'>No matching students</p><ion-card id='students_card_"+id+"'><ion-list>"
        for (x in myObj) {
          if(isOpeningModal==true)
            {
                functionCall=callback+"(\""+myObj[x].id+"\")";
            }
          else
          {
                functionCall=callback+"(\""+myObj[x].rollno+"\")"
          }

            txt += "<ion-item class='student_item_"+id+"' lines='none' detail='true' href=# onClick='"+functionCall+"'><ion-icon name='person' style='color: #8f15f4;'></ion-icon><ion-grid><ion-row><ion-col size='6'><label class='student_name_"+id+"' style='padding-left: 15px; font-size: 17px; font-weight: 500;'>" + myObj[x].name + "</label></ion-col><ion-col size='4' offset='2'><label class='student_roll_no_"+id+"'>"+myObj[x].rollno+"</label></ion-col></ion-row></ion-item>";
        }
    txt += "</ion-list></ion-card></ion-grid>";  
    document.getElementById(id).innerHTML = txt;
}
  }
};
xmlhttp.open("GET", "/studentdata", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send();

}


function getStaffs()
{
    document.getElementById("stafflist").innerHTML = '<ion-spinner style="position:relative; left: 50px; top:70px"></ion-spinner>';   
    var obj, dbParam, xmlhttp, myObj, x, txt = "";
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
        if(myObj.length==0)
        {
            txt+="<p style='text-align: center;'>There are no Staffs in this mess currently</p>"
            document.getElementById("stafflist").innerHTML = txt;
        }
        else
        {
        txt += "<p id='noMatch' style='text-align:center;display:none;'>No matching students</p><ion-card id='students_card'><ion-list>"
        for (x in myObj) {
            txt += "<ion-item class='student_item' lines='none' href=#><ion-icon name='person' style='color: #8f15f4;'></ion-icon><ion-grid><ion-row><ion-col size='6'><label class='student_name' style='padding-left: 15px; position:relative; top: 4px;font-size: 17px; font-weight: 500;'>" + myObj[x].name + "</label></ion-col><ion-col size='3.5' offset='1.3'  ><ion-icon style='position:relative; top: 4px;color: #8f15f4; font-size:23px;' name='call'></ion-icon><label style='padding-left: 7px;' class='student_roll_no'>"+myObj[x].phoneno+"</label></ion-col><ion-col size='1.2'><ion-buttons><ion-button onClick='deleteAlert("+myObj[x].id+")' slot='icon-only'><ion-icon name='trash' style='color:red;font-size: 25px;'></ion-icon></ion-button></ion-buttons></ion-col></ion-row></ion-item>";
        }
    txt += "</ion-list></ion-card></ion-grid>";  
    document.getElementById("stafflist").innerHTML = txt;
}
  }
};
xmlhttp.open("GET", "/staffdata", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send();

}

function check(student_id,id,el){
    if(el.previousSibling.value=='1')
    {
      document.getElementById('fees').innerHTML='';
      el.previousSibling.value='0';
      el.innerHTML="GET DETAILED FEE<ion-icon slot='end' name='chevron-down'></ion-icon>"
    }
    else
    {
            el.innerHTML="GET DETAILED FEE<ion-icon slot='end' name='chevron-up'></ion-icon'"
      el.previousSibling.value='1';
    var today = new Date().getDay();
    var txt="";
    
        post('/feestructure','fee[student_id]='+student_id,(data)=>{onGetFee(data,id)});
    
  }
    
}


function onGetFee(data,id)
{
    var txt="",TotalAmt=0,TotalNoOfMessCuts=0,NoOfGuests=0,i,TotalMonthFee=0,MonthBill=0,GuestFee=0,ExtraFee=0;
    var myObj =JSON.parse(data);
           
            NoOfGuests=myObj.guest.length;
            for(i=0;i<myObj.extra.length;i++){
                TotalAmt+=myObj.extra[i].price;
            }
            for(i=0;i<myObj.messcut.length;i++){
                TotalNoOfMessCuts+=myObj.messcut[i].no_of_days;
            }
            MonthBill = (80*30)-(80*TotalNoOfMessCuts);
            GuestFee = (80*NoOfGuests);
            ExtraFee = TotalAmt;
            TotalMonthFee=(TotalAmt+(80*30)+(NoOfGuests*80))-(80*TotalNoOfMessCuts);
            txt+="<ion-card><ion-card-container><ion-list><ion-item><ion-col>Month Fee</ion-col><ion-col>"+MonthBill+"</ion-col></ion-item><ion-item><ion-col>Guest Fee</ion-col><ion-col>"+GuestFee+"</ion-col></ion-item><ion-item><ion-col>Extra Fee</ion-col><ion-col>"+ExtraFee+"</ion-col></ion-item><ion-item lines=none><ion-col><strong>Total Month Bill</strong></ion-col><ion-col><strong>"+TotalMonthFee+"</strong></ion-col></ion-item></ion-list></ion-card-container></ion-card>"
            document.getElementById(id).innerHTML = txt;

}




function getFeeList()
{
   
    var txt="",TotalAmt=0,TotalNoOfMessCuts=0,NoOfGuests=0,i,TotalMonthFee=0,MonthBill=0,GuestFee=0,ExtraFee=0;
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        
        if(this.readyState == 4 && this.status == 200){
            var myObj =JSON.parse(this.responseText);
           
            NoOfGuests=myObj.guest.length;
            for(i=0;i<myObj.extra.length;i++){
                TotalAmt+=myObj.extra[i].price;
            }
            for(i=0;i<myObj.messcut.length;i++){
                TotalNoOfMessCuts+=myObj.messcut[i].no_of_days;
            }
            MonthBill = (80*30)-(80*TotalNoOfMessCuts);
            GuestFee = (80*NoOfGuests);
            ExtraFee = TotalAmt;
            TotalMonthFee=(TotalAmt+(80*30)+(NoOfGuests*80))-(80*TotalNoOfMessCuts);
            txt+="<ion-row><ion-col size=2 offset=2><ion-card><ion-card-container><ion-list><ion-item><ion-col>Month Fee</ion-col><ion-col>"+MonthBill+"</ion-col></ion-item><ion-item><ion-col>Guest Fee</ion-col><ion-col>"+GuestFee+"</ion-col></ion-item><ion-item><ion-col>Extra Fee</ion-col><ion-col>"+ExtraFee+"</ion-col></ion-item><ion-item><ion-col>Total Month Bill</ion-col><ion-col>"+TotalMonthFee+"</ion-col></ion-item></ion-list></ion-card-container></ion-card></ion-col></ion-row>"
            document.getElementById("fees").innerHTML = txt;
        }
    };
    xmlhttp.open("GET",'/feestructure',true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
}








async function deleteAlert(id) {
      const alert = await alertController.create({
        header: 'Are you sure to delete this staff?',
        buttons: [
        {
          text: 'Yes',
          cssClass: 'alertbuttonyes',
          handler: () => {
            deleteStaff(id);
          }
        }, {
          text: 'No',
          cssClass: 'alertbuttonno'
        }
      ]
      });

      await alert.present();
    }

function deleteStaff(id)
{
    var token = document.querySelector('meta[name="csrf-token"]').content;
    var obj, dbParam, xmlhttp, myObj, x, txt = "";
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
        if(myObj.deleted)
        {
            getStaffs();
        }
        
  }
};
xmlhttp.open("POST", "/deletestaff", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.setRequestHeader('X-CSRF-Token', token);
xmlhttp.send("staff[id]="+id);

}



function filterStudentsByName(id) {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("nameSearchBar_"+id);
    filter = input.value.toUpperCase();
    names = document.getElementsByClassName("student_name_"+id);
    items = document.getElementsByClassName("student_item_"+id);
    var count=0
    for (i = 0; i < names.length; i++) {
        txtValue = names[i].textContent || names[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            items[i].style.display = "";
            document.getElementById("students_card_"+id).style.display="";
            document.getElementById("noMatch_"+id).style.display="none";
        } else {
            count+=1
            items[i].style.display = "none";
        }
    }
    if(count==names.length)
    {
        document.getElementById("noMatch_"+id).style.display="";
        document.getElementById("students_card_"+id).style.display="none";
    }
}

function filterStudentsByRollNo(id) {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("rollSearchBar_"+id);
    filter = input.value.toUpperCase();
    rolls = document.getElementsByClassName("student_roll_no_"+id);
    items = document.getElementsByClassName("student_item_"+id);
    var count=0
    for (i = 0; i < rolls.length; i++) {
        txtValue = rolls[i].textContent || rolls[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            items[i].style.display = "";
            document.getElementById("students_card_"+id).style.display="";
            document.getElementById("noMatch_"+id).style.display="none";
        } else {
            count+=1
            items[i].style.display = "none";
        }
    }
    if(count==names.length)
    {
        document.getElementById("noMatch_"+id).style.display="";
        document.getElementById("students_card_"+id).style.display="none";
    }
}

function filterMessCuts() {
    filterDate = document.getElementById('filter_date').value.split('-');
    filterDate=new Date(filterDate[0],filterDate[1]-1,filterDate[2])
    from_dates = document.getElementsByClassName("mess_cut_from");
    to_dates = document.getElementsByClassName("mess_cut_to");
    items = document.getElementsByClassName("mess_cut_items");
    var count=0
    var fromDate,toDate;
    for (i = 0; i < items.length; i++) {
        fromDate=from_dates[i].innerHTML.trim().split("-")
        fromDate=new Date(fromDate[2],fromDate[1]-1,fromDate[0]);

        toDate=to_dates[i].innerHTML.trim().split("-")
        toDate=new Date(toDate[2],toDate[1]-1,toDate[0]);

        if ((filterDate.getTime()!==filterDate.getTime()) || (filterDate>=fromDate && filterDate<=toDate)) {
            items[i].style.display = "";
        } else {
            count+=1
            items[i].style.display = "none";
        }
    }
    if(count==items.length)
    {

    }
}
