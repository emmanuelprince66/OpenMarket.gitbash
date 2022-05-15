<?php ?>
<?php
require_once "asset/php/header.php";  


?>

<div class="container ">
   <div class="row">
      <div class="col-lg-12">
         <?php if(!isset($cemail)):?>
            <div class="alert alert-danger alert-dismissible text-center my-3 m-0">
               <button class="close" type="button" data-dismiss="alert">&times;</button>
               <strong>You Are Not Logged In. </strong>
            </div>
            <?php else : ?>
              <div class="alert alert-danger alert-dismissible text-center mt-2 m-0">
               <button class="close" type="button" data-dismiss="alert">&times;</button>
               <strong>You Are Logged In. </strong>
            </div>
            <?php endif; ?>  
      </div>
   </div>

   <!--start-->
   <div class="row my-2">
      <div class="col-md-8 mx-auto text-center">
        <div class="carousel slide" id="example" data-ride="carousel" data-interval="3000">
             <!--indicators-->
             <ol class="carousel-indicators">
              <li data-bs-target="#example" data-bs-slide-to='0' class="active"></li>
              <li data-bs-target="#example" data-bs-slide-to='1'></li>
              <li data-bs-target="#example" data-bs-slide-to='3'></li>
              <li data-bs-target="#example" data-bs-slide-to='4'></li>
            </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="asset/img/images (5).jpeg" alt="project" class=" d-block w-100">
            </div>
            <div class="carousel-item ">
              <img src="asset/img/images (6).jpeg" alt="project" class=" d-block w-100">
            </div>
            <div class="carousel-item ">
              <img src="asset/img/images (1).jpeg" alt="project" class=" d-block w-100">
            </div>
            <div class="carousel-item ">
              <img src="asset/img/images (14).jpeg" alt="project" class=" d-block w-100">
            </div>
          </div>
          <a class="carousel-control-prev" href="#example" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">previous</span>
          </a>
          <a class="carousel-control-next" href="#example" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">next</span>
          </a>
        </div>
      </div>
    </div>
     <!---end---->
       <div>
    </div>
</div>
<!--filler section-->
<section id="filler" class="py-5">
  <div class="container text-center">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <h1 class="text-danger mb-2 text-capitalize">Hello!</h1>
        <?php if(isset($cemail)) :?>
          <h1 class="text-center text-capitalize "><?php echo $cname; ?></h1>
          <?php endif; ?>
        <P class="text-white text-capitalize lead">you are welcome to openMarket, the best app for you to sell and buy goods,skills,search for Accomodation
           and also seek for counselling in any area of your life. </P>
           <em class="text-light text-capitalize lead"> to experience greatness....</em>
           <br><br>
           <a href="#" class="btn btn-light" data-toggle="modal" data-target="#addNoteModal"><i class="fas fa-plus-circle fa-lg"></i>&nbsp;
        Click Here </a>
      </div>
    </div>
  </div>
</section>
<!--end of filler section-->
<section id="footer" class="bg-dark py-3 my-2">
      <div class="container">
          <!--start title-->
    <div class="row">
      <div class="col text-center">
        <h1 class="text-white mb-0 display-4">
          <strong>OpenMarket</strong>
        </h1>
        <div class="title-underline bg-primary"></div>
        <p class="text-capitalize mt-2 text-muted">We are here to serve.</p>
        <p class="text-capitalize text-muted">terms & condition apply</p>
      </div>
    </div>
    <!--end of title-->
      <div class="row">
         <div class="col text-center">
           <a href="#" class="btn m-2">
            <i class="fab fa-facebook fa-3x text-primary"></i>
           </a>
           <a href="#" class="btn m-2">
            <i class="fab fa-twitter fa-3x text-primary"></i>
           </a>
           <a href="#" class="btn m-2">
            <i class="fab fa-instagram fa-3x text-primary"></i>
           </a>
           <a href="#" class="btn m-2">
            <i class="fab fa-google fa-3x text-primary"></i>
           </a>
           <a href="asset/php/logout.php" class="btn btn-danger text-uppercase mx-auto my-3"  id="logout">log out</a>
         </div>   
      </div>
    </div>
    </section>
    <!--end of footer section-->
    <!-- start Add New Note Modal--->
  <div class="modal fade" id="addNoteModal">
     <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
           <div class="modal-header bg-success">
              <h4 class="modal-title text-light"> How to use openMarket</h4>
              <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
           </div>
           <div class="modal-body">
               <p class="text-dark lead text-capitalize">to experience greatness visitors should endeavour to 
                  complete their profile registration.<br>
                  to be able to sell you will need a confirmation password which will be given to you by the admin under strict protocols.<br>
                  users caught practising illegal activites will be promptly deleted.<br>
                  welcome again!<br>
                  feel free to experience greatness.  
               </p>
           </div>
        </div>
     </div>
  </div>
<!-- end Add New Note Modal--->

   

   <!--bootstrap jquery-->
<script src="asset/js/jquery-3.5.1.min.js"></script>
    <!--bootstrap js-->
<script src="asset/js/bootstrap.bundle.min.js"></script>
     <!--font awesome-->
  <script src="asset/js/all.js"></script>
 </body>
 </html>