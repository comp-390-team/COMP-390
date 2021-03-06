<div class="col-md-12" style="padding-bottom: 5px;">
	<div class="row" style="border-bottom: 2px solid #567">
		<div class="col-md-4">
				 <button class="btn btn-info" type="button"  onclick="viewFeeds()"
					style="font-weight:bold; font-size:25px; width:100%">view available feeds</button>
		</div>
		<div class="col-md-4" style="border-left: 2px solid yellow">
					<button class="btn btn-info" type="button"  onclick="getReport()"
					style="font-weight:bold; font-size:25px; width:100%">Feeds report</button></center>
		</div>
		<div class="col-md-4" style="border-left: 2px solid yellow">
					<button class="btn btn-info" type="button"  onclick="addFeed()"
					style="font-weight:bold; font-size:25px; width:100%">add new feed</button></center>
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
	      <th class="text-uppercase">Quantity</th>
	      <th class="text-uppercase">Employee ID</th>
				<th class="text-uppercase">Date used</th>
	     
	    </tr>
	  </thead>
	  <tbody>
	  	<?php
	        require '../../../../../Database/DB.php';
          require '../../../../../inventory/Inventory.php';
			    require '../../../../../inventory/Feeds.php';


	        $feed=new  Feed();
					$feed->retrieveFeedsUsed();
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
							<strong>Hand out feed</strong>
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
		                    <div class="md-form">
														<label for="">Feed name</label>
		                    </div>
		                </div>
		                <div class="col">
		                    <!-- Last name -->
		                    <div class="md-form">
		                        <input type="text" id="feed_name" class="form-control" value="" disabled>
		                    </div>
		                </div>
		            </div>


								<div class="form-row">
										<div class="col">
												<!-- First name -->
												<div class="md-form">
														<label for="">Quantity<span ></span></label>
												</div>
										</div>
										<div class="col">
												<!-- Last name -->
												<div class="md-form">
														<input type="number" id="feed_quantity" class="form-control">
												</div>
										</div>
								</div>


								<div class="form-row">
		                <div class="col">
		                    <!-- First name -->
		                    <div class="md-form">
														<label for="">Employee ID </label>
		                    </div>
		                </div>
		                <div class="col">
		                    <!-- Last name -->
		                    <div class="md-form">
		                        <input type="text" id="employee_id" class="form-control">
		                    </div>
		                </div>
		            </div>


							</div>


		            <button class="btn btn-rounded btn-block btn-success  waves-effect z-depth-3" type="button" onclick="handFeed()">Update records</button>

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
