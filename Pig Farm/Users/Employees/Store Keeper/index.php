<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="twitter:" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    <link rel="stylesheet" href="../../../CSS/style.css">
    <!-- <link rel="stylesheet" href="../../CSS/tableStylying.css"> -->
    <link rel="stylesheet" type="text/css" href="loadfiles/tool/style.css">


    <link rel="stylesheet" href="../../../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../../../CSS/MDB/css/mdb.min.css">
    <link rel="stylesheet" href="../../../CSS/MDB/css/mdb.css">
    <link rel="stylesheet" href="../../../CSS/MDB/css/style.css">



      <link rel="stylesheet" type="text/css" href="../../../CSS/MDB/css/mdb.style.min.css">
      <link rel="stylesheet" type="text/css" href="../../../CSS/Scripts/css/jquery.dataTables.min.css">



        <!-- Sweet alert used for alerts -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
     <script src="sweetalert2.all.min.js"></script>

      <!--
      <script src="https://code.highcharts.com/highcharts.js"></script>
      <script src="https://code.highcharts.com/modules/annotations.js"></script>
      <script src="https://code.highcharts.com/modules/exporting.js"></script>
      <script src="https://code.highcharts.com/modules/export-data.js"></script> -->
  </head>
  <body>
   <div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
        <div class="row">
          <div id="profile">
                  <center><img src="pig.JPG" alt=""></center>
                  <p><span style="color: green">Name:</span> <?php echo $_SESSION['username'];?> <br>
                  <span style="color: green">Title :</span>Store keeper </p>
                  <span style="color: green">Employee Id:
                     <label id="emp_id" style="color: white">
                       <?php echo gzinflate(base64_decode(str_rot13($_GET['id']))); ?>
                     </label>
                  </span>
          </div>
        </div>
        <ul class="sidebar-nav">
              <li id="feeds"><a> <span id=""><i class="fas fa-chart-bar"></i></span> Feeds </a></li>
              <li id="tools"><a> <span id=""><i class="fas fa-users menu-icon"></i></span> Tools</a></li>
              <!-- <li id="sell_pigs"><a> <span id=""><i class="fas fa-users menu-icon"></i></span> Sale information </a></li> -->
              <li id="user_profile"><a> <span id="profiles"><i class="fas fa-user menu-icon"></i></span> Profile</a></li>
        </ul>
      </div>
      <!-- Sidebar -->

      <!-- Page content-->
      <div  id="page-content-wrapper">
        <div class="container-fluid">

          <!-- <div class="row"> -->
            <div class="" style="width: 100%; position: relative;">


              <div class="row"  id="header">
                <div class="col-sm-1 col-md-1">
                    <div     id="menu-toggle">
                       <span id="breadcrump"></span>
                       <span id="breadcrump"></span>
                       <span id="breadcrump"></span>
                    </div>
                </div>

                 <!-- department heading -->
                <div class="col-sm-11 col-md-11 col-lg-11">
                   <center><h1>{{admin_title}}</h1></center>
                </div>
              </div>

              <!-- department heading -->

          </div>
        <!-- </div> -->

          <div class="row" id="production">
            <!-- products view -->



            </div>
        </div>
           </div>
            <!-- statistics pane -->


            </div>
          </div>


   <script src="../../../js/libraries/bootstrap.min.js"></script>
   <script src="../../../js/libraries/jquery-3.3.1.min.js"></script>
   <script src="../../../js/libraries/vue.min.js"></script>
   <script src="../../../CSS/MDB/js/mdb.min.js"></script>

   <script src="../../../CSS/MDB/js/popper.min.js"></script>
   <script src="../../../CSS/Scripts/js/jquery.dataTables.min.js"></script>

   <script src="../../../js/Ajaxloader.js"></script>
   <script src="../../../js/storeKeeper.js"></script>
   <script src="../../../js/vueApp.js"></script>



  </body>
</html>
