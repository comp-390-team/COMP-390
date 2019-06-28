
  <div class="col-md-12">
    <div class="row" style="border-bottom: 2px solid #567">
      <div class="col-md-4">
           <button class="btn btn-info" type="button"  onclick="viewAll()"
            style="font-weight:bold; font-size:25px; width:100%">VIEW ALL PIGS</button>
      </div>
      <div class="col-md-4" style="border-left: 2px solid yellow">
            <button class="btn btn-info" type="button"  onclick="viewPigsTosell()"
            style="font-weight:bold; font-size:25px; width:100%">PIGS TO BE SOLD</button></center>
      </div>
			<div class="col-md-4">
						<button class="btn btn-info" type="button"  onclick="viewDeletedPigs()"
						style="font-weight:bold; font-size:25px; width:100%">Pigs Deleted</button></center>
			</div>
    </div>

  </div>

	<!-- <div class="row"> -->
	<div class="col-lg-12 col-md-12 col-sm-12" id="tableHolder">
		<div class="container mt-4">
			<?php
			require '../../../../../Database/DB.php';
			require '../../../../../pigs/Pig.php';

				 $link='\'../../includes/getsortedData.php?choice=pigsdata&\'';
				require '../../../../includes/sortby.php';

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

</body>
</html>
