<?php
//Get data from server
require '../../../Database/DB.php';
require '../../../pigs/Pig.php';
$pig=new  Pig();

  $paneID=$_POST['paneID'];

  $min_date_farrowed  =$_POST['min_date_farrowed'];
  $max_date_farrowed  =$_POST['max_date_farrowed'];

  $min_date_sold      =$_POST['min_date_sold'];
  $max_date_sold      =$_POST['max_date_sold'];
  $min_ammount        =$_POST['min_ammount'];
  $max_ammount        =$_POST['max_ammount'];

  $min_weight         =$_POST['min_weight'];
  $max_weight         =$_POST['max_weight'];
  $breeds             =$_POST['breeds'];

  $sex                =$_POST['sex'];
  $type               =$_POST['type'];


  $report_message=($type == "general" )?"General report": "Sales report";


     require 'report_query.php';

 ?>


<div class="card" style="margin: 10px; margin-top: 30px; background: #EfE8Ef" id="pane<?php echo $paneID ?>">

  <div class="card-body">
    <button class="btn btn-danger btn-sm"  onclick="closePane('pane<?php echo $paneID ?>')" type="button" name="button" style="float: right;padding: 10px; margin:0">&times</button>


     <form class="text-center">
    <div class="row">
       <div class="col-lg-11">
         <div class="md-form" style="margin-left: 30px">
             <input type="text" id="Subtitle<?php echo $paneID ?>" class="form-control" value="">
             <label for="Subtittle<?php echo $paneID ?>">Enter sub tittle here</label>

         </div>
       </div>
    </div>

    <div id="contentsPane<?php echo $paneID ?>">
    <div class="row">
       <div class="col-lg-12">
         <div class="row">
            <div class="col-lg-8">
              <h2 id="type<?php echo $paneID ?>"> <?php echo $report_message ?></h2>
            </div>
            <div class="col-lg-4">
              <button class="btn btn-success btn-sm"
                      onclick="changePane('analysisPane<?php echo $paneID ?>','contentsPane<?php echo $paneID ?>')"
                      type="button" name="button" style="float:right">give analysis</button>
            </div>
          </div>


       </div>
       <div class="col-lg-12" >
         <div class="row">

         <div class="col-lg-6">
           <h4>Used measures</h4>
            <table class="table table-sm table-bordered" id="parameter<?php echo $paneID ?>" style="background: #91E3E0;">
                <thead>
                <tr>  <th>Measure</th> <th>Value</th><tr>
                </thead>
                <tbody>
                  <tr style="height: 25px; text-align: left" ><td>Type</td>  <td><?php echo $type; ?></td></tr>
                  <tr style="height: 25px; text-align: left"><td style="height: 25px">Earliest farrowed date</td>  <td><?php echo $min_date_farrowed; ?></td></tr>
                  <tr style="height: 25px; text-align: left"><td>Latest farrowed date</td>  <td><?php echo $max_date_farrowed; ?></td></tr>

                <?php if ($type == "sales") {?>
                  <tr style="height: 25px;text-align: left"><td>Earliest sale date</td>  <td><?php echo $min_date_sold; ?></td></tr>
                  <tr style="height: 25px;text-align: left"><td>Latest  sale  date</td>  <td><?php echo $max_date_sold; ?></td></tr>
                  <tr style="height: 25px;text-align: left"><td>Mimimum sale ammount</td>  <td>Ksh <?php echo $min_ammount; ?></td></tr>
                  <tr style="height: 25px;text-align: left"><td>Maximum sale ammount</td>  <td>Ksh <?php echo $max_ammount; ?></td></tr>
                <?php } ?>
                  <tr style="height: 25px;text-align: left"><td>Minimum weight</td>  <td><?php echo $min_weight;  ?>  Kgs</td></tr>
                  <tr style="height: 25px;text-align: left"><td>Maximum weight</td>  <td><?php echo $max_weight;  ?>  Kgs</td></tr>
                  <tr style="text-align: left"><td>Breeds </td>  <td><?php echo $breeds ?></td></tr>
                  <tr style="height: 25px;text-align: left"><td>Sex</td>  <td><?php echo $sex ?></td></tr>
                </tbody>

            </table>
         </div>

         <div class="col-lg-6" >
           <h4>Generated Data</h4>

           <div class="container" id="data<?php echo $paneID ?>">
             <table class="table   table-bordered table-sm "  style="background: #fff">
           <thead>
             <tr>
               <th class="text-uppercase">Breed</th>
               <th class="text-uppercase">Count</th>
              <?php if ($type == "sales"): ?>
              <th class="text-uppercase">Total sale</th>
              <?php endif; ?>
             </tr>
           </thead>
           <tbody id="collected_data">

             <?php if ($type=="general"): ?>
               <?php $pig->Report($query,"general"); ?>
               <?php else: ?>
               <?php $pig->Report($query,"sales"); ?>
             <?php endif; ?>



           </tbody>
         </table>
         </div>


         </div>
       </div>
       </div>
    </div>
  </div>


    <div class="row" id="analysisPane<?php echo $paneID ?>" style="background: #E7EfE0">
           <div class="col-lg-11">
             <div class="md-form">
                 <i class="fas fa-pencil-alt prefix"></i>
                 <textarea id="analysis<?php echo $paneID ?>" class="md-textarea" rows="10"></textarea>
                 <label for="analysis<?php echo $paneID ?>" style="font-size: 18px; ">Give your analysis</label>
             </div>
           </div>
           <div class="col-lg-12">
             <button class="btn btn-success"
                     onclick="changePane('contentsPane<?php echo $paneID ?>','analysisPane<?php echo $paneID ?>')"
                     type="button" name="button"
                     style="float:right">Save</button>
           </div>
    </div>


   </form>
  </div>

</div>
<script>

$("#analysisPane<?php echo $paneID ?>").hide();

</script>
