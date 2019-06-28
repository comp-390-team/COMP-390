<?php

   //Get data from server
   require '../../../../../../Database/DB.php';
   require '../../../../../../pigs/Pig.php';
   $pig=new  Pig();

   $settings=$pig->loadCurrentSettings()


 ?>


          <div class="container-fluid">

              <div class="card">
                <div class="card-header " style="background:#78909C" >

                  <img src="loadfiles/settings/pig_settings/settings.png" alt="daddsd" width="50px" style="float: right;">
                  <h3 class="white-text text-center" style="font-weight:bold"><strong>Settings</strong></h3>

                </div>
                <div class="card-body" style="padding: 0; margin: 10px">

              <div class="row">
                <div class="col-lg-5" style="height: calc(100vh - 200px); overflow-y: scroll; margin-left: 70px; padding-right: 70px;" >
                  <div class="card col-lg-12" style="margin-bottom: 10px;margin-top: 10px;">
                    <div class="card-header">
                        <h2>Minimum sell settings</h2>
                    </div>
                    <div class="card-body">
                      <form class="text-center"  id="input_form" style="color: #757575;" role="form"  enctype="multipart/form-data">

                        <div class="row"   style=" border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">

                            <div class="col-lg-12 col-md-12 col-sm-12">
                              <div class="row" style="width: 100%">
                              <div class="col-lg-8 col-md-8 col-sm=8" >
                                <!-- <label for="" id="breed_message">Add new  breed </label> -->
                                <div class="md-form" id="breedArea">
                                  <input type="text" id="breed_to_change"  class="form-control"  autocomplete="old password" required/>
                                  <label for="weight">New Breed <span style="display: none" id="weight_r">*</span></label>
                                </div>

                              </div>

                              <div class="col-lg-3 col-md-3 col-sm-3" style="margin:0px; padding:0px">
                               <div class="col-lg-12 col-md-12 col-sm-12">
                                 <button class="btn btn-success" id="saveBreed" type="button" name="button" onclick="breedDetails()"
                                         style="float: left; width:120px; height: 45px; font-size: 12px; padding:0px;">
                                         add new breed
                                 </button>
                               </div>

                               <div class="col-lg-12 col-md-12 col-sm-12">
                                 <button class="btn btn-danger" id="clearBreed" type="button" name="button" onclick="cancelAdd()"
                                         style="float: left; width:120px; height: 45px; font-size: 12px; padding:0px;">
                                         cancel
                                 </button>
                               </div>

                              </div>

                             </div>
                            </div>
                        </div>

                        <div class="row"   style=" border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">

                            <div class="col-lg-12 col-md-12 col-sm-12" >
                              <div class="row" style="width: 100%">
                              <div class="col-lg-8 col-md-8 col-sm=8"  >
                                <div class="md-form" id="breed_details">
                                  <input type="text" id="breed_to_delete"  class="form-control" list="delete_options"  autocomplete="old password" required/>
                                  <label for="weight">Enter breed name <span style="display: none" id="weight_r">*</span></label>

                                  <datalist id="delete_options">

                                    <?php $pig->loadBreeds("delete");  ?>

                                  </datalist>
                                </div>

                              </div>

                              <div class="col-lg-3 col-md-3 col-sm-3" style="margin:0px; padding:0px">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                 <button class="btn btn-danger" id="save_delete" type="button" name="button" onclick="deleteDetails()"
                                         style="float: left; width:120px; height: 45px; font-size: 12px; padding:0px;">
                                         Delete breed
                                 </button>
                               </div>

                               </div>
                             </div>
                            </div>
                        </div>

                          <div class="form-row">
                              <div class="col">
                                  <div class="md-form">
                                      <label for=""> Age</label>
                                  </div>
                              </div>
                              <div class="col">
                                  <div class="md-form">
                                    <input type="date" id="age" class="form-control"  max='<?php echo date('Y-m-d');?>'
                                      min='<?php echo date('Y')-20 ."-".date("m")."-". date("d"); ?>' name="day" required>

                                 </div>
                              </div>
                          </div>


                          <div class="form-row">
                              <div class="col">
                                  <div class="md-form">
                                      <label for="">Weight</label>
                                  </div>
                              </div>
                              <div class="col">
                                  <div class="md-form">
                                      <input type="number" id="weight" class="form-control" min="10" max="120" placeholder="10">
                                  </div>
                              </div>
                          </div>

                          <div class="form-row">
                              <div class="col">
                                <div class="md-form">
                                      <label for="">Sex</label>
                                </div>
                              </div>
                              <div class="col">

                              <div class="form-row">

                                <div class="col">
                                  <div class="md-form">
                                    <input type="checkbox" class="form-check-input" id="male_gender" name="male" value="M">Male
                                  </div>
                                </div>

                                <div class="col">
                                  <div class="md-form">
                                    <input type="checkbox" class="form-check-input" id="female_gender" name="female"  value="F">Female
                                  </div>
                                </div>
                              </div>
                              </div>
                          </div>

                          <div class="form-row">
                              <div class="col">
                                  <div class="md-form">
                                      <label for="">Breed</label>
                                  </div>
                              </div>
                              <div class="col">
                                  <div class="md-form">
                                    <input type="text" id="combobox" class="form-control" list="combo-options" oninput="addMorePigs()">
                                    <datalist id="combo-options">

                                      <?php $pig->loadBreeds("select");  ?>

                                    </datalist>
                                  </div>
                              </div>
                          </div>

                          <!-- Display all selected pigs -->
                          <div class="container">
                            <table class="table   table-bordered table-sm " id="myTable2" style="background: #fff">
                          <thead>
                            <tr>
                              <th class="text-uppercase">Name</th>
                              <th class="text-uppercase">clear</th>
                            </tr>
                          </thead>
                          <tbody id="breeds">
                            <?php $pig->loadCurrentBreeds();  ?>
                          </tbody>
                        </table>
                        </div>

                      </form>

                      <!-- Buttons to decline or acccecpt sale -->
                      <div class="row"  style="height: 70px;
                        padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px; margin-bottom: 13px">
                           <div class="col-md-4">
                              <button class="btn btn-danger btn-sm" type="button" onclick="clearSales()" name="button">clear</button>
                           </div>
                         <div class="col-lg-8 col-md-8 col-sm-8">
                           <center>
                            <button class="btn btn-success btn-sm"  type="button" onclick="sellAllPigs()"  name="button">save</button>
                          </center>
                         </div>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="col-lg-6" style="height: calc(100vh - 200px); overflow-y: scroll;">
                <div class="card col-lg-11" style="margin-bottom: 10px;margin-top: 10px; margin-left: 20px; padding-right: 20px;">
                  <div class="card-header">
                    <center><h2>Current settings</h2></center>

                  </div>
                  <div class="card-body">


                     <div class="row"   style=" border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">
                         <div class="col-lg-4 col-md-4 col-sm-4">
                              <label for="">Age</label>
                         </div>
                         <div class="col-lg-8 col-md-8 col-sm-8">
                           <label for="" id="current_age" hidden><?php echo $settings['min_age']; ?></label>
                           <label for="" id="current_age_shown" ><?php echo $settings['age']; ?></label>

                         </div>
                     </div>

                     <div class="row"   style=" border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">
                         <div class="col-md-4">
                              <label for=""> Weight</label>
                         </div>
                         <div class="col-lg-8 col-md-8 col-sm-8">
                           <label for="" id="current_weight"><?php echo $settings['min_weight']; ?></label>
                         </div>
                     </div>
                     <div class="row"   style="border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">
                         <div class="col-md-4">
                              <label for=""> Sex</label>
                         </div>
                         <div class="col-lg-8 col-md-8 col-sm-8">
                           <label for="" id="current_sex"><?php echo $settings['sex']; ?></label>
                         </div>
                     </div>

                     <div class="row"   style="height: auto; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">

                         <div class="col-lg-12">
                           <center><h1>Breeds</h1></center>
                         </div>
                         <div class="col-lg-12 col-md-12 col-sm-12">
                           <!-- <label for="" id="Cid_entry"><?php  ?></label> -->
                           <ol id="current_breed">
                              <?php

                              foreach ( $settings['breed'] as $breed ){
                                if ($breed !="none"){
                                ?>
                                <li><?php  echo $breed ?></li>
                                    <?php
                                   }
                                 } ?>



                           </ol>
                         </div>


                     </div>


                  </div>

                </div>



                </div>

              </div>



                    <div id="details">

                   </div>



                  </div>
                </div>
                </div>


      <script>
    	$("#current").hide();
      $("#breedArea").hide();
      $("#clearBreed").hide();
      $("#breed_details").hide();


      function breedDetails() {
        $("#breedArea").show();
        $("#clearBreed").show();
        $("#breed_message").hide();
        $("#saveBreed").text("save");
        $("#saveBreed").attr("onclick", "saveChanges()");
      }

       function cancelAdd() {
           $("#breedArea").hide();
           $("#clearBreed").hide();
           $("#breed_message").show();
           $("#saveBreed").text("Add new breed");
           $("#saveBreed").attr("onclick", "breedDetails()");
         }

        function deleteDetails(){
          $("#breed_details").show();
          $("#save_delete").text("save");
          $("#save_delete").attr("onclick", "deleteBreed()");

          $("#save_delete").removeClass( "btn-danger" )
          .addClass( "btn-success");


        }

        function deleteBreed() {
          var breed=$("#breed_to_delete").val();

          if (breed.length > 0)
            removeBreed(breed);
            else {
              Swal.fire("","please enter a valid breed","error");
            }


           ("#breed_details").hide();
           $("#save_delete").text("delete breed");
           $("#save_delete").attr("onclick", "deleteDetails()");
        }


         function saveChanges() {
           var breed=$("#breed_to_change").val();

            addNewBreed(breed);
         }

      //add more pigs to same customer
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

      function removeSale(id_remove) {
        var option="<option value='"+id_remove.replace(/_/g," ")+"' > "+id_remove.replace(/_/g," ")+"</option>";

        var current_total=$("#total").text();
        var price    =$("#iprice_"+id_remove+"").text();

        var sum_total=Number(current_total)-Number(price);


        $("#combo-options").append(option);
        $("#sales_"+id_remove.replace(/ /g,"_")).remove();
        $("#total").text(sum_total);

      }


      function clearSales() {
           $('#myTable2 td:first-child').each(function() {

             var pig_id=$(this).text();

             if (pig_id != "Total") {
               //call function to remove the pigs
               removeSale(pig_id);
             }

         });
      }


      function sellAllPigs() {


         var age=$("#age").val();
         var weight=$("#weight").val();

         var male=$("#male_gender").is(":checked");
         var female=$("#female_gender").is(":checked");


         var sex="ALL";

         if (male && !female)
           sex="M";
         else if(female && !male)
           sex="F";

         var breeds="";
            $('#myTable2 td:first-child').each(function() {

              var pig_id=$(this).text();
              breeds+=pig_id+",";

          });

          breeds=breeds.substring(0, breeds.length - 1);
          breeds=(breeds.length>0)?breeds:"none";
          current_age=$("#current_age").text();

        if ( age.length >0){
          if (weight >= 10){
         updateSellSettings(age, weight, sex, breeds, current_age);


         //reset the current settings
         $("#current_age").text(age);
         $("#current_age_shown").text(age);
         $("#current_weight").text(weight);
         $("#current_sex").text(sex);

         $("#current_breed").empty();

         var selected_breeds=breeds.split(",");
         selected_breeds.forEach(function(element) {
             var li="<li>"+element+"</li";
             $("#current_breed").append(li);
            });
       }else
         Swal.fire("","Pick a weight more than or equal to ten")
       }else{
         Swal.fire("","pick avalid date");
       }

      }

    	</script>
