<div class="row">
  <div id="profile">
    <div class="row">
      <div class="col-lg-12">
        <center>
          <img  id="image_profile1" src="loadfiles/profiles/images/<?php echo str_replace("/","",$details[1])."/".$details[2] ?>" alt="">
        </center>
      </div>
      <div class="col-lg-5">
        <span  style="color: orange">Name:</span>
      </div>
      <div class="col-lg-7" id="username" >
        <?php echo $details[0];?>
      </div>
      <div class="col-lg-5">
        <span style="color: orange">Title :</span>
      </div>
      <div class="col-lg-7">
           <?php echo $details[3];?>
      </div>

      <div class="col-lg-5">
        <span style="color: orange"> ID :</span>
      </div>
      <div class="col-lg-7" id="emp_id">
           <?php echo $details[1]; ?>
      </div>

    </div>



           <form class="" action="../../../../" method="post">
             <button class="btn btn-warning btn-sm"type="submit" name="button" style="float: left; width: 90%">log out</button>

           </form>
  </div>
</div>
