<!-- <div class="row"> -->
    <?php

    require '../../../../Database/DB.php';
    require '../../../../pigs/Pig.php';
    $pig=new  Pig();

     ?>

       <div class="col-md-6 col-sm-6" style="padding-left:200px;";>

       <div class="card">
         <!--Card content-->
         <div class="card-body">

           <!-- Form -->
           <form  role="form">
             <!-- Heading -->
             <h3 class="dark-grey-text text-center">
               <strong>Add Pig:</strong>
             </h3>
             <hr>

             <div class="md-form">
               <i class="fas fa-user prefix grey-text"></i>
               <input type="text" id="mother_id" class="form-control"  name="id" required value="">
               <label for="pig_id">Mother ID  <span style="display: none" id="id_r">*</span> </label>
             </div>
             <div class="md-form">
               <i class="fas fa-user prefix grey-text"></i>
               <input type="text" id="pig_id" class="form-control"  name="id" required value="">
               <label for="pig_id">Pig ID   <span style="display: none" id="id_r">*</span> </label>
             </div>

             <div class="md-form">
               <i class="fas fa-envelope prefix grey-text"></i>
               <input type="number" id="weight" class="form-control" min="9" max="100"  name="weight" required>
               <label for="weight">Weight <span style="display: none" id="weight_r">*</span></label>
             </div>

             <div class="md-form">
               <i class="fas fa-envelope prefix grey-text"></i>
               <input type="text" id="gender" class="form-control"  list="allowed_gender"  name="gender" required>
               <label for="form2">gender <span style="display: none" id="gender_r">*</span></label>

               <datalist id="allowed_gender">
                    <option value="M">M</option>
                    <option value="F">F</option>

               </datalist>
             </div>


             <div class="md-form">
              <center>
               <select class="" id="breed" class="form-control" name="" style="width: 70%; ">
                 <option  selected disabled>----select  breed----</option>
                 <?php $pig->loadBreeds("all");?>
               </select>
             </center>


             </div>

             <div class="md-form">
               <i class="far  fa-calendar-alt prefix grey-text"></i>
               <input type="date" id="day" class="form-control"  max='<?php echo date('Y-m-d');?>'
                 min='<?php echo date('Y')-20 ."-".date("m")."-". date("d"); ?>' name="day" required>
             </div>

             <div class="text-center">
               <button type="button" class="btn btn-indigo"
               onclick="addNewPig()" name="addpig">Add New Pig</button>
             </div>

           </form>
           <!-- Form -->
         </div>
       </div>
       <!--/.Card-->

    <!-- </div> -->
</div>
<div class="col-md-4" id="error_notification" style="display:none">
    <h2 style="width: 200px; height: 420px;
    background: green; position: absolute;
    color: white; font-size: 300%; font-weight: bold"><center>Please fill all the fields!</h2></span>
</div>
<!-- </div> -->
