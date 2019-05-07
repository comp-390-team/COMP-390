<div class="row">


       <div class="col-md-12 col-sm-12" style="padding-left:200px";>

       <div class="card">
         <!--Card content-->
         <div class="card-body">

           <!-- Form -->
           <form name="" method="post" action="../../../pigs/Pig.php">
             <!-- Heading -->
             <h3 class="dark-grey-text text-center">
               <strong>Add Pig:</strong>
             </h3>
             <hr>

             <div class="md-form">
               <i class="fas fa-user prefix grey-text"></i>
               <input type="text" id="form3" class="form-control"  name="id" required>
               <label for="form3">Pig ID</label>
             </div>
             <div class="md-form">
               <i class="fas fa-envelope prefix grey-text"></i>
               <input type="number" id="form2" class="form-control"   name="weight" required>
               <label for="form2">Weight</label>
             </div>

             <div class="md-form">
               <i class="fas fa-envelope prefix grey-text"></i>
               <input type="text" id="form2" class="form-control"   name="gender" required>
               <label for="form2">Sex</label>
             </div>
             <div class="md-form">
               <i class="fas fa-envelope prefix grey-text"></i>
               <input type="text" id="form2" class="form-control"    name="breed" required>
               <label for="form2">Breed</label>
             </div>

             <div class="md-form">
               <i class="far  fa-calendar-alt prefix grey-text"></i>
               <input type="date" id="form2" class="form-control"       name="day" required>
             </div>

             <div class="text-center">
               <button class="btn btn-indigo" name="addpig">Add New Pig</button>
             </div>

           </form>
           <!-- Form -->
         </div>
       </div>
       <!--/.Card-->

    <!-- </div> -->
</div>
</div>
