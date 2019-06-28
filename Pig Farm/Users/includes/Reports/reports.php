<div class="col-lg-12" style="margin:0; padding: 2px;">
  <div class="row">
      <div class="col-lg-8"   style="background: #E0E0E0; height: calc(100vh - 100px);  margin-top: 10px; overflow-y: scroll;">

        <div  id="oldReport" style="margin: 10%; margin-top: 3%">
        </div>

       <div id="newReporet">
         <button class="btn btn-success btn-sm" onclick="changePane('oldReport','newReporet')" type="button" style="float: right">view previous reports</button>

        <div class="row">
          <div class="col-lg-12">
            <center> <h1>Reports</h1>   </center>
          </div>
        </div>

        <div class="col-lg-12">

          <div class="row">
          <div class="col-lg-3">
            <h3>Tittle</h3>
          </div>
          <div class="col-lg-9">
               <input type="text"  id="reportTitle" name="" value="" style="width: 100%; height: 70px; font-size: 30px;font-weight: bold">
          </div>
        </div>

          <div class="row">
            <div class="col-lg-12" id="reportArea" >


            </div>
          </div>

          <div class="row" id="reportGenerator">
            <div class="col-lg-6">
              <button class="btn btn-danger"  id="close_report_pane" type="button" name="button" style="float: right;">Clear reports</button>
            </div>
            <div class="col-lg-6">
              <button class="btn btn-success " id="close_report_pane" onclick="printReport()" type="button" name="button" style="float: right;">Print report</button>
            </div>

          </div>
        </div>

        </div>
      </div>
      <div class="col-lg-4">
         <?php require 'reportsPane.php'; ?>
      </div>

  </div>

</div>
