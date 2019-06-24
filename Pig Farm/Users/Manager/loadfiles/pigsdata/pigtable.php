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
      <div class="col-md-6" style="border-left: 2px solid yellow">
            <button class="btn btn-info" type="button"  onclick="viewPigsTosell()"
            style="font-weight:bold; font-size:25px; width:100%">PIGS TO BE SOLD</button></center>
      </div>
    </div>

  </div>

	<!-- <div class="row"> -->
	<div class="col-lg-12 col-md-12 col-sm-12" id="tableHolder">
		<div class="container mt-4">
			<?php
			require '../../../../Database/DB.php';
			require '../../../../pigs/Pig.php';

				 $link='\'../includes/getsortedData.php?choice=pigsdata&\'';
				require '../../../includes/sortby.php';

			 ?>

			<table class="table table-bordered table-sm " id="myTable">
	  <thead>
	    <tr>
	      <th class="text-uppercase">Pig ID</th>
	      <th class="text-uppercase">Breed</th>
	      <th class="text-uppercase">Weight</th>
				<th class="text-uppercase">Age</th>
	      <th class="text-uppercase">Sex</th>
	    </tr>
	  </thead>
	  <tbody id="data">
	  	<?php
	        // require '../../../../Database/DB.php';
			    // require '../../../../pigs/Pig.php';
	        // $pig=new  Pig();
					$pig->viewPigData(false,"");
			 ?>
	  </tbody>
	</table>
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

</body>
</html>
