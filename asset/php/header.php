
<?php 
require_once 'session.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucfirst(basename($_SERVER['PHP_SELF'] , '.php')) ?> | OpenMarket</title>
            <!--bootstrap css-->
            <link rel="stylesheet" href="asset/css/designs.css">
 <link rel="stylesheet" href="asset/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="asset/DataTables/datatables.min.css"/>
 <link href="https://fonts.googleapis.com/css2?family=Lato&family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
 
</head>
<body>
   <nav class="navbar navbar-expand-md bg-dark navbar-dark">
       <!--brand-->
       <a class="navbar-brand" href="index.php"><i class="fas fa-code fa-lg"></i> &nbsp;OpenMarket</a>
       <!--toggler /collaspsing button-->
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
           <span class="navbar-toggler-icon"></span>
       </button>
       <!-- Navbar links-->
       <div class="collapse navbar-collapse" id="collapsibleNavbar">
           <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                   <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == "home.php" ? "active":"" ?>" href="home.php"><i class="fas fa-home"></i>&nbsp;Home</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == "goods.php" ? "active":"" ?>" href="goods.php"><i class="fas fa-business-time"></i>&nbsp;Goods</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == "skill.php" ? "active":"" ?>" href="skill.php"><i class="fas fa-comment-dollar"></i>&nbsp;Skills</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == "accom.php" ? "active":"" ?>" href="accom.php"><i class="fas fa-bed"></i>&nbsp;Accomodation</a>
               </li>
               <li class="nav-item dropdown">
                   <a href="#" id="login" class="nav-link dropdown-toggle text-capitalize" id="navbardrop" data-toggle="dropdown">
                       <i class="fas fa-user-cog"></i>&nbsp;&nbsp;Hello! <?php if(isset($cemail)) { echo $fname; } ?>
                   </a>
                       
                 
                   <div class="dropdown-menu">
                    <?php if(isset($_SESSION['user'])): ?>
                       <a href="#" class="dropdown-item"><i class="fas fa-user"></i>&nbsp;
                        <?php echo 'You Are Logged In.' ?>
                        <?php else: ?>
                            <a href="login.php" class="dropdown-item"><i class="fas fa-user"></i>&nbsp;
                            <?php echo 'Login' ?>
                            <?php endif; ?>
                    </a>
                       <a href="asset/php/feedback.php" class="dropdown-item"><i class="fas fa-comment-dots"></i>&nbsp;
                       Feedback
                    </a>
                       <a href="asset/php/notification.php" class="dropdown-item"><i class="fas fa-bell"></i>&nbsp;
                       Notification
                    </a>
                       <a href="asset/php/logout.php" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>&nbsp;
                       Logout
                    </a>
                   </div>
               </li>
           </ul>
       </div>
   </nav>
</body>
</html>