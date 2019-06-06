<!DOCTYPE html>
<html>
<head>
	<title></title>


	<link rel="stylesheet" type="text/css" href="../../../../CSS/MDB/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../CSS/MDB/css/mdb.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../CSS/MDB/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../../../CSS/MDB/css/mdb.style.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../CSS/Scripts/css/jquery.dataTables.min.css">


   <script src="../../../../CSS/MDB/js/bootstrap.min.js"></script>
   <script src="../../../../CSS/MDB/js/jquery-3.3.1.min.js"></script>
   <script src="../../../../CSS/MDB/js/mdb.min.js"></script>
   <script src="../../../../CSS/MDB/js/popper.min.js"></script>
   <script src="../../../../CSS/Scripts/js/jquery.dataTables.min.js"></script>


</head>
<body>

  <div class="col-md-12">
    <div class="row" style="border-bottom: 2px solid #567">
      <div class="col-md-6">
           <button class="btn btn-info" type="button"  onclick="viewAll()"
            style="font-weight:bold; font-size:25px; width:100%">VIEW ALL PIGS</button>
      </div>
      <div class="col-md-6">
            <button class="btn btn-info" type="button"  onclick="viewPigsTosell()"
            style="font-weight:bold; font-size:25px; width:100%">PIGS TO BE SOLD</button></center>
      </div>
    </div>

  </div>

	<div class="col-lg-12 col-md-12 col-sm-12" id="tableHolder">
		<div class="container mt-4">
			<table class="table table-bordered table-sm " id="myTable">
	  <thead>
	    <tr>
	      <th class="text-uppercase">Pig ID</th>
	      <th class="text-uppercase">Breed</th>
	      <th class="text-uppercase">Weight</th>
				<th class="text-uppercase">Age</th>
	      <th class="text-uppercase">Sex</th>
				<th class="text-uppercase">Sell</th>

	    </tr>
	  </thead>
	  <tbody>
	  	<?php
	        require '../../../../Database/DB.php';
			    require '../../../../pigs/Pig.php';
	        $pig=new  Pig();
					$pig->viewPigsToBeSold();
			 ?>
	  </tbody>
	</table>
	</div>

	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 container-fluid"  id="to_hide" >
		<p></p>
		<!-- Material form register -->
		<div class="card" style="background: #ECEFF1; margin: 0px;">

      <div class="card-header " style="height: 60px; background:#78909C" >
				<div class="row" style="margin: 0; padding: 0">

				<div class="col-md-10">
					<h5 class="white-text text-center" style="font-weight:bold">
							<strong>Pig details</strong>
					</h5>
				</div>
				<div class="col-md-2">
					<button type="button" class="btn-danger btn btn-sm" onclick="closeForm()" id="close_update_form" >&times</button>

				</div>
			</div>
      </div>

			<img class="card-img-top" src="../../pigs/pigsToSell/A345/A345_0.jpg" alt="Card image cap" width="100%" height="200px" id="pig_image">

			<div class="row" style="height:35px; background-color:#7bb; padding:0px; margin:0px;">
				<div class="col-md-6">
					<a style="margin-left:20px;margin-top:0.9%;font-size: 20px; color:white; font-weight: bold;" id="previous">previous</a>
				</div>
				<div class="col-md-6" >
					<a style="float:right; margin-right:20px; margin-top:0.9%; font-size: 20px; color:white; font-weight: bold;" id="next">next</a>
				</div>
			</div>

		    <div class="card-body" style="margin: 0px; padding: 0px">
					<div class="" id="details">

				         <div class="row" id="quote_id"  style="height:35px; border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">
				         	   <div class="col-md-4">
				                	<label for="">Pig ID</label>
				         	   </div>
										 <div class="col-lg-8 col-md-8 col-sm-8">
											 <label for="" id="pig_entry"></label>
										 </div>
				         </div>
								 <div class="row"  style="height:35px; border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">
											<div class="col-md-4">
												 <label for="">Weight </label>
											</div>
										<div class="col-lg-8 col-md-8 col-sm-8">
											<label for="" id="weight_entry"></label>
										</div>
								 </div>
								 <div class="row"  style="height:35px; border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">
											<div class="col-md-4">
												 <label for="">Age</label>
											</div>
										<div class="col-lg-8 col-md-8 col-sm-8">
											<label for="" id="age_entry" ></label>
										</div>
								 </div>
								 <div class="row"  style="height:35px; border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">
										 <div class="col-md-4">
												<label for="">Breed</label>
										 </div>
									 <div class="col-lg-8 col-md-8 col-sm-8">
										 <label for="" id="breed_entry"></label>
									 </div>
								</div>

								<div class="row" id="quote_price"  style="height:35px; border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">
										 <div class="col-md-4">
												<label for="">Price</label>
										 </div>
									 <div class="col-lg-4 col-md-8 col-sm-8">
										  <input type="number" name="" value="" id="quoted_price" value="" required>
									 </div>
								</div>


								<!-- Buttons to decline or acccecpt sale -->
								<div class="row"  style="height:35px;
								  padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px; margin-bottom: 13px">
										 <div class="col-md-4">
												<button class="btn btn-danger btn-sm" type="button" onclick="hideDetails()" name="button">Decline</button>
										 </div>
									 <div class="col-lg-8 col-md-8 col-sm-8">
										 <center>
										  <button class="btn btn-success btn-sm" id="approve" type="button" onclick="openPriceField()"  name="button">Quote price</button>
										</center>
									 </div>
								</div>

			</div>
			<div id="decline" style="margin:0px; padding:0px;">
				<div class="row" style=" margin-right:30px; margin-top: 3px;">
            <div class="col-md-12" style="padding:0px; margin: 0px;">
						<div class="md-form" style="padding:0px; margin-bottom: 0px; margi-top: 50px">
								<i class="fas fa-pencil-alt prefix"></i>
								<textarea id="comment" class="md-textarea" rows="3"></textarea>
								 <label for="comment">Remarks for decline</label>
						</div>

					</div>
				</div>
				<div class="row"  style="height:35px;
					padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px; margin-bottom: 20px">
						 <div class="col-md-6">
								<button class="btn btn-danger btn-sm" type="button" onclick="hideDetails()" name="button">back</button>
						 </div>
					 <div class="col-lg-4 col-md-6 col-sm-4">
						 <button class="btn btn-success btn-sm" type="button" onclick="rejectSelling()"  name="button">Comment</button>
					 </div>
				</div>
			</div>


        </div>
			    </div>

		</div>

    <script >
    	$(document).ready(function () {
    		$('#myTable').dataTable();
    		// body...
    	});

    </script>

		<script src="../../../../js/libraries/bootstrap.min.js"></script>
    <script src="../../../../js/libraries/jquery-3.3.1.min.js"></script>
    <script src="../../../../js/libraries/vue.min.js"></script>
    <script src="../../../../CSS/MDB/js/mdb.min.js"></script>

		<script src="../../../../js/Ajaxloader.js"></script>


    <script type="../../../../CSS/MDB/js/popper.min.js"></script>
    <script src="../../../../CSS/Scripts/js/jquery.dataTables.min.js"></script>
<!-- Initializations -->
<script type="text/javascript">
	// Animations initialization
	new WOW().init();
</script>
<script type="text/javascript">
// Material Select Initialization
		$(document).ready(function() {
		$('.mdb-select').materialSelect();
		});
</script>

</body>
</html>
