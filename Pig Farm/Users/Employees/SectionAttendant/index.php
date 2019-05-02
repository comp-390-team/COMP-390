<?php
// include '../../includes/DB_Connect.php';
// include '../../Cows/viewproduction.php';
// $product=new ViewData();
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


<!--
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

    <script src="../../../js/libraries/bootstrap.min.js"></script>
    <script src="../../../js/libraries/jquery-3.3.1.min.js"></script>
    <script src="../../../js/libraries/vue.min.js"></script>



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
                  <p><span style="color: green">Name:</span> PIGFARM <br>
                     <span style="color: green">Title :</span>Section Attendant </p>
          </div>
        </div>
        <ul class="sidebar-nav">
              <li id="addPigs"><a> <span id="menu-icon"><i class="fas fa-chart-bar"></i></span> Pig </a></li>
              <li id="update pigs records"><a> <span id="menu-icon"><i class="fas fa-users menu-icon"></i></span>  Update_Records</a></li>
              <li id="settings"><a> <span id="menu-icon"><i class="fas fa-cog menu-icon"></i></span>  Settings</a></li>
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
              </div>

              <!-- department heading -->

          </div>

          <div class="row" id="production">
            <!-- products view -->

       <!--Card-->
       <div class="card">
         <!--Card content-->
         <div class="card-body">

           <!-- Form -->
           <form name="" method="post" action="../../../pigs/Pig.php">
             <!-- Heading -->
             <h3 class="dark-grey-text text-center">
               <strong>Add Pig:</strong>
             </h3>
             <hr>

             <div class="md-form">
               <i class="fas fa-user prefix grey-text"></i>
               <input type="text" id="form3" class="form-control"  name="id">
               <label for="form3">Pig ID</label>
             </div>
             <div class="md-form">
               <i class="fas fa-envelope prefix grey-text"></i>
               <input type="number" id="form2" class="form-control"   name="weight">
               <label for="form2">Weight</label>
             </div>

             <div class="md-form">
               <i class="fas fa-envelope prefix grey-text"></i>
               <input type="text" id="form2" class="form-control"   name="gender">
               <label for="form2">Sex</label>
             </div>
             <div class="md-form">
               <i class="fas fa-envelope prefix grey-text"></i>
               <input type="text" id="form2" class="form-control"    name="breed">
               <label for="form2">Breed</label>
             </div>

             <div class="md-form">
               <i class="far  fa-calendar-alt prefix grey-text"></i>
               <input type="date" id="form2" class="form-control"       name="day">
             </div>

             <div class="text-center">
               <button class="btn btn-indigo" name="addpig">Add New Pig</button>
             </div>

           </form>
           <!-- Form -->
         </div>
       </div>
       <!--/.Card-->



            </div>
            <!-- statistics pane -->

          </div>



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
