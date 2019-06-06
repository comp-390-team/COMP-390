<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="main.css">


    <title>pigs</title>
  </head>
  <body>


    <div class="col-md-12">
      <div class="row" style="border-bottom: 2px solid #567">
        <div class="col-md-6">
             <button class="btn btn-info" type="button"  onclick="viewAccepted()"
              style="font-weight:bold; font-size:25px; width:100%">Pigs Accepted for sale</button>
        </div>
        <div class="col-md-6" style="border-left: 2px solid yellow">
              <button class="btn btn-info" type="button"  onclick="viewRejectedSale()"
              style="font-weight:bold; font-size:25px; width:100%">Pigs rejected</button></center>
        </div>
      </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12" id="tableHolder">
  		<div class="container mt-4">
  			<table class="table table-bordered table-sm " id="myTable">
  	  <thead>
  	    <tr>
  	      <th class="text-uppercase">Pig ID</th>
  	      <th class="text-uppercase">Price</th>
  	      <th class="text-uppercase">Weight</th>
  				<th class="text-uppercase">Age</th>
  	      <th class="text-uppercase">Action</th>
  	    </tr>
  	  </thead>
  	  <tbody>
  	  	<?php
  	        require '../../../../../Database/DB.php';
  			    require '../../../../../pigs/Pig.php';
  	        $pig=new  Pig();
  					$pig->acceptedForSale();
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

    		<script src="../../../../../js/libraries/bootstrap.min.js"></script>
        <script src="../../../../../js/libraries/jquery-3.3.1.min.js"></script>
        <script src="../../../../../js/libraries/vue.min.js"></script>
        <script src="../../../../../CSS/MDB/js/mdb.min.js"></script>

    		<script src="../../../../../js/Ajaxloader.js"></script>


        <script type="../../../../../CSS/MDB/js/popper.min.js"></script>
        <script src="../../../../../CSS/Scripts/js/jquery.dataTables.min.js"></script>



  </body>
</html>
