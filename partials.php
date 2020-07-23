<?php

$changePasswordStudent='<ion-header translucent>
            <ion-toolbar>
              <ion-title>Change Password</ion-title>
              <ion-buttons slot="end">
                <ion-button slot="icon-only" onClick="dismissPopover()"><ion-icon name="close"></ion-icon></ion-button>
              </ion-buttons>
            </ion-toolbar>
          </ion-header>
          <ion-content>
          <div id="change_password_errors"></div>
          <ion-item style="--ion-color-primary:  #8f15f4">
          <ion-label position="floating">Current Password</ion-label>
            <ion-input id="current" class="changepassword" type="password" required="true"></ion-input>
            </ion-item>
            < ion-item style="--ion-color-primary:  #8f15f4">
            <ion-label position="floating">New Password</ion-label>
            <ion-input type="password" id="new" class="changepassword" required="true"></ion-input>
            </ion-item>
            <ion-item style="--ion-color-primary:  #8f15f4">
            <ion-label position="floating">Confirm New Password</ion-label>
            <ion-input type="password" id="change_password_confirm" required="true"></ion-input>
            </ion-item><br>
            <div style="text-align:center;">
            <ion-button id="change_button" style="--ion-color-primary:  #8f15f4;self-align:center; margin-bottom: 10px;" onClick="changePassword(\'student\');">Change</ion-button>
            </div>
          </ion-content>';


$changePasswordMess='<ion-header translucent>
          <ion-toolbar>
            <ion-title>Change Password</ion-title>
            <ion-buttons slot="end">
              <ion-button slot="icon-only" onClick="dismissPopover()"><ion-icon name="close"></ion-icon></ion-button>
            </ion-buttons>
          </ion-toolbar>
        </ion-header>
        <ion-content>
        <div id="change_password_errors"></div>
        <ion-item style="--ion-color-primary:  #8f15f4">
        <ion-label position="floating">Current Password</ion-label>
          <ion-input id="current" class="changepassword" type="password" required="true"></ion-input>
          </ion-item>
          <ion-item style="--ion-color-primary:  #8f15f4">
          <ion-label position="floating">New Password</ion-label>
          <ion-input type="password" id="new" class="changepassword" required="true"></ion-input>
          </ion-item>
          <ion-item style="--ion-color-primary:  #8f15f4">
          <ion-label position="floating">Confirm New Password</ion-label>
          <ion-input type="password" id="change_password_confirm" required="true"></ion-input>
          </ion-item><br>
          <div style="text-align:center;">
          <ion-button id="change_button" style="--ion-color-primary:  #8f15f4;self-align:center; margin-bottom: 10px;" onClick="changePassword(\'mess\');">Change</ion-button>
          </div>
        </ion-content>';


function studentList($id)
{
  return '<ion-grid class="ion-no-padding">
  <ion-row>
      <ion-col class="ion-no-padding">
          <ion-row><ion-col size=6>
          <ion-searchbar placeholder="Type Name" id="nameSearchBar_list_'.$id.'"  onInput="filterStudentsByName(\'list_<%= id %>\')"></ion-searchbar></ion-col>
          <ion-col size=6>
          <ion-searchbar placeholder="Type Roll No" id="rollSearchBar_list_'.$id.'" onInput="filterStudentsByRollNo(\'list_<%= id %>\')"></ion-searchbar></ion-col>
          </ion-row>
          <div id="list_'.$id.'"><ion-spinner></ion-spinner></div>
      </ion-col>
  </ion-row>
  </ion-grid>';
}
?>
