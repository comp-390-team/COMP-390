
<div class="col-md-12" style="padding-bottom: 5px; padding-top: 0px; margin: 0">
	<div class="row" style="border-bottom: 2px solid #567" style="margin-top:0px">
		<div class="col-md-6">
				 <button class="btn btn-info" type="button" id="viewAll"  onclick="loadFiles('all')"
					style="height: 55px;font-weight:bold; font-size:20px; width:100%">All Pigs </button>
		</div>
		<div class="col-md-6" style="border-left: 2px solid yellow">
					<button class="btn btn-info" type="button" id="viewViable" onclick="loadFiles('viable')"
					style="height: 55px;font-weight:bold; font-size:20px; width:100%">Pigs viable for sale</button></center>
		</div>
	</div>
</div>

	<div class="col-lg-12 col-md-12 col-sm-12"  id="tableHolder"  style="height: calc(100vh - 160px); overflow-y: scroll;">
		<div class="container mt-4" id="statisticsHolder"></div>
		<div class="container mt-2" id="allPigs">
			<!-- <p>Sort by</p> -->


      <?php
			require '../../../../Database/DB.php';
			require '../../../../pigs/Pig.php';

      $link='\'../../includes/getsortedData.php?choice=viewAll&\'';
		   	require '../../../includes/sortby.php';

			 ?>

	    <!-- </div> -->

			<table class="table table-bordered table-sm" id="myTable">
	  <thead>
	    <tr>
	      <th class="text-uppercase">Pig ID</th>
	      <th class="text-uppercase">Breed</th>
	      <th class="text-uppercase">Weight(Kgs)</th>
				<th class="text-uppercase">Age</th>
	      <th class="text-uppercase">Sex</th>
	      <th class="text-uppercase">Update</th>
	      <th class="text-uppercase">Delete</th>
	    </tr>
	  </thead>
	  <tbody id="data">
	  	<?php
					$pig->viewPigs($_GET['type'],false,"");
			 ?>
	  </tbody>
	</table>
	</div>
	</div>

	<div class="col-lg-4 col-md-4 col-sm-4 container-fluid"  id="to_hide" style="background: #E0E0E0;height: calc(100vh - 163px); padding: 8px;">
		<div class="card" style="background: #ECEFF1; margin-bottom: 10px" >

      <div class="card-header  " style="height: 70px; background:#78909C" >
				<div class="row" style="margin: 0; padding: 0">

        <div class="col-md-10">
					<h5 class="white-text text-center ">
							<strong>Update Pig Record</strong>
					</h5>
        </div>

        <div class="col-md-2">
					<button type="button" class="btn-danger btn btn-sm" onclick="closeForm()" id="close_update_form" style="float:left">&times</button>
        </div>

			</div>


      </div>


		    <!--Card content-->
		    <div class="card-body">

					<div class="row"   style=" padding:3px; margin-left:30px; margin-right:5px; margin-top: 0px">

							<div class="col-lg-12 col-md-12 col-sm-12" >

							     <a id="load_statistics" style="font-size: 20px; color: orange; float:right">view  statistics</a>
					</div>
				</div>


		        <!-- Form -->
		        <form class="text-center"  id="input_form" style="color: #757575;" role="form"  enctype="multipart/form-data">
							<div class="" id="details_entry">

		            <div class="form-row">
		                <div class="col">
		                    <!-- First name -->
		                    <div class="md-form">
														<label for="">Pig ID</label>
		                    </div>
		                </div>
		                <div class="col">
		                    <!-- Last name -->
		                    <div class="md-form">
		                        <input type="text" id="pig_entry" class="form-control" value="" disabled>
		                    </div>
		                </div>
		            </div>


								<div class="form-row">
										<div class="col">
												<!-- First name -->
												<div class="md-form">
														<label for="">Date farrowed</label>
												</div>
										</div>
										<div class="col">
												<!-- Last name -->
												<div class="md-form">
														<input type="date" id="age_entry" class="form-control" disabled>
												</div>
										</div>
								</div>


								<div class="form-row">
		                <div class="col">
		                    <!-- First name -->
		                    <div class="md-form">
														<label for="">Breed</label>
		                    </div>
		                </div>
		                <div class="col">
		                    <!-- Last name -->
		                    <div class="md-form">
		                        <input type="text" id="breed_entry" class="form-control">
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
		                        <input type="Number" id="weight_entry" class="form-control">
		                    </div>
		                </div>
		            </div>



								<div class="form-row"  style="padding-bottom:10px">
		                <div class="col">
											<!-- <div class="md-form"> -->
														<label for="">Sex</label>
											<!-- </div> -->
		                </div>
		                <div class="col">

										<div class="form-row">

											<div class="col">
												<!-- <div class="md-form"> -->
													<input type="radio" class="form-check-input" id="male_gender" name="SEX" value="M">Male
												<!-- </div> -->
											</div>

											<div class="col">
												<!-- <div class="md-form"> -->
													<input type="radio" class="form-check-input" id="female_gender" name="SEX"  value="F">Female
												<!-- </div> -->
											</div>
										</div>
		                </div>
		            </div>


								<div class="form-row" id="sell_request">
		                <div class="col">
											<!-- <div class="md-form"> -->
														<label for="">Request sale</label>
											<!-- </div> -->
		                </div>
		                <div class="col">

										<div class="form-row">

											<div class="col">
												<!-- <div class="md-form"> -->
													<input type="radio" class="form-check-input" id="sell_request_y" name="sale" value="Y">Yes
												<!-- </div> -->
											</div>

											<div class="col">
												<!-- <div class="md-form"> -->
													<input type="radio" class="form-check-input" id="sell_request_n" name="sale"  value="N">No
												<!-- </div> -->
											</div>
										</div>
		                </div>
		            </div>

							</div>



								<div class="" style="padding:0px; margin:0px;" id="preview_entry">


									<div class="row" id="quote_id"  style="height:35px; border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">
 				         	   <div class="col-md-6">
 				                	<label for="">Pig ID</label>
 				         	   </div>
 										 <div class="col-lg-4 col-md-6 col-sm-4">
 											 <label for="" id="preview_id"></label>
 										 </div>
 				         </div>
								 <div class="form-row" id="sell_request_preview">
										 <div class="col">
											 <!-- <div class="md-form"> -->
														 <label for="">Request sale</label>
											 <!-- </div> -->
										 </div>
										 <div class="col">

										 <div class="form-row">

											 <div class="col">
												 <!-- <div class="md-form"> -->
													 <input type="radio" class="form-check-input" id="preview_yes" name="preview_sale" value="Y" checked>Yes
												 <!-- </div> -->
											 </div>

											 <div class="col">
												 <!-- <div class="md-form"> -->
													 <input type="radio" class="form-check-input" id="preview_no" name="preview_sale"  value="N">No
												 <!-- </div> -->
											 </div>
										 </div>
										 </div>
								 </div>

									<div class="row"  style="padding:3px; margin-left:3px; margin-right:3px; margin-top: 3px; margin-bottom: 3px">

										<div class="col-lg-6 col-md-6 col-sm-6 " style="padding:0px; margin: 0px;" style="height: 100px;">
											<div class="view overlay zoom" style="width: 100%; height: 100%;">
												  <img id="output" src="" class="img-thumbnail" alt="zoom" width="200px" height="50px">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6"   style="padding:0px; margin: 0px;">
											<div class="view overlay zoom">
													<img id="output1" src="" class="img-thumbnail " alt="zoom">
											</div>
										</div>
                 </div>

								 <div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6">
											<div class="view overlay zoom">
													<img id="output2" src="" class="img-thumbnail " alt="zoom">
											</div>										</div>
										<div class="col-lg-6 col-md-6 col-sm-6">
											<div class="view overlay zoom">
													<img id="output3" src="" class="img-thumbnail " alt="zoom">
											</div>
										</div>
									</div>

								</div>

								<div class="row" style="padding-bottom: 15px" id="file_entry">
									    <div class="col-lg-8 col-md-8 col-sm-8">
												<input type="file" accept="image/*" onchange="loadFile(event)" name="file[]" multiple id="images">
									    </div>
								</div>

		            <button class="btn btn-rounded btn-block btn-success  waves-effect z-depth-3" type="button" onclick="updatePig()">Update records</button>

		        </form>
		        <!-- Form -->

		    </div>

		</div>
	</div>

	<script>
	  var loadFile = function(event) {

	    var output  = document.getElementById('output');
			var output1 = document.getElementById('output1');
			var output2 = document.getElementById('output2');
			var output3 = document.getElementById('output3');


		$("#preview_entry").slideDown(400,function() {

			             //close the image field if no is clicked

			             $("input[name='preview_sale']").change(function() {
			                if ($("input[name='preview_sale']:checked").val() == "N" ) {
			                  $("#preview_entry").slideUp();
			                  $("#file_entry").slideUp();
												$("#details_entry").slideDown(400);
			                  $("#images").val("");
												$("#sell_request_n").prop("checked", true);
												$("#preview_no").prop("checked", true);
			                }
			             });

									 $("#preview_yes").prop("checked", true);
		});
		$("#details_entry").slideUp(400);

	    output.src = URL.createObjectURL(event.target.files[0]);
			output1.src = URL.createObjectURL(event.target.files[1]);
			output2.src = URL.createObjectURL(event.target.files[2]);
			output3.src = URL.createObjectURL(event.target.files[3]);


	  };
	</script>

    <script >
    	$(document).ready(function () {
    		$('#myTable').dataTable();

				$("#statisticsHolder").hide();
    		$("#load_statistics").click(function() {

    			   $("#allPigs").slideUp(150);
						 $("#statisticsHolder").slideDown(150);

						 var id    = $("#pig_entry").val();
						 var weight= $("#weight_entry").val();
						 var age= $("#age_entry").val();
						 var breed= $("#breed_entry").val();



						 $("#statisticsHolder").load("loadfiles/statistics/statistics.php?pig_id="+id+"&weight="+weight+"&age="+age+"&breed="+breed);

    		});
    	});

    </script>
