<?php
require '../../../../../Database/DB.php';
require '../../../../../pigs/Pig.php';
$pig=new  Pig();

  $pig_Id=$_GET['pig_id'];
  $weight=$_GET['weight'];
  $age=$_GET['age'];
  $breed=$_GET['breed'];


  $data=$pig->getStatistics($pig_Id);

 ?>

<div class="card"  style="background: #ECEFF1">
  <div class="card-header" style="height: 70px; background:#78909C">
       <div class="row" style="margin: 0; padding: 0">

        <div class="col-md-10">


         <center><h4 class="white-text text-center " style="text-transform:uppercase;">pig id number <?php echo  $pig_Id?> analysis</h4><center>

        </div>

        <div class="col-md-2">
         <button type="button" class="btn-danger btn btn-sm" onclick="openTable()" id="close_update_form" style="float:left">&times</button>
        </div>

     </div>
  </div>
    <div class="card-body">
         <div class="row">
              <div class="col-lg-8" style="">
                <div id="container" style="height: 350px; min-width: 450px; width: 500px"></div>
              </div>
              <div class="col-lg-4">

                <div class="" id="details">
                       <div class="row"  style="height:35px; border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">
                            <div class="col-md-4">
                               <label for="">Weight </label>
                            </div>
                          <div class="col-lg-8 col-md-8 col-sm-8">
                            <label for="" id="weight_entry"><?php echo $weight."   kg"; ?></label>
                          </div>
                       </div>
                       <div class="row"  style="height:35px; border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">
                            <div class="col-md-4">
                               <label for="">Age</label>
                            </div>
                          <div class="col-lg-8 col-md-8 col-sm-8">
                            <label for="" id="age_entry" ><?php echo $age; ?></label>
                          </div>
                       </div>
                       <div class="row"  style="height:35px; border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">
                           <div class="col-md-4">
                              <label for="">Breed</label>
                           </div>
                         <div class="col-lg-8 col-md-8 col-sm-8">
                           <label for="" id="breed_entry"><?php echo $breed; ?></label>
                         </div>
                      </div>

                      <div class="row"  style="height:35px; border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">
                          <div class="col-md-8">
                             <label for="">farrowings</label>
                          </div>
                        <div class="col-lg-4 col-md-8 col-sm-8">
                          <label for="" id="breed_entry"><?php echo $breed; ?></label>
                        </div>
                     </div>

                     <div class="row"  style="height:35px; border-bottom:1px solid #222; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px">
                         <div class="col-md-8">
                            <label for="">piglets</label>
                         </div>
                       <div class="col-lg-4 col-md-8 col-sm-8">
                         <label for="" id="breed_entry"><?php echo $breed; ?></label>
                       </div>
                    </div>
            </div>

              </div>

              </div>
         </div>

    </div>
</div>


<script>



var elevationData = <?php echo json_encode($data); ?>


    Highcharts.chart('container', {
      chart: {
        zoomType: 'x'
      },
      title: {
        text: 'Growth rate visual view'
      },
      xAxis: {
        type: 'datetime'
      },
      yAxis: {
        title: {
          text: 'weight'
        }
      },
      legend: {
        enabled: false
      },
      plotOptions: {
        area: {
          fillColor:  "#16A085",
          lineColor:  Highcharts.getOptions().colors[1],
          fillOpacity: 0.5,
          marker: {
            radius: 2
          },
          lineWidth: 2,
          states: {
            hover: {
              lineWidth: 3
            }
          },
          threshold: null
        }
      },

      series: [{
        type: 'area',
        name: 'weight(kg)',
        data: elevationData
      }]
    });


</script>
