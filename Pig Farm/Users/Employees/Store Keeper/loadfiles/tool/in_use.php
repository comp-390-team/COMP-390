<div class="col-md-12" style="padding-bottom: 5px;">
	<div class="row" style="border-bottom: 2px solid #567">
		<div class="col-md-4">
				 <button class="btn btn-info" type="button"  onclick="vieWTools()"
					style="font-weight:bold; font-size:25px; width:100%">view available tools</button>
		</div>
		<div class="col-md-4" style="border-left: 2px solid yellow">
					<button class="btn btn-info" type="button"  onclick="toolsInUse()"
					style="font-weight:bold; font-size:25px; width:100%">tools in use</button></center>
		</div>
		<div class="col-md-4" style="border-left: 2px solid yellow">
					<button class="btn btn-info" type="button"  onclick="addTool()"
					style="font-weight:bold; font-size:25px; width:100%">Add new tool</button></center>
		</div>
	</div>
</div>
	<div class="col-lg-12 col-md-12 col-sm-12" id="tableHolder"  style="height: calc(100vh - 185px)">
		<!-- <div class="container mt-4" id="statisticsHolder">
            kkfjerkfjerfkerkferferjfk
			</div> -->
		<div class="container mt-2" id="allPigs">
			<table class="table table-bordered table-sm " id="myTable">
	  <thead>
	    <tr>
	      <th class="text-uppercase">Name</th>
	      <th class="text-uppercase">Quantity handed</th>
	      <th class="text-uppercase">employee ID</th>
	      <th class="text-uppercase">Employee name</th>
				<th class="text-uppercase">details</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php
	        require '../../../../../Database/DB.php';
          require '../../../../../inventory/Inventory.php';
			    require '../../../../../inventory/Tools.php';
	        $tool=new  Tool();
					$tool->retrieveItemsInUSe();
			 ?>
	  </tbody>
	</table>
	</div>
	</div>

	<div class="col-lg-4 col-md-4 col-sm-4 container-fluid"  id="to_hide" style="height: calc(100vh - 185px)">

		<div class="card" style="background: #ECEFF1" >

      <div class="card-header  " style="height: 70px; background:#78909C" >
				<div class="row" style="margin: 0; padding: 0">

        <div class="col-md-10">
					<h5 class="white-text text-center ">
							<strong>Hand out tool</strong>
					</h5>
        </div>

        <div class="col-md-2">
					<button type="button" class="btn-danger btn btn-sm" onclick="closeForm()" id="close_update_form" style="float:left">&times</button>
        </div>

			</div>


      </div>


		    <!--Card content-->
		    <div class="card-body">


		        <!-- Form -->
		        <form class="text-center"  id="input_form" style="color: #757575;" role="form"  enctype="multipart/form-data">
							<div class="" id="details_entry">

		            <div class="form-row">
		                <div class="col">
		                    <!-- First name -->
		                    <div class="md-form" style="padding:0;margin: 0">
														<label for="">Tool name</label>
		                    </div>
		                </div>
		                <div class="col">
		                    <!-- Last name -->
		                    <div class="md-form" style="padding:0;margin: 0">
		                        <input type="text" id="tool_name" class="form-control" value="" disabled>
		                    </div>
		                </div>
		            </div>


								<div class="form-row">
										<div class="col">
												<!-- First name -->
												<div class="md-form" style="padding:0;margin: 0">
														<label for="">Date picked</label>
												</div>
										</div>
										<div class="col">
												<!-- Last name -->
												<div class="md-form" style="padding:0;margin: 0">
														<input type="date" id="date_picked" class="form-control" disabled>
												</div>
										</div>
								</div>


								<div class="form-row">
		                <div class="col">
		                    <!-- First name -->
		                    <div class="md-form" style="padding:0;margin: 0">
														<label for="">Employee ID </label>
		                    </div>
		                </div>
		                <div class="col">
		                    <!-- Last name -->
		                    <div class="md-form" style="padding:0;margin: 0">
		                        <input type="text" id="employee_id" class="form-control">
		                    </div>
		                </div>
		            </div>


								<div class="form-row">
										<div class="col">
												<!-- First name -->
												<div class="md-form" style="padding:0;margin: 0">
														<label for="">Employee Name </label>
												</div>
										</div>
										<div class="col">
												<!-- Last name -->
												<div class="md-form" style="padding:0;margin: 0" >
														<input type="text" id="employee_name" class="form-control">
												</div>
										</div>
								</div>

								<div class="md-form">
										<i class="fas fa-pencil-alt prefix"></i>
										<textarea id="remark" class="md-textarea" rows="3"></textarea>
										 <label for="comment">Return remark</label>
								</div>


							</div>


		            <button class="btn btn-rounded btn-block btn-success  waves-effect z-depth-3" type="button" onclick="returnTool()">Return tool</button>

		        </form>
		        <!-- Form -->

		    </div>

		</div>
	</div>
    <script >
    	$(document).ready(function () {
    		$('#myTable').dataTable();
    	});

    </script>
