<?php
require 'auth.php';
$cuser = new Auth ();
session_start();

if(!isset($_SESSION['user'])) {
   //i will ask a php developer why the code runs when i leave this place empty    
   
   } else {
       $cemail = $_SESSION['user'];
       $data = $cuser->currentUser($cemail);
   
       $cid = $data['id'];
       $cname = $data['name'];
       $cpass = $data['password'];
       $fname = strtok($cname, " ");
   }

   //get current user id
   if(isset($_POST['action']) && $_POST['action'] == 'get_id') {
      $data = $cuser->currentUserId($cid);
      echo json_encode($data);
      
   }


//display all sell goods post
if (isset($_POST['action']) && $_POST['action'] == 'display_note') {
    $data =  $cuser->get();
    $output = '';

    if($data) {
       $output.= '<div class="container">';
       foreach($data as $row) {
          $output.='<div class="container-item py-4 text-dark " id="zone">
          <div class="flex">
          <img class="img" src='.'asset/php/'.$row['photo'].'>
          <h2 class="title text-capitalize">'.$row['title'].'</h2>
          <p class="pdesc">'.substr($row['pdesc'],0,60).'.....</p>
          <input type="submit" id="'.$row['id'].'" class="displayDetail btn btn-outline-primary btn-block btn-lg font-weight-bold " value="More Details">
          </div>
          </div>';
       }
       $output.='</div>';
       echo $output; 
       }
} 

//display all sell skill post
if (isset($_POST['action']) && $_POST['action'] == 'display_skill') {
    $data =  $cuser->get_s();
    $output = '';

    if($data) {
       $output.= '<div class="container">';
       foreach($data as $row) {
          $output.='<div class="container-item py-4 text-dark " id="zone">
          <div class="flex">
          <img class="img" src='.'asset/php/'.$row['photo2'].'>
          <h2 class="title text-capitalize">'.$row['name'].'</h2>
          <h2 class="pdesc">'.substr($row['info'],0,40).'.....</h2>
          <input type="submit" id="'.$row['id'].'" class="displayDetail btn btn-outline-primary btn-block btn-lg font-weight-bold " value="More Details">
          </div>
          </div>';
       }
       $output.='</div>';
       echo $output; 
       }
}


//upload products to be displyed by seller ajax request

if (isset($_FILES['image'])) {
    $title = $cuser->test_input($_POST['name']);
    $pdesc = $cuser->test_input($_POST['pdesc']);
    $address = $cuser->test_input($_POST['address']);
    $phone = $cuser->test_input($_POST['phone']);
    $image = $_FILES['image'];

    if(!is_dir('images')) {
       mkdir('images');
    }

   $photo = 'images/'.$cuser->randomString(8).'/'.$image['name'];
   mkdir(dirname($photo));
   move_uploaded_file($image['tmp_name'], $photo);

   $cuser->sell_g($cid,$title,$pdesc,$photo,$address,$phone);

} 
//handle display seller modal ajax request
if(isset($_POST['disp_id'])){
   $idd = $_POST['disp_id'];

   $row = $cuser->currentSeller($idd);
   echo json_encode($row);
   
}

//handle display skill modal ajax request
if(isset($_POST['disp_sid'])){
   $idd = $_POST['disp_sid'];

   $row = $cuser->currentSkSeller($idd);
   echo json_encode($row);
   
}

//Handle Edit Note of a User Ajax Requfest
if(isset($_POST['edit_id'])) {
   $idd = $_POST['edit_id'];

   $row = $cuser->edit_note($idd);
   echo json_encode($row);
 }

//Handle Edit skill of a User Ajax Request
if(isset($_POST['edit_sid'])) {
   $idd = $_POST['edit_sid'];

   $row = $cuser->edit_snote($idd);
   echo json_encode($row);
 } 
 
 //Handle delete goods of a user
if(isset($_POST['del_id'])) {
   $id = $_POST['del_id'];

   $cuser->delete_note($id);
}
 //Handle delete skill of a user
if(isset($_POST['del_sid'])) {
   $id = $_POST['del_sid'];

   $cuser->delete_skill($id);
}
 
//Handle Update Note Of user ajax request
if(isset($_POST['action']) && $_POST['action'] == 'update_goods') {

   $id = $cuser->test_input($_POST['idv']);
   $address = $cuser->test_input($_POST['location']);
   $pdesc = $cuser->test_input($_POST['goods']);
   $phone = $cuser->test_input($_POST['tel']);
   $title = $cuser->test_input($_POST['title']);
   
   $cuser->update_note($id,$address,$pdesc,$phone,$title);
} 


 //Handle Update skill Of seller ajax request
if(isset($_POST['action']) && $_POST['action'] == 'update_skill') {
   $id = $cuser->test_input($_POST['idv']);
   $address = $cuser->test_input($_POST['location']);
   $info = $cuser->test_input($_POST['goods']);
   $phone = $cuser->test_input($_POST['tel']);
   $name = $cuser->test_input($_POST['title']);
   
   $cuser->update_skill($id,$address,$info,$phone,$name);
}
//upload skills to be displyed by seller ajax request

if (isset($_FILES['photo'])) {
    $name = $cuser->test_input($_POST['name']);
    $info = $cuser->test_input($_POST['info']);
    $address = $cuser->test_input($_POST['address']);
    $phone = $cuser->test_input($_POST['phone']);
    $image = $_FILES['photo'];

    if(!is_dir('image2')) {
       mkdir('image2');
    }

   $photo2 = 'image2/'.$cuser->randomString(8).'/'.$image['name'];
   mkdir(dirname($photo2));
   move_uploaded_file($image['tmp_name'], $photo2);

   $cuser->sell_k($cid,$name,$info,$photo2,$address,$phone);

} 

//display available ajax request

if(isset($_POST['det_id'])) {
   $idd = $_POST['det_id'];

   $row = $cuser->det_id($idd);
   return $row;

}
//display not available ajax request

if(isset($_POST['dett_id'])) {
   $idd = $_POST['dett_id'];

   $row = $cuser->dett_id($idd);
   return $row;

}

?>