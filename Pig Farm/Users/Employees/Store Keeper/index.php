<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="twitter:" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

      <?php require '../../includes/commonFiles/header.html';
        $details=explode(",",gzinflate(base64_decode(str_rot13($_GET['m']))));

      ?>


  </head>
  <body>
   <div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
        <?php require '../../includes/commonFiles/employeeInfo.php'; ?>

        <ul class="sidebar-nav">
              <li id="feeds"><a> <span id=""><i class="fas fa-chart-bar"></i></span> Feeds </a></li>
              <li id="tools"><a> <span id=""><i class="fas fa-users menu-icon"></i></span> Tools</a></li>
              <!-- <li id="store_report"><a> <span id="profiles"><i class="fas fa-user menu-icon"></i></span> Reports</a></li> -->
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

          <?php require '../../includes/commonFiles/bottomjs.html'; ?>




  </body>
</html>
