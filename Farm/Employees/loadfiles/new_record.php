<?php include '../../Admin/loadfiles/production-include.php'; ?>
<div class="row" id="milking_cow">


  <div class="col-md-12" style="background: #a5d6a7; color: #f9fbe7; padding-bottom: 20px;">
    <center> <h3>ADD NEW RECORD</h3> </center>
  </div>

  <div class="col-md-12" style="padding-left: 10%; padding-top: 15px ; padding-right: 10%;">

        <div class="row">
          <div class="row col-md-12">
              <div class="col-sm-6 col-md-6 "><label class="radio-inline"><input type="radio" onchange="H()" name="optradio">Add new milk record</label></div>
              <div class="col-sm-6 col-md-6 "><label class="radio-inline"><input type="radio" onchange="H()" name="optradio">Add new calving record</label></div>
          </div>
        </div>


    <div class="row" style="background: #633">

      <div class="row" style="border: 2px solid #55d600; margin-bottom: 20px; ">
        <div class="col-md-12" style="background: #55d600; color: #f9fbe7; padding-bottom: 20px;">
          <center> <h3>NEW MILK RECORD</h3> </center>
        </div>

        <div class="col-md-12" style="padding-left: 10%; padding-top: 15px ; padding-right: 10%;">

      <!-- Form for sellecting the table to load by an admin -->
              <div class="row">
                <div class="col-md-8" style="background: ; margin-bottom: 50px; margin-left: 5%">

                  <form id="login-form" class="form-horizontal" action="Login/login.php" method="post">

                      <div class="form-group">
                          <label for="username" class="text-info">Select cow ID </label><br>
                          <select class="form-control" name="">
                               <option value="">--------select cow id----------</option>
                               <?php $product->getCowId(); ?>
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="password" class="text-info">Milk produced</label><br>
                          <input type="password" name="password" id="password" class="form-control">
                      </div>

                      <div class="form-group">
                          <input type="submit" name="login" class="btn btn-info btn-md form-control" value="submit" >
                      </div>

                  </form>

                </div>
              </div>
       </div>
       </div>

 </div>
 </div>
</div>


<script>
$(document).ready(function(){
   $(".table").tablesorter();
}
);
</script>
