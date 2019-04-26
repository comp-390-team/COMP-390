<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <script src="../../../js/sorttables.js"></script>
    <script src="../../../js/Ajaxloader.js"></script>

  </head>
  <body>
    <?php include 'production-include.php';?>
                    <!-- products view -->
                       <div class="row" id="milking_cow">


                         <div class="col-md-12" style="background: #a5d6a7; color: #f9fbe7; padding-bottom: 20px;">
                           <center> <h3>Production  data</h3> </center>
                         </div>

                         <div class="col-md-12" style="padding-left: 10%; padding-top: 15px ; padding-right: 10%;">

                       <!-- Form for sellecting the table to load by an admin -->
                           <form role="form">

                               <div class="row">

                                 <div class="col-sm-5 col-md-3 form-group">
                                   <label for="select_table" class="col-form-label">View</label>
                                   <select class="form-control" id="select_table" name="selectoption" onchange="loadTable(this.value,from.value,to.value)">
                                      <option value="1">Milk production table</option>
                                      <option value="2">Calving analysis table</option>
                                   </select>
                                 </div>

                                 <!-- Calender for choosing the range of dates to view -->
                                 <div class="col-sm-5 col-md-3 form-group">
                                   <label for="d_from" class=" col-form-label">From:</label>
                                   <input class="form-control" id="d_from" type="date" name="from" value='<?php echo date('Y-m-d');?>' max='<?php echo date('Y-m-d'); ?>' onchange="loadTable(selectoption.value,this.value,to.value)" >
                                 </div>
                                 <div class="col-sm-5 col-md-3 form-group">
                                   <label for="d_to" class=" col-form-label">To:</label>
                                   <input class="form-control" id="d_to" type="date" name="to" value='<?php echo date('Y-m-d');?>'  max='<?php echo date('Y-m-d');?>' onchange="loadTable(selectoption.value,from.value,this.value)">
                                 </div>
                                 <!-- Calender for choosing the range of dates to view -->

                                 <div class="col-sm-5 col-md-3 form-group">
                                   <label for="search" class="col-form-label">Search table</label>
                                   <input class="form-control" id="search" type="search"  placeholder="search">
                                 </div>

                               </div>

                           </form>
                           <!-- Form for sellecting the table to load by an admin -->
                         </div>

                         <div class="col-md-10" id="table"  style="padding-left: 10%; padding-right: 10%;">
                           <?php $product->loadProductionRecord(date('Y-m-d'),date('Y-m-d'));?>
                         </div>

                        </div>
                     <!-- products view -->

                    <!-- statistics pane -->
                     <div class="row" id="statistics">
                        <h1>Analysis</h1>
                     </div>
                     <!-- statistics pane -->

                     <script>
                     $(document).ready(function(){
                          $(".table").tablesorter();
                      }
                  );
                     </script>

  </body>
</html>
