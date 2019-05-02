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
                     <span style="color: green">Title :</span>Manager </p>
          </div>
        </div>
        <ul class="sidebar-nav">
              <li id="products_analysis"><a> <span id="menu-icon"><i class="fas fa-chart-bar"></i></span>  Productions</a></li>
              <li id="employees"><a> <span id="menu-icon"><i class="fas fa-users menu-icon"></i></span>  Employees</a></li>
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
                <!-- department heading -->

              </div>

              <div class="row" id="production">
                <div class="col-sm-12 col-md-6" id="milking_cow">

                  <div class="col-md-12">
                    <center>
                      <h3>Production  Data</h3>
                    </center>

                    <!-- <div class="table-responsive">
                      <?php /**$product->viewEmployees() ;*/?>
                    </div> -->

                   </div>

                   <div class="col-md-12" id="table">
                     <center>
                       <h3>Cows producing milk</h3>
                     </center>
                     <div class="table-responsive">
                       <?php /*$product->loadDairy(); */?>
                     </div>
                    </div>

                </div>
                <!-- products view -->


               <!-- statistics pane -->
                <div class="col-sm-12 col-md-5  offset-md-1" id="statistics">
                  <div class="card">
                      <h3 class="card-header" id="monthAndYear"></h3>
                      <table class="table table-bordered table-responsive-sm" id="calendar">
                          <thead>
                          <tr>
                              <th>Sun</th>
                              <th>Mon</th>
                              <th>Tue</th>
                              <th>Wed</th>
                              <th>Thu</th>
                              <th>Fri</th>
                              <th>Sat</th>
                          </tr>
                          </thead>

                          <tbody id="calendar-body">

                          </tbody>
                      </table>

                      <div class="form-inline">

                          <button class="btn btn-outline-primary col-sm-6" id="previous" onclick="previous()">Previous</button>

                          <button class="btn btn-outline-primary col-sm-6" id="next" onclick="next()">Next</button>
                      </div>
                      <br/>
                      <form class="form-inline">
                          <label class="lead mr-2 ml-2" for="month">Jump To: </label>
                          <select class="form-control col-sm-4" name="month" id="month" onchange="jump()">
                              <option value=0>Jan</option>
                              <option value=1>Feb</option>
                              <option value=2>Mar</option>
                              <option value=3>Apr</option>
                              <option value=4>May</option>
                              <option value=5>Jun</option>
                              <option value=6>Jul</option>
                              <option value=7>Aug</option>
                              <option value=8>Sep</option>
                              <option value=9>Oct</option>
                              <option value=10>Nov</option>
                              <option value=11>Dec</option>
                          </select>


                          <label for="year"></label><select class="form-control col-sm-4" name="year" id="year" onchange="jump()">
                          <option value=1990>1990</option>
                          <option value=1991>1991</option>
                          <option value=1992>1992</option>
                          <option value=1993>1993</option>
                          <option value=1994>1994</option>
                          <option value=1995>1995</option>
                          <option value=1996>1996</option>
                          <option value=1997>1997</option>
                          <option value=1998>1998</option>
                          <option value=1999>1999</option>
                          <option value=2000>2000</option>
                          <option value=2001>2001</option>
                          <option value=2002>2002</option>
                          <option value=2003>2003</option>
                          <option value=2004>2004</option>
                          <option value=2005>2005</option>
                          <option value=2006>2006</option>
                          <option value=2007>2007</option>
                          <option value=2008>2008</option>
                          <option value=2009>2009</option>
                          <option value=2010>2010</option>
                          <option value=2011>2011</option>
                          <option value=2012>2012</option>
                          <option value=2013>2013</option>
                          <option value=2014>2014</option>
                          <option value=2015>2015</option>
                          <option value=2016>2016</option>
                          <option value=2017>2017</option>
                          <option value=2018>2018</option>
                          <option value=2019>2019</option>
                          <option value=2020>2020</option>
                          <option value=2021>2021</option>
                          <option value=2022>2022</option>
                          <option value=2023>2023</option>
                          <option value=2024>2024</option>
                          <option value=2025>2025</option>
                          <option value=2026>2026</option>
                          <option value=2027>2027</option>
                          <option value=2028>2028</option>
                          <option value=2029>2029</option>
                          <option value=2030>2030</option>
                      </select></form>
                  </div>


                </div>
                <!-- statistics pane -->

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
