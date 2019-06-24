<?php

$pig=new  Pig();
 ?>



<button class="btn btn-success  btn-sm" id="sort_btn" type="button" name="button"
style="margin-bottom:15px;float: right; width: 200px"> sort the data</button>
<!-- <div class="col-lg-12 col-md-12 col-sm-12" > -->
  <div class="card col-lg-12 col-md-12 col-sm-12" id="sort_pane" style="background: #ECEFF1; margin-bottom:15px">

    <div class="card-body" style="padding: 0px; margin: 0px">
<!-- style="height:35px; border-bottom:4px; padding:3px; margin-left:30px; margin-right:30px; margin-top: 3px" -->
<button class="btn btn-danger btn-sm"  id="close_sort_pane" type="button" name="button" style="float: right;padding: 10px; margin:0">&times</button>

      <div class="row">
        <div class="col-lg-4 col-md-12 col-sm-12">
          <div class="row">
          <div class="col-lg-3 col-md-1 col-sm-1">
               <label for="">From:</label>
          </div>
          <div class="col-lg-9 col-md-6 col-sm-4">
            <div class="md-form" style="padding: 0; margin:0">
                <input type="date" id="sort_from" max='<?php echo date('Y-m-d');?>'
                  min=' <?php echo date('Y')-20 ."-".date("m")."-". date("d"); ?>' class="form-control"
                  value="<?php echo date('Y')-30 ."-".date("m")."-". date("d"); ?>" onchange="sortBy(<?php echo $link; ?> )">
            </div>
          </div>
        </div>
        </div>

        <div class="col-lg-4 col-md-12 col-sm-12">
          <div class="row">
          <div class="col-lg-3 col-md-1 col-sm-1">
               <label for="">To:</label>
          </div>
          <div class="col-lg-9 col-md-6 col-sm-4">
            <div class="md-form" style="padding: 0; margin:0">
                <input type="date" id="sort_to" class="form-control" value="<?php echo date('Y-m-d') ?>" onchange="sortBy(<?php echo $link; ?>)">
            </div>
          </div>
        </div>
        </div>

        <div class="col-lg-4 col-md-12 col-sm-12">
          <div class="row">
          <div class="col-lg-2 col-md-1 col-sm-1">
               <label for="">Sex:</label>
          </div>
          <div class="col-lg-9 col-md-6 col-sm-4">
            <div class="form-row">
              <div class="col">
              <div class="md-form" style="padding: 0; margin:0">
                  <input type="checkbox" id="sort_male" value="" checked onclick="sortBy(<?php echo $link; ?>)"> Male
                </div>
              </div>
              <div class="col">
              <div class="md-form" style="padding: 0; margin:0">
                  <input type="checkbox" id="sort_female"  value=""  checked onclick="sortBy(<?php echo $link ?>)"> female
                </div>
              </div>
            </div>

          </div>

        </div>
        </div>

      </div>


      <div class="row">
        <div class="col-lg-4 col-md-12 col-sm-12">
          <div class="row">
          <div class="col-lg-4 col-md-1 col-sm-1">
               <label for="">Min weight:</label>
          </div>
          <div class="col-lg-8 col-md-6 col-sm-4">
            <div class="md-form" style="padding: 0; margin:0">
                <input type="number" id="sort_min"  class="form-control" value="10" onkeyup="sortBy(<?php echo $link; ?>)">
            </div>
          </div>
        </div>
        </div>

        <div class="col-lg-4 col-md-12 col-sm-12">
          <div class="row">
          <div class="col-lg-4 col-md-1 col-sm-1">
               <label for="">Max weight</label>
          </div>
          <div class="col-lg-8 col-md-6 col-sm-4">
            <div class="md-form" style="padding: 0; margin:0">
                <input type="number" id="sort_max"  class="form-control" value="130"  onkeyup="sortBy(<?php echo $link; ?>)">
            </div>
          </div>
        </div>
        </div>

        <div class="col-lg-4 col-md-12 col-sm-12">
          <div class="row">
          <div class="col-lg-2 col-md-1 col-sm-1">
               <label for="">Breed</label>
          </div>
          <div class="col-lg-9 col-md-6 col-sm-4">
            <div class="md-form" style="padding: 0; margin:0">
                <!-- <input type="text" value="" > -->
                <select class="form-control" id="sort_breed" name="" onchange="sortBy(<?php echo $link; ?>)">
                   <option value="all">All</option>
                   <?php $pig->loadBreeds("all");?>

                </select>
              </div>

          </div>
        </div>
        </div>

      </div>

    </div>

  </div>
