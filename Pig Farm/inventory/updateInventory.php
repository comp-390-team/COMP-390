<?php
require '../Database/DB.php';
require 'Inventory.php';
require 'Tools.php';
require 'Feeds.php';


if (isset($_POST['tool_name'])) {
      $name        =$_POST['tool_name'];
      $quantity    =$_POST['tool_quantity'];
      $description =$_POST['tool_description'];
      $date_added  =date('Y-m-d');

      new Tool($name, $quantity,$date_added, $description);
}elseif (isset($_POST['feed_name'])) {

  $name        =$_POST['feed_name'];
  $quantity    =$_POST['feed_quantity'];
  $type =$_POST['feed_type'];
  $date_added  =date('Y-m-d');

  new Feed($name, $quantity,$date_added, $type);
}
elseif (isset($_POST['delete_feed'])) {

  $name        =$_POST['delete_feed'];

  $feed=new Feed();
  $feed->deleteItem($name);
}
elseif (isset($_POST['delete_tool'])) {

  $name        =$_POST['delete_tool'];

  $feed=new Tool();
  $feed->deleteItem($name);
}elseif (isset($_POST['hand_tool'])) {

  $name        =$_POST['hand_tool'];
  $quantity    =$_POST['quantity'];
  $newQuantity =$_POST['newQuantity'];
  $employee_ID =$_POST['employee_id'];


  $feed=new Tool();
  $feed->handTool($name, $quantity,$newQuantity, $employee_ID);

}elseif (isset($_POST['return_tool'])) {

  $name          =$_POST['return_tool'];
  $quantity      =$_POST['quantity'];
  $remark        =$_POST['remark'];
  $employee_id   =$_POST['employee_id'];
  $date_picked   =$_POST['date_picked'];


  $feed=new Tool();
  $feed-> returnTool($name, $quantity, $remark ,$employee_id, $date_picked);
}

 ?>
