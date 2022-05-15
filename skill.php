<?php
 require_once "asset/php/header.php"; 



?>

<header id="header" class="p-5 header">
    <div class="container">
      <div class="row height align-items-center">
        <div class="col">
          <h1 class=" font-weight-bold text-danger text-capitalize text-italic">
            <strong >Hello!</strong> 
            <p class="text-muted"> <?php if(isset($cemail)) {echo $fname; } ?></p>
            <p class="text-muted lead w-75 ">here you can showcase your skill or handwork to any prospecting customer, press the button below to add your skill.
            </p>
            <?php if(isset($cemail)) : ?>
               <a data-target="#skillModal" data-toggle="modal" class="btn btn-outline-primary btn-lg text-capitalize m-2">Add Skill</a>
               <?php else: ?>
                <a data-target="#errorModal" data-toggle="modal" class="btn btn-outline-primary btn-lg text-capitalize m-2">Add Skill</a>
                <?php endif; ?>

          </h1>
        </div>
      </div>
    </div>
  </header>
  <!--end of header section-->

        <div id="show-skill"></div>
  


  
    <!-- start error Note Modal--->
    <div class="modal fade" id="errorModal">
     <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
           <div class="modal-header bg-success">
              <h4 class="modal-title text-light"> Notice!!</h4>
              <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
           </div>
           <div class="modal-body">
               <p class="text-dark lead text-capitalize"> you have to login to Add Skill.
               </p>
           </div>
        </div>
     </div>
  </div>
<!-- end error Note Modal--->
    <!-- start display detailsModal--->
    <div class="modal fade" id="showDetails">
     <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
           <div class="modal-header bg-success">
              <h4 class="modal-title text-light"> Seller Details</h4>
              <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
           </div>
           <div class="modal-body">
               <div class="shows">
                  <h2 class="text-primary">Seller ID:<span id="id"></span></h2>
               </div>
               <div class="shows">
                  <h2>Address:<span id="address"></span></h2>
               </div>
               <div class="shows">
                  <h2>Contact:<span id="contact"></span></h2>
               </div>
               <div class="shows">
                  <h2>Skill Description:<span id="pd" class="pd"></span></h2>
               </div>
               <div class="shows">
                  <h2>Posted On:<span id="po"></span></h2>
               </div>
               <div class="shows">
                  <h2>Product Status:<span id="ps"></span></h2>
               <div id="btn"></div>
               </div>
           </div>
        </div>
     </div>
  </div>
<!-- end display details Modal--->




  <!-- start Add New Note Modal--->
  <div class="modal fade" id="skillModal">
     <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
           <div class="modal-header bg-success">
              <h4 class="modal-title text-light">Fill The Form</h4>
              <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
           </div>
           <div class="modal-body">
           <form action="" method="post" class="px-3 mt-2"  enctype="multipart/form-data" id="add-skill-form">
                    <p class="text-danger" id="eAlert"></p>
                    <p class="text-success" id="sAlert"></p>
                           <div class="form-group my-4">
                                 <label for="profilePhoto" class="m-1">Upload Profile Image</label>
                                 <input type="file" name="photo" id="profilePhoto" >
                              </div> 
                              <div class="form-group my-2">
                                 <input type="text" name="name" id="name" class="form-control form-control-lg " placeholder="Skill Name..." class="form-control" required>
                              </div>
                              <div class="form-group my-2">
                                 <textarea name="info" id="info" rows="6" class="form-control form-control-lg " placeholder="Brief Info..." required></textarea>
                              </div>
                              <div class="form-group my-2">
                                 <input type="text" name="address" placeholder="Address..." class="form-control form-control-lg "required>
                              </div>
                              <div class="form-group my-2">
                                 <input type="text" name="phone" placeholder="Telephone..." class="form-control form-control-lg "required>
                              </div>
                              <div class="form-group my-2">
                                 <input type="password" name="password" id="passKey" placeholder="Confirmation Code..." class="form-control form-control-lg "required>
                              </div>

                              <div class="form-group mt-2">
                                 <input type="submit" id="addSkillBtn" value="Submit" class="btn btn-success btn-block">
                              </div>

                          </form>
           </div>
        </div>
     </div>
  </div>
<!-- end Add New Note Modal--->

<!-- start Edit skill Modal--->
<div class="modal fade" id="editNoteModal">
     <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
           <div class="modal-header bg-info">
              <h4 class="modal-title text-light">Edit Product</h4>
              <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
           </div>
           <div class="modal-body">
              <form action="#" method="post" id="skill-form" class="px-3">
                 <input type="hidden" name="idv" id="idv">
                 <div class="form-group">
                    <input type="text" name="location" id="location" class="form-control form-contol-lg" placeholder="Address" required>
                 </div>
               
                 <div class="form-group">
                    <textarea name="goods" id="goods" rows="6" class="form-control form-control-lg" placeholder="Product Description..." required></textarea>
                 </div>
                 <div class="form-group">
                    <input type="tel" name="tel" id="tel" class="form-control form-contol-lg" placeholder="Contact" required>
                 </div>
                 <div class="form-group">
                    <input type="text" name="title" id="title" class="form-control form-contol-lg" placeholder="Enter Title" required maxlength="10">
                 </div>
                 <div class="form-group">
                    <input type="submit" name="editNote" id="updateSkillBtn" value="Update Note" class="btn btn-info btn-block btn-lg" >
                 </div>
              </form>
           </div>
        </div>
     </div>
  </div>
<!-- end Edit skill Modal--->



  <section id="footer" class="bg-dark py-3">
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

      

   <!--bootstrap jquery-->
<script src="asset/js/jquery-3.5.1.min.js"></script>
    <!--bootstrap js-->
<script src="asset/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="asset/DataTables/datatables.min.js"></script>
     <!--font awesome-->
  <script src="asset/js/all.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>

  <script type="text/javascript">
   $(document).ready( function () {
       displaySkill();

       function displaySkill () {
           $.ajax({
               url:'asset/php/process.php',
               method:'post',
               data:{ action : 'display_skill'},
               success:function(response) {
                   $("#show-skill").html(response);
                   
               }
           });
       }


       
    //get id
    getId();
    function getId() {
       $.ajax({
          url:'asset/php/process.php',
          method:'post',
          data:{ action : 'get_id'},
          success:function(response) {
            data = JSON.parse(response);
             $id = data[0].id;
          }
       });

    }





//display details of a seller ajax request
$("body").on('click','.displayDetail', function (e) {
      e.preventDefault();
      disp_sid = $(this).attr('id');
      $.ajax({
         url:'asset/php/process.php',
         method:'post',
         data:{ disp_sid : disp_sid},
         success:function(response) {
            $("#showDetails").modal('show');
            
            data =  JSON.parse(response);
            $("#id").text(data[0].id);
            $("#address").text(data[0].address);
            $("#contact").text(data[0].phone);
            $("#pd").text(data[0].info);
            $("#po").text(data[0].created_at);
          
             $idd = data[0].id;
            

             $pvs = data[0].available;
             if($pvs == 1) {
               $("#ps").text('I am Available');  
             }
             else {
               $("#ps").text('Not Available for The Moment');
             }
             $sid = data[0].sid;
            
             if ($sid != $id) {
               $("#btn").html('');
             }else {
              $("#btn").html(
            
'<label for="check" class="text-primary font-weight-bold">Product Status</label>&nbsp;&nbsp;<input type="checkbox" id="check" style="margin-top:20px;"> <div class="grade"><button data-toggle="modal" data-target="#editNoteModal" class="btn edit btn-outline-primary btn-lg cool">Edit</button><button class="btn btn-outline-danger btn-lg deleteBtn">Delete</button></div> '
                  )
               

       //Edit goods of a user ajax request
    $("body").on('click' , '.cool' , function(e) {
      $("#showDetails").modal('hide');
            e.preventDefault();
            edit_sid = $idd;
            $.ajax({
               url:'asset/php/process.php',
               method:'post',
               data:{edit_sid : edit_sid},
               success:function(response) {
                  data = JSON.parse(response);
                  $("#idv").val(data[0].id);
                  $("#goods").val(data[0].info);
                  $("#title").val(data[0].name);
                  $("#location").val(data[0].address);
                  $("#tel").val(data[0].phone);
               }
            });
         });
         //end of edit goods
            
   //Update Note Of User Ajax Request
   $("#updateSkillBtn").click(function(e) {
           if($("#skill-form")[0].checkValidity()) {
              e.preventDefault();

              $.ajax({
                 url:'asset/php/process.php',
                 method:'post',
                 data:$("#skill-form").serialize()+"&action=update_skill",
                 success:function(response) {
                    console.log(response);
                    swal.fire({
                       title:'Note Updated Succesfully!',
                       type:'success'
                    });

                   $("#editNoteModal").modal('hide');
                   displaySkill();
                 }
              });
           }
        })
           

           //delete note of a user ajax request
           $("body").on('click' , '.deleteBtn' , function(e) {
            $("#showDetails").modal('hide');
            e.preventDefault();
            del_sid = $idd;
            Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                 }).then((result) => {
                if (result.value) {
                   $.ajax({
                      url:'asset/php/process.php',
                      method:'post',
                      data:{del_sid : del_sid},
                      success:function(response) {
                        Swal.fire(
                             'Deleted!',
                             'Note Deleted Sucessfully!',
                             'success'
                        )
                        displayNote(); 
                      }
                   });
          
                }
            })
         });
                //product status ajax request
              $checkBox = document.querySelector('#check');
              $checkBox.addEventListener('change', (e)=> {
                 if($checkBox.checked) {
                    det_id = $idd;
                    $.ajax({
                       url:'asset/php/process.php',
                       method:'post',
                       data:{ det_id : det_id },
                       success:function(response) {
        
                          $("#ps").text('I am Available');
                       }
                    });
                 } else {
                    dett_id = $idd;
                  $.ajax({
                       url:'asset/php/process.php',
                       method:'post',
                       data:{ dett_id : dett_id },
                       success:function(response) {
                          
                          $("#ps").text('Not Available for The Moment');
                       }
                    });
                 }
              })
             } 
         }
      });
   })


       //add skill to database

       
     $("#add-skill-form").submit(function(e) {
       e.preventDefault();

       if($("#passKey").val() == 41990) {
        $.ajax({
          url:'asset/php/process.php',
          method:'post',
          processData:false,
          contentType:false,
          data:new FormData(this),
          success:function(response) {
            displaySkill();
          }
        });
        $("#add-skill-form")[0].reset();
        $("#skillModal").modal('hide');
       } else {
         $("#eAlert").text('*Wrong Confirmation Key!');
         $("#sAlert").text('*Please Contact The Service Provider to obtain a valid confirmation key.');
       }
      
     });

   });
</script>