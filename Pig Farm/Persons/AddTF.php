<?php  ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<div class="" style="background: #456">

    <div class=""  style="margin-left: 100px; float:left">

      <form class="" action="StoreKeeper.php" method="post">
        <center><h1> Add tools</h1></center>
        <!-- $name=$_POST['name'];
        $quantity=$_POST['quantity'];
        $date_added=$_POST['addition_date'];
        $description=$_POST['description']; -->

        Name:<br>
        <input type="text" name="name"><br><br>
        Quantity:<br>
        <input type="number" name="quantity"><br><br>
        Date:<br>
        <input type="date" name="addition_date"><br><br>
        Description:<br>
        <textarea name="description" rows="8" cols="80">

        </textarea>  <br><br>

        <input type="submit" name="addTool" value="Add tool">

      </form>
    </div>

    <div class=""  style="margin-right: 400px; float:right; background:">

      <form class="" action="StoreKeeper.php" method="post">
        <center><h1> Add feeds</h1></center>

        <!-- $name=$_POST['name'];
        $quantity=$_POST['quantity'];
        $date_added=$_POST['addition_date'];
        $description=$_POST['description']; -->

        Name:<br>
        <input type="text" name="name"><br><br>
        Quantity:<br>
        <input type="number" name="quantity"><br><br>
        Date:<br>
        <input type="date" name="addition_date"><br><br>
        Type:<br>

        <input type="text" name="type">  <br><br>

        <input type="submit" name="addFeed" value="Add tool">

      </form>
    </div>
  </div>


  </body>
</html>
