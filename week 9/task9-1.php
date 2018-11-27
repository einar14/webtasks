<?php
function register(){
$usernames = ["billgates","johndoe","stevejobs"];
if(empty($_POST['username'])){
    print '<div class="error">Username should not be empty</div>';
}
if(empty($_POST['password']) and empty($_POST['conpassword'])){
    print '<div class="error">Password and Confirm password should not be empty</div>';
}
for($i=0; $i<count($usernames); $i++){

    if($_POST['username'] == $usernames[$i]){
        print '<div class="error">Username '.$usernames[$i].' is already reserved</div>';
    }
}
