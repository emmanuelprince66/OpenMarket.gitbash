<?php
require_once 'asset/php/auth.php';
$user =   new Auth();
$msg = "";

if(isset($_GET['email']) && isset($_GET['token'])) {
  $email = $user->test_input($_GET['email']);
  $token = $user->test_input($_GET['token']);

  $auth_user = $user->reset_pass_auth($email , $token);

  if($auth_user != null) {
    if(isset($_POST['submit'])) {
      $newpass = $_POST['pass'];
      $cnewpass = $_POST['cpass'];

      $hnewpass = password_hash($newpass , PASSWORD_DEFAULT);

       if($newpass == $cnewpass) {
         $user->update_new_pass($hnewpass , $email);
         $msg = 'Password Changed Sucessful! <br> <a href="index.php">Login Here!</a>';
       }
       else {
         $msg = 'Password Did Not Match!';
       }
    }
  } 
  else {
    header('location:home.php');
    exit();
  }
}
else {
  header('location:home.php');
  exit();  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
      <link rel="stylesheet" href="asset/css/style.css">
        <!--bootstrap css-->
 <link rel="stylesheet" href="asset/css/bootstrap.min.css">
  
</head>
<body>
  <div class="container">
     <!-- login for forgot password  start-->
        <div  class="row justify-content-center wrapper">
          <div class="col-lg-10 my-auto">
             <div class="card-group myShadow">

             <div class="card justify-content-center rounded-left myColor p-4">
                    <h1 class="text-center font-weight-bold text-white"> Reset Your Password!</h1>
                   </div>

               <div class=" card rounded-left p-4" style="flex-grow: 2;">
                  <h1 class="text-center font-weight-bold text-primary">
                    Enter New Password!
                   </h1>
                    <hr class="my-3">
                      <form action="#" method="post" class="px-3">
                        <div class="text-center lead mb-2><?= $msg ?></div>

                       <!--New password field-->
                        <div class="input-group  input-group-lg form-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text rounded-0">
                             <i class="fas fa-key fa-lg"></i>
                             </span>
                           </div>
                            <input type="password" name="pass" class="form-control rounded-0" placeholder="New Password"
                            required minlength="5">
                         </div>
                      <!--end of New password field-->
                       
                       <!-- confirm new password field-->
                        <div class="input-group  input-group-lg form-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text rounded-0">
                             <i class="fas fa-key fa-lg"></i>
                             </span>
                           </div>
                            <input type="password" name="pass" class="form-control rounded-0" placeholder="Confirm New Password"
                            required minlength="5">
                         </div>
                      <!--end of confirm new password field-->
                       

                          <div class="form-group">
                             <input type="submit" name="submit" value="Reset-btn" class="btn btn-primary btn-lg btn-block myBtn" >
                          </div>
                      </form>
                </div>
              </div>
           </div>
        </div>
  </div>


       <!--font awesome-->
       <script src="asset/js/all.js"></script>
</body>
</html>
     <!--login for forgot password ends-->