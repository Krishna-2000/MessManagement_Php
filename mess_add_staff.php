          <ion-header translucent>
            <ion-toolbar>
              <ion-title style="text-align: center; padding-left: 70px;">Add Staff</ion-title>
              <ion-buttons slot="end">
                <ion-button slot="icon-only" onClick="dismissModal()"><ion-icon name="close"></ion-icon></ion-button>
              </ion-buttons>
            </ion-toolbar>
          </ion-header>
          <ion-content fullscreen>
          <ion-item style="--ion-color-primary:  #8f15f4">
          <ion-label position="floating">Staff Name</ion-label>
            <ion-input id='staff[name]' class="staff" required="true"></ion-input>
            </ion-item>
            <ion-item style="--ion-color-primary:  #8f15f4">
            <ion-label position="floating">Mobile No</ion-label>
            <ion-input type="number" id='staff[phoneno]' class="staff" required="true"></ion-input>
            </ion-item><br>
            <div style="text-align:center;">
            <ion-button style="--ion-color-primary:  #8f15f4;self-align:center;" onClick="post('/createstaff',postData('staff'),onCreateStaff)">Add Staff</ion-button>
            </div>
          </ion-content>