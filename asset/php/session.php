<?php 
require_once 'asset/php/auth.php';;
session_start();
$cuser = new Auth;
if(!isset($_SESSION['user'])) {
//i will ask a php developer why the code runs when i leave this place empty    

} else {
    $cemail = $_SESSION['user'];
    $data = $cuser->currentUser($cemail);

    $cid = $data['id'];
    $cname = $data['name'];
    $cpass = $data['password'];
    $cgender = $data['gender'];
    $fname = strtok($cname, " ");


    
}



?>
