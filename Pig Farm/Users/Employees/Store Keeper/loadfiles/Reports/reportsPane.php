<?php
//Get data from server
require '../../../../../Database/DB.php';
require '../../../../../pigs/Pig.php';
$pig=new  Pig();

 ?>


  <div class="col-lg-12 col-md-4 col-sm-4 container-fluid"
  style="background: #E0E0E0;height: calc(100vh - 100px); padding: 8px; margin-top: 10px; overflow-y: scroll; ">

    <div class="card" style="background: #ECEFF1; margin-bottom: 10px " >

      <div class="card-header  " style="height: 70px; background:#78909C" >
        <div class="row" style="margin: 0; padding: 0">

        <div class="col-md-12">
          <h3 class="white-text text-center ">
              <strong>Report parameters</strong>
          </h3>
        </div>

      </div>


      </div>


        <!--Card content-->
        <div class="card-body">

            <form class="text-center"  id="input_form" role="form"  enctype="multipart/form-data">

                <fieldset style="margin: 0px;padding: 0px; margin-top: 30px" >
                  <hr>
                  <legend style="margin: 0px;padding: 0px; font-size: 14px">Date added</legend>

                 <div class="form-row" style="margin: 0px;padding: 0px;"  >
                     <div class="col" style="margin: 0px;padding: 0px;">
                         <!-- First name -->
                         <div class="md-form" style="margin: 0px;padding: 0px;">
                             <label for="">From</label>
                         </div>
                     </div>
                     <div class="col" style="margin: 0px;padding: 0px;">
                         <!-- Last name -->
                         <div class="md-form" style="margin: 0px;padding: 0px;  margin-top: 20px">
                           <input type="date" id="reports_f_from" max='<?php echo date('Y-m-d');?>'  style="margin: 0px;padding: 0px;"
                             min=' <?php echo date('Y')-20 ."-".date("m")."-". date("d"); ?>' class="form-control"
                             value="<?php echo date('Y')-30 ."-".date("m")."-". date("d"); ?>" >
                         </div>
                     </div>
                 </div>

                 <div class="form-row" style="margin: 0px;padding: 0px;"  >
                     <div class="col" style="margin: 0px;padding: 0px;" >
                         <!-- First name -->
                         <div class="md-form" style="margin: 0px;padding: 0px;">
                             <label for="">To</label>
                         </div>
                     </div>
                     <div class="col" tyle="margin: 0px;padding: 0px;" >
                         <!-- Last name -->
                         <div class="md-form" style="margin: 0px;padding: 0px; margin-top: 20px" >
                           <input type="date" style="margin: 0px;padding: 0px;" id="reports_f_to" class="form-control" value="<?php echo date('Y-m-d') ?>">
                         </div>
                     </div>
                 </div>

               </fieldset>



               <fieldset style="margin: 0px;padding: 0px;  margin-top: 20px">
                 <hr>

                 <legend style="margin: 0px;padding: 0px; font-size: 14px">Date used</legend>

                <div class="form-row" style="margin: 0px;padding: 0px;"  >
                    <div class="col" style="margin: 0px;padding: 0px;">
                        <!-- First name -->
                        <div class="md-form" style="margin: 0px;padding: 0px;">
                            <label for="">From</label>
                        </div>
                    </div>
                    <div class="col" style="margin: 0px;padding: 0px;">
                        <!-- Last name -->
                        <div class="md-form" style="margin: 0px;padding: 0px;  margin-top: 20px">
                          <input type="date" id="reports_s_from" max='<?php echo date('Y-m-d');?>'  style="margin: 0px;padding: 0px;"
                            min=' <?php echo date('Y')-20 ."-".date("m")."-". date("d"); ?>' class="form-control"
                            value="<?php echo date('Y')-30 ."-".date("m")."-". date("d"); ?>" >
                        </div>
                    </div>
                </div>

                <div class="form-row" style="margin: 0px;padding: 0px;"  >
                    <div class="col" style="margin: 0px;padding: 0px;" >
                        <!-- First name -->
                        <div class="md-form" style="margin: 0px;padding: 0px;">
                            <label for="">To</label>
                        </div>
                    </div>
                    <div class="col" tyle="margin: 0px;padding: 0px;" >
                        <!-- Last name -->
                        <div class="md-form" style="margin: 0px;padding: 0px; margin-top: 20px" >
                          <input type="date" style="margin: 0px;padding: 0px;" id="reports_s_to" class="form-control" value="<?php echo date('Y-m-d') ?>">
                        </div>
                    </div>
                </div>

              </fieldset>



              <fieldset style="margin: 0px;padding: 0px; margin-top: 20px">
                <hr>

                <legend style="margin: 0px;padding: 0px; font-size: 14px">Quantity used(Kg)</legend>
                <div class="form-row" style="margin: 0px;padding: 0px;"  >
                    <div class="col" style="margin: 0px;padding: 0px;">
                        <!-- First name -->
                        <div class="md-form" style="margin: 0px;padding: 0px;">
                            <label for="">minimum </label>
                        </div>
                    </div>
                    <div class="col" style="margin: 0px;padding: 0px;">
                        <!-- Last name -->
                        <div class="md-form" style="margin: 0px;padding: 0px;  margin-top: 20px">
                          <input type="number" id="reports_min_ammount"   style="margin: 0px;padding: 0px;" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-row" style="margin: 0px;padding: 0px;"  >
                    <div class="col" style="margin: 0px;padding: 0px;" >
                        <!-- First name -->
                        <div class="md-form" style="margin: 0px;padding: 0px;">
                            <label for="">MAximum </label>
                        </div>
                    </div>
                    <div class="col" tyle="margin: 0px;padding: 0px;" >
                        <!-- Last name -->
                        <div class="md-form" style="margin: 0px;padding: 0px; margin-top: 20px" >
                          <input type="number" id="reports_max_ammount"   style="margin: 0px;padding: 0px;" class="form-control">
                        </div>
                    </div>
                </div>
              </fieldset>






               <fieldset style="margin: 0px;padding: 0px; margin-top: 20px;">
                 <hr>
                 <legend style="margin: 0px;padding: 0px; font-size: 14px">Employees handed to</legend>

                 <div class="form-row" style="margin: 0px;padding: 0px;">
                     <div class="col"   style="margin: 0px;padding: 0px;">
                         <div class="md-form" style="margin: 0px;padding: 0px;">
                             <label for="">Breed</label>
                         </div>
                     </div>
                     <div class="col" style="margin: 0px;padding: 0px;">
                         <div class="md-form" style="margin: 0px;padding: 0px;">
                           <input type="text" id="combobox" class="form-control" list="combo-options" oninput="addMorePigs()">
                           <datalist id="combo-options">

                             <?php $pig->loadBreeds("all");  ?>

                           </datalist>
                         </div>
                     </div>
                 </div>

                 <div class="container">
                   <table class="table   table-bordered table-sm " id="myTable2" style="background: #fff">
                 <thead>
                   <tr>
                     <th class="text-uppercase">Name</th>
                     <th class="text-uppercase">clear</th>
                   </tr>
                 </thead>
                 <tbody id="breeds">

                 </tbody>
               </table>
               </div>

               </fieldset>


                <button class="btn btn-rounded btn-block btn-success  waves-effect z-depth-3" type="button" onclick="generateReport()"
                            style="margin-top: 30px;">Generate  report</button>

            </form>
            <!-- Form -->

        </div>

    </div>
  </div>

  <script>
  function addMorePigs() {
    // alert();

      var val  = $("#combobox").val();
      var opts = $('#combo-options').children();
          for (var i = 0; i < opts.length; i++) {
            if (opts[i].value === val) {
              // An item was selected from the list!

              // Add this item to the purchase list
              var selected =opts[i].value;

              var btn="<button class='btn btn-danger btn-sm' type='button' name='button'  onclick='removeSale(\""+selected.replace(/ /g,"_")+"\")'>&times;</button>";

              var tr="<tr id='sales_"+selected.replace(/ /g,"_")+"'>"+
                        "<td>"+selected+"</td>"+
                        "<td>"+btn+"</td> </tr>";

              $("#breeds").append(tr);
              $("#combo-options option").eq(i).remove();
              $("#combobox").val("");
              break;
            }
          }
  }

  </script>
