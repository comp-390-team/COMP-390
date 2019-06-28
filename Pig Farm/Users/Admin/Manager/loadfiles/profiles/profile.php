<?php
session_start();
  $id=$_GET['id'];
  $image_name=str_replace("/","",$id);

   //Get data from server
   require '../../../../../Database/DB.php';
   require '../../../../../Persons/FarmManager.php';
   $pig=new  FarmManager();
   $Emp_data=$pig->getEmployeeData($id,false);

   $profile_picture =$Emp_data['profile'];
   $name            =$Emp_data['name'];
   $phone_no        =$Emp_data['phone_no'];
   $title           =$Emp_data['title'];
   $nationality     =$Emp_data['nationality'];
   $email           =$Emp_data['email'];


   $image  =($profile_picture=="avatar.png")?"avatar.png":$image_name."/".$profile_picture;

 ?>





      <div class="container-fluid" id="tableHolder">
              <div class="card col-lg-10 col-md-10 col-sm-12">
                <div class="card-header " style="background:#78909C" >
                    <h5 class="white-text text-center" style="font-weight:bold">
                        <strong>User profile</strong>
                    </h5>

                </div>
                <div class="card-body">

                <div class="row">


                    <div class="col-lg-5 col-md-5 col-sm-5" style="border-right: 1px solid #555">
                      <div class="row">
                          <div class="col-lg-12 col-md-12 col-sm-12">

                            <img id="image_profile" src="<?php echo "loadfiles/profiles/images/".$image.""; ?>" alt="" width="300px" height="300px" style="border-radius: 50%">
                          </div>

                          <div class="col-lg-12 col-md-12 col-sm-12">
                            <form >
                              <div class="md-form">
                                <input class="form-control" type="file"  accept="image/*" onchange="loadFile(event)" name="file[]"   id="images">
                              </div>
                              <button class="btn btn-rounded btn-block btn-success  waves-effect z-depth-3" type="button" onclick="uploadImage('empImages.php?id=<?php echo $id ?>')">Change image</button>

                            </form>
                          </div>
                      </div>
                    </div>


                    <div class="col-lg-7 col-md-7 col-sm-7">

                       <div class="col-lg-12 col-md-12 col-sm-12" id="detailsArea">
                         <div class="row"   style=" border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">
                             <div class="col-lg-4 col-md-4 col-sm-4">
                                  <label for=""> ID</label>
                             </div>
                             <div class="col-lg-8 col-md-8 col-sm-8">
                               <label for="" id="Eid_entry"><?php echo $id; ?></label>
                             </div>
                         </div>

                         <div class="row"   style=" border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">
                             <div class="col-md-4">
                                  <label for=""> Name</label>
                             </div>
                             <div class="col-lg-8 col-md-8 col-sm-8">
                               <label for="" id="Cid_entry"><?php echo $name; ?></label>
                             </div>
                         </div>
                         <div class="row"   style="border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">
                             <div class="col-md-4">
                                  <label for=""> Job title</label>
                             </div>
                             <div class="col-lg-8 col-md-8 col-sm-8">
                               <label for="" id="Cid_entry"><?php echo $title; ?></label>
                             </div>
                         </div>

                         <div class="row"   style="height: auto; border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">
                             <div class="col-md-4">
                                  <label for=""> Nationality</label>
                             </div>
                             <div class="col-lg-8 col-md-8 col-sm-8">
                               <label for="" id="Cid_entry"><?php echo $nationality; ?></label>
                             </div>
                         </div>


                         <div class="row"   style=" border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">
                             <div class="col-md-4">
                                  <label for=""> Phone number</label>
                             </div>
                             <div class="col-lg-8 col-md-8 col-sm-8">
                               <div class="row" style="width: 100%">

                               <div class="col-lg-8 col-md-8 col-sm=8">
                                 <label for="" id="phone"><?php echo $phone_no; ?></label>
                                 <div class="md-form" id="phoneArea">
                                   <input type="text" id="user_phone"  class="form-control"  autocomplete="old password" required/>
                                   <label for="weight">New phone number <span style="display: none" id="weight_r">*</span></label>
                                 </div>

                               </div>

                               <div class="col-lg-3 col-md-3 col-sm-3" style="margin:0px; padding:0px">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                  <button class="btn btn-success" id="savePhone" type="button" name="button" onclick="phoneDetails()"
                                          style="float: left; width:100px; height: 35px; font-size: 12px; padding:0px;">
                                          change
                                  </button>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                  <button class="btn btn-danger" id="clear" type="button" name="button" onclick="cancelPhoneDetails()"
                                          style="float: left; width:100px; height: 35px; font-size: 12px; padding:0px;">
                                          cancel
                                  </button>
                                </div>

                               </div>

                              </div>
                             </div>
                         </div>


                         <div class="row"   style=" border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">
                             <div class="col-md-4">
                                  <label for=""> Email</label>

                             </div>
                             <div class="col-lg-8 col-md-8 col-sm-8">
                               <div class="row" style="width: 100%">

                               <div class="col-lg-8 col-md-8 col-sm=8">
                                 <label for="" id="email"><?php echo $email; ?></label>

                                 <div class="md-form" id="emailArea">
                                   <input type="email" id="user_Email"  class="form-control"  autocomplete="old password" required/>
                                   <label for="weight">New email address <span style="display: none" id="weight_r">*</span></label>
                                 </div>
                               </div>

                               <div class="col-lg-3 col-md-3 col-sm-3" style="margin:0px; padding:0px">

                                 <div class="col-lg-12 col-md-12 col-sm-12">
                                   <button class="btn btn-success" id="saveEmail" type="button" name="button" onclick="emailDetails()"
                                           style="float: left; width:100px; height: 35px; font-size: 12px; padding:0px;">
                                           change
                                   </button>
                                 </div>

                                 <div class="col-lg-12 col-md-12 col-sm-12">
                                   <button class="btn btn-danger" id="clearEmail" type="button" name="button" onclick="cancelEmailDetails()"
                                           style="float: left; width:100px; height: 35px; font-size: 12px; padding:0px;">
                                           cancel
                                   </button>
                                 </div>

                               </div>

                              </div>
                             </div>
                         </div>



                         <div class="row"   style="padding:3px; margin-left:30px; margin-right:30px; margin-top: 15px">
                             <div class="col-md-12">
                                  <center><a class="nav-link" id="change_password" onclick="changePSWD(event)" style="font-weight: bold">change password</a></center>
                             </div>
                         </div>
                       </div>


                    <!-- </div> -->

                   <!-- Star of area for editing the password -->
                      <div class="row"   style="padding:3px; margin-left:30px; margin-right:30px; margin-top: 15px" id="passwordArea">
                             <form class="" autocomplete="false">

                               <div class="row"  style="height:70px; margin-top: 3px;">
                                   <div class="col-lg-9" style="margin: 0px; padding:0px">
                                    <div class="md-form" >
                                      <i class="fas fa-envelope prefix grey-text"></i>
                                      <input type="password" id="old_password" class="form-control"  required/>
                                      <label for="weight">Old password <span style="display: none" id="weight_r">*</span></label>
                                    </div>
                                  </div>

                                  <div class="col-lg-2" style="margin: 0px; padding:0px" id="old_pA">
                                      <img src="loadfiles/profiles/images/ok.png" alt="" width="30px" style="margin: 50%;" >
                                  </div>
                              </div>



                              <div class="row"  style="height:70px; margin-top: 3px;">
                                  <div class="col-lg-9" style="margin: 0px; padding:0px">
                                   <div class="md-form">
                                     <i class="fas fa-envelope prefix grey-text"></i>
                                     <input type="password" id="new_password"  class="form-control"  autocomplete="old password" required/>
                                     <label for="weight">New password <span style="display: none" id="weight_r">*</span></label>
                                   </div>
                                 </div>

                                 <div class="col-lg-2" style="margin: 0px; padding:0px" id="new_pA">
                                     <img src="loadfiles/profiles/images/ok.png" alt="" width="30px" style="margin: 50%;">
                                 </div>
                             </div>


                             <div class="row"  style="height:70px; margin-top: 3px;">
                                 <div class="col-lg-9" style="margin: 0px; padding:0px">
                                  <div class="md-form">
                                    <i class="fas fa-envelope prefix grey-text"></i>
                                    <input type="password" id="new_password_repeat" class="form-control"  autocomplete="old password" required/>
                                    <label for="weight">Repeat password <span style="display: none" id="weight_r">*</span></label>
                                  </div>
                                </div>

                                <div class="col-lg-2" style="margin: 0px; padding:0px" id="new_pR">
                                    <img src="loadfiles/profiles/images/ok.png" alt="" width="30px" style="margin: 50%;">
                                </div>
                            </div>

                                  <div class="row"  style="height:35px;
                  								  padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px; margin-bottom: 13px">
                  										 <div class="col-md-4">
                  												<button class="btn btn-danger btn-sm" id="close" type="button" name="button">close</button>
                  										 </div>
                  									 <div class="col-lg-8 col-md-8 col-sm-8">
                  										 <center>
                  										  <button class="btn btn-success btn-sm" id="approve" type="button"  name="button">Reset password</button>
                  										</center>
                  									 </div>
                  								</div>
                             </form>
                      </div>
                       <!-- End of Password area -->

                    </div>


                </div>

              </div>
            </div>
      </div>
      <script src="../../../js/userProfile.js"></script>
