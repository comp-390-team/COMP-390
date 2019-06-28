<div class="row">


       <div class="col-md-6 col-sm-6" style="padding-left:200px; position:fixed;";>

       <div class="card" style="background: #ECEFF1">
         <!--Card content-->
         <div class="card-body">

           <!-- Form -->
           <form name="">
             <!-- Heading -->
             <h3 class="dark-grey-text text-center">
               <strong>Hire Employee</strong>
             </h3>
             <hr>

             <div class="md-form">
               <i class="fas fa-user prefix grey-text"></i>
               <input type="text" id="E_id" class="form-control"  name="id" >
               <label for="E_id">Employee ID</label>
             </div>
             <div class="md-form">
               <i class="fas fa-envelope prefix grey-text"></i>
               <input type="text" id="E_fname" class="form-control"   name="first_name" >
               <label for="E_fname">First Name</label>
             </div>

             <div class="md-form">
               <i class="fas fa-envelope prefix grey-text"></i>
               <input type="text" id="E_sname" class="form-control"   name="second_name" >
               <label for="E_sname">Second Name</label>
             </div>

             <div class="md-form">
               <i class="fas fa-envelope prefix grey-text"></i>
               <input type="text" id="E_address" class="form-control"   name="email" pattern=".+@beststartupever.com">
               <label for="E_address">Email address</label>
             </div>

             <div class="md-form">
               <i class="fas fa-envelope prefix grey-text"></i>
               <input type="text" id="E_phone" class="form-control"    name="phone" >
               <label for="E_phone">Phone No</label>
             </div>

             <div class="md-form">
               <center>
               <select id="E_title" class="form-control"  name="" style="width: 70%">
                    <option value="" selected disabled>-----select job tittle -----</option>
                    <!-- <option value="Manager">Manager</option> -->
                    <option value="Section attendant">Section attendant</option>
                    <option value="Store   keeper">Store   keeper</option>
               </select>
             </center>
             </div>

             <div class="md-form">
               <i class="fas fa-envelope prefix grey-text"></i>
               <input type="text" id="E_Nationality" class="form-control"  list="nations"  name="nationality" >
               <label for="E_Nationality">Nationality </label>
               <div id="all_nations">

               </div>
             </div>

             <div class="text-center">
               <button class="btn btn-success" type="button" onclick="addnewEmploee()" >Hire Employee</button>
             </div>

           </form>
           <!-- Form -->
         </div>
       </div>
       <!--/.Card-->

    <!-- </div> -->
</div>
</div>
