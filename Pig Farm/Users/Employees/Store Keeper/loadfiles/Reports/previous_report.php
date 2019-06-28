<?php
   require('../../../Database/DB.php');
   require('../../../pigs/Reports/Report.php');

   $report =new Report();
   $baseUrl="../../includes/Reports/pdfReport/generated/";


 ?>



<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header  " style="height: 70px; background:#78909C" >

        <div class="row" style="margin: 0; padding: 0">

        <div class="col-md-10">
          <h3 class="white-text text-center ">
              <strong>Previous reports</strong>
          </h3>
        </div>
        <div class="col-md-2">
          <button class="btn btn-danger btn-sm" onclick="changePane('newReporet','oldReport')" type="button" name="button" style="float:right">&times</button>
        </div>

      </div>


      </div>
      <div class="card-body">
        <div class="container">
          <table class="table table-bordered" id="reportsTable">
            <thead>
              <tr>
                <th>Report</th>
                <th>Date produced</th>
              </tr>
            </thead>
            <tbody>
              <?php $report->getReports("all", "", $baseUrl); ?>

            </tbody>
          </table>

        </div>

      </div>

    </div>

  </div>

</div>

<script>
$(document).ready(function () {$('#reportsTable').dataTable();});
</script>
