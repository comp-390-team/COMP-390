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


    <div class="col-md-12" style="padding-bottom: 5px;">
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

    <div class="col-lg-12 col-md-12 col-sm-12" id="tableHolder" style="height: calc(100vh - 185px)">
  		<div class="container mt-4">


        <?php

        require '../../../../../Database/DB.php';
        require '../../../../../pigs/Pig.php';

           $link='\'../../includes/getsortedData.php?choice=accepted&\'';
          require '../../../../includes/sortby.php';

         ?>


  			<table class="table table-bordered table-sm " id="myTable">
  	  <thead>
  	    <tr>
  	      <th class="text-uppercase">Pig ID</th>
  	      <th class="text-uppercase">Price</th>
  	      <th class="text-uppercase">Weight</th>
  				<th class="text-uppercase">Breed</th>
          <th class="text-uppercase">Age</th>
          <th class="text-uppercase">Gender</th>
  	      <th class="text-uppercase">Action</th>
  	    </tr>
  	  </thead>
  	  <tbody id="data">
  	  	<?php
  					$pig->acceptedForSale(false,"");
  			 ?>
  	  </tbody>
  	</table>
  	</div>
  	</div>



    <div class="col-lg-4 col-md-4 col-sm-4 container-fluid"  id="to_hide" style="height: calc(100vh - 185px)">
      <!-- Material form register -->
      <div class="card" style="background: #ECEFF1; margin: 0px; margin-bottom: 4px;margin-top: 8px;  ">

        <div class="card-header " style="height: 60px; background:#78909C" >
          <div class="row" style="margin: 0; padding: 0">

          <div class="col-md-10">
            <h5 class="white-text text-center" style="font-weight:bold">
                <strong>Purchase details</strong>
            </h5>
          </div>
          <div class="col-md-2">
            <button type="button" class="btn-danger btn btn-sm" onclick="closeForm()" id="close_update_form" >&times</button>

          </div>
        </div>
        </div>


          <div class="card-body" style="margin: 0px; padding: 0px">
            <div class="" id="details">

                   <div class="row" id="quote_id"  style="height:35px; border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">
                       <div class="col-md-4">
                            <label for=""> ID</label>
                       </div>
                       <div class="col-lg-8 col-md-8 col-sm-8">
                         <label for="" id="Cid_entry"></label>
                       </div>
                   </div>
                   <div class="row"  style="height:35px; border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">
                        <div class="col-md-4">
                           <label for=""> Name </label>
                        </div>
                      <div class="col-lg-8 col-md-8 col-sm-8">
                        <label for="" id="Cname_entry"></label>
                      </div>
                   </div>
                   <div class="row"  style="height:35px; border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">
                        <div class="col-md-4">
                           <label for="">Address</label>
                        </div>
                      <div class="col-lg-8 col-md-8 col-sm-8">
                        <label for="" id="Caddress_entry" ></label>
                      </div>
                   </div>
                   <div class="row"  style="height:35px; border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">
                       <div class="col-md-4">
                          <label for="">Contacts</label>
                       </div>
                     <div class="col-lg-8 col-md-8 col-sm-8">
                       <label for="" id="Ccontact_entry"></label>
                     </div>
                  </div>


                  <div class="row"  style=" margin-left:30px; margin-right:30px; margin-top: 3px">
                    <div class="md-form col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 10px;" >
                      <input type="text" id="combobox" class="form-control" list="combo-options" oninput="addMorePigs()">
                      <datalist id="combo-options">

                        <?php $pig->loadID_Of_Pigs_To_Sell();  ?>
                      </datalist>
                      <label for="combobox"> Add more pigs </label>
                    </div>
                 </div>




                     <!-- Display all selected pigs -->
                     <div class="container">
                 			<table class="table   table-bordered table-sm " id="myTable2" style="background: #fff">
                 	  <thead>
                 	    <tr>
                 	      <th class="text-uppercase">Pig ID</th>
                 	      <th class="text-uppercase">Price</th>
                        <th class="text-uppercase">remove</th>

                 	    </tr>
                 	  </thead>
                 	  <tbody>
                       <tr id='total_charges'><td>Total</td><td id="total">0</td><td></td></tr>
                 	  </tbody>
                 	</table>
                 	</div>


                  <!-- Buttons to decline or acccecpt sale -->
                  <div class="row"  style="height: 70px;
                    padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px; margin-bottom: 13px">
                       <div class="col-md-4">
                          <button class="btn btn-danger btn-sm" type="button" onclick="clearSales()" name="button">clear</button>
                       </div>
                     <div class="col-lg-8 col-md-8 col-sm-8">
                       <center>
                        <button class="btn btn-success btn-sm"  type="button" onclick="sellAllPigs()"  name="button">Sell</button>
                      </center>
                     </div>
                  </div>

        </div>

          </div>
            </div>

      </div>


        <script >
        	$(document).ready(function () {
        		$('#myTable').dataTable();
            // $('#myTable2').dataTable();

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
