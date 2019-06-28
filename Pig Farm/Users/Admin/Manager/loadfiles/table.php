
	<div class="col-lg-12 col-md-12 col-sm-12" id="tableHolder" style="height: calc(100vh - 110px); overflow-y: scroll;" >
	<div class="container mt-4">
		<table class="table table-bordered table-sm " id="myTable">
  <thead>
    <tr>
      <th class="text-uppercase">ID</th>
      <th class="text-uppercase">Name</th>
      <th class="text-uppercase">Phone number</th>
      <th class="text-uppercase">Job Tittle</th>
      <th class="text-uppercase">Nationality</th>
      <th class="text-uppercase">Update</th>
			<th class="text-uppercase">Delete</th>

    </tr>
  </thead>
  <tbody>
  	<?php
        require '../../../../Database/DB.php';
		    require '../../../../Persons/FarmManager.php';
        $pig=new  FarmManager();
				$pig->viewEmployees();
		 ?>
  </tbody>
</table>
</div>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 container-fluid"  id="to_hide" style="background: #E0E0E0">
	<p></p>
	<!-- Material form register -->
	<div class="card" style="background: #ECEFF1">

		<div class="card-header " style="height: 90; background:#78909C" >
			<div class="row" style="margin: 0; padding: 0">

			<div class="col-md-11">
				<h5 class="white-text text-center ">
						<strong>Update Employee Record</strong>
				</h5>
			</div>

			<div class="col-md-1">
				<button type="button" class="btn-danger btn btn-sm" onclick="closeForm()" id="close_update_form" >&times</button>

			</div>

		</div>
		</div>


			<!--Card content-->
			<div class="card-body px-lg-5 pt-0">

					<!-- Form -->
					<form class="text-center" style="color: #757575;" role="form">

							<div class="form-row">
									<div class="col">
											<!-- First name -->
											<div class="md-form">
													<label for=""> ID</label>
											</div>
									</div>
									<div class="col">
											<!-- Last name -->
											<div class="md-form">
													<input type="text" id="id_entry" class="form-control" value="" disabled>
											</div>
									</div>
							</div>

							<div class="form-row">
									<div class="col">
											<!-- First name -->
											<div class="md-form">
													<label for="">Name</label>
											</div>
									</div>
									<div class="col">
											<!-- Last name -->
											<div class="md-form">
													<input type="text" id="name_entry" class="form-control" disabled>
											</div>
									</div>
							</div>


							<div class="form-row">
									<div class="col">
											<!-- First name -->
											<div class="md-form">
													<label for="">Phone number</label>
											</div>
									</div>
									<div class="col">
											<!-- Last name -->
											<div class="md-form">
													<input type="text" id="phone_entry" class="form-control">
											</div>
									</div>
							</div>

							<div class="form-row">
									<div class="col">
											<div class="md-form">
													<label for="">Tittle</label>
											</div>
									</div>
									<div class="col">
											<div class="md-form">
													<input type="text" id="tittle_entry" class="form-control">
											</div>
									</div>
							</div>
							<div class="form-row">
									<div class="col">
											<div class="md-form">
													<label for="">Nationality</label>
											</div>
									</div>
									<div class="col">
											<div class="md-form">
													<input type="text" id="nationality_entry" class="form-control">
											</div>
									</div>
							</div>




							<button class="btn btn-rounded btn-block btn-success  waves-effect z-depth-2" type="button" onclick="updateEmployee()">Update  records</button>

					</form>
					<!-- Form -->

			</div>

	</div>
</div>

    <script >
    	$(document).ready(function () {
    		$('#myTable').dataTable();
    		// body...
    	});
    </script>
