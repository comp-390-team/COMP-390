<?php
// include '../../includes/DB_Connect.php';
// include '../../Cows/viewproduction.php';
// $product=new ViewData();

        session_start();

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="twitter:" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../../../CSS/style.css">
    <!-- <link rel="stylesheet" href="../../CSS/tableStylying.css"> -->

    <link rel="stylesheet" href="../../../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../../../CSS/MDB/css/mdb.min.css">
    <link rel="stylesheet" href="../../../CSS/MDB/css/mdb.css">
    <link rel="stylesheet" href="../../../CSS/MDB/css/style.css">



      <link rel="stylesheet" type="text/css" href="../../../CSS/MDB/css/mdb.style.min.css">
      <link rel="stylesheet" type="text/css" href="../../../CSS/Scripts/css/jquery.dataTables.min.css">





    <script src="../../../js/libraries/bootstrap.min.js"></script>
    <script src="../../../js/libraries/jquery-3.3.1.min.js"></script>
    <script src="../../../js/libraries/vue.min.js"></script>
    <script type="../../../../CSS/MDB/js/mdb.min.js"></script>

    <script type="../../../CSS/MDB/js/popper.min.js"></script>
    <script src="../../../CSS/Scripts/js/jquery.dataTables.min.js"></script>


    <!-- Table sorter Javascript file -->
    <script src="../../js/sorttables.js"></script>
    <!-- TableSorter -->


    <title>Admin</title>
  </head>
  <body>
   <div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
        <div class="row">
          <div id="profile">
              <center><img src="pig.JPG" alt=""></center>
                  <p><span style="color: green">Name:</span> <?php echo $_SESSION['username'] ?> <br>
                     <span style="color: green">Title :</span>Section Attendant </p>
          </div>
        </div>
        <ul class="sidebar-nav">
              <li id="add_pig"><a> <span id="add_pig"><i class="fas fa-chart-bar"></i></span> Pig </a></li>
              <li id="update_records"><a> <span id="update_pig"><i class="fas fa-users menu-icon"></i></span>  Update_Records</a></li>
              <li id="settings"><a> <span id="menu-icon"><i class="fas fa-cog menu-icon"></i></span>  Settings</a></li>
              <li id="user_profile"><a> <span id="profiles"><i class="fas fa-user menu-icon"></i></span> Profile</a></li>
        </ul>
      </div>
      <!-- Sidebar -->

      <!-- Page content-->
      <div  id="page-content-wrapper">
        <div class="container-fluid">

          <div class="row">
            <div class="col-lg-12">


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
        </div>

          <div class="row" id="production">
            <!-- products view -->


       <!--/.Card-->

    <!-- </div> -->
            </div>
           </div>
            <!-- statistics pane -->


            </div>
          </div>
        </div>
      </div>
      <!-- Page content-->

   </div>

   <script src="../../../js/Ajaxloader.js"></script>
   <script src="../../../js/vueApp.js"></script>

  </body>
</html>