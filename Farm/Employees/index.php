<?php
include '../../includes/DB_Connect.php';
include '../../Cows/viewproduction.php';
$product=new ViewData();
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="twitter:" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../../CSS/style.css">
    <link rel="stylesheet" href="../../CSS/tableStylying.css">

    <link rel="stylesheet" href="../../CSS/bootstrap.min.css">


<!--
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

    <script src="../../js/library/bootstrap.min.js"></script>
    <script src="../../js/library/jquery-3.3.1.min.js"></script>
    <script src="../../js/library/vue.min.js"></script>



    <!-- Table sorter Javascript file -->
    <script src="../../js/sorttables.js"></script>
    <!-- TableSorter -->
    <script src="../../js/calendar.js"></script>



    <title>Admin</title>
  </head>
  <body>
   <div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
        <div class="row">
          <div id="profile">
              <center><img src="dave.jpg" alt=""></center>
                  <p><span style="color: green">Name:</span> Otieno David Odinga <br>
                     <span style="color: green">Title :</span>Farm attendant </p>
          </div>
        </div>
        <ul class="sidebar-nav">
              <li id="new_record"><a> <span id="menu-icon"><i class="fas fa-chart-bar"></i></span>  New Record</a></li>
              <li id="records"><a> <span id="menu-icon"><i class="fas fa-users menu-icon"></i></span>  Records</a></li>
              <li id="user_profile"><a> <span id="menu-icon"><i class="fas fa-user menu-icon"></i></span> Profile</a></li>
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
                <!-- department heading -->

              </div>

              <div class="row" id="production">

              </div>

            </div>
          </div>
        </div>
      </div>
      <!-- Page content-->

   </div>

   <script src="../../js/Ajaxloader.js"></script>
   <script src="../../js/vueApp.js"></script>
   <script src="../../js/calendar.js"></script>

     </body>
</html>
