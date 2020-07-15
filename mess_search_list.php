<ion-grid class="ion-no-padding">
    <ion-row>
        <ion-col class="ion-no-padding">
            <ion-row><ion-col size=6>
                <ion-searchbar placeholder="Type Name" id="nameSearchBar_list_<%= id %>"  onInput="filterStudentsByName('list_<%= id %>')"></ion-searchbar></ion-col>
                    <ion-col size=6>
                        <ion-searchbar placeholder="Type Roll No" id="rollSearchBar_list_<%= id %>" onInput="filterStudentsByRollNo('list_<%= id %>')"></ion-searchbar></ion-col>
                            </ion-row>
                <div id="list_<%= id %>"><ion-spinner></ion-spinner></div>
        </ion-col>
    </ion-row>
</ion-grid>    