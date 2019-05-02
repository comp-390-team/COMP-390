<?php
require '../Database/DB.php';
require '../inventory/Inventory.php';


require 'person.php';
require '../inventory/Tools.php';
require '../inventory/Feeds.php';

/**
 *
 */
class StoreKeeper
{

  function __construct()
  {
    // code...
  }

  public function updateInvetory()
  {
    // code...
  }

  public function deletetItem($itemId, $category)
  {
    //  delete a tool identified with itemID from the db
    if($category=="tools")
    Tool::deleteItem($itemId);
    else if($category=="feeds")
    Feed::deleteItem($itemId);
  }



   /******Adds a new tool or feed to the databse************/
  public function addNewItem($category)
  {
    //Add tool
    if ($category=="tools") {

      if (isset($_POST['addTool'])) {
             $name=$_POST['name'];
             $quantity=$_POST['quantity'];
             $date_added=$_POST['addition_date'];
             $description_type=$_POST['description'];

             //create an object of tools and add it to the database
                $tool=new Tool($name, $quantity, $date_added ,$description_type);
                $tool->addItem();

      }
      //add feeds
    }else  if ($category=="feeds") {
        if (isset($_POST['addFeed'])) {
             $name=$_POST['name'];
             $quantity=$_POST['quantity'];
             $date_added=$_POST['addition_date'];
             $description_type=$_POST['type'];

             //create an object of feeeds and add it to the database
             $feed=  new Feed($name, $quantity, $date_added ,$description_type);
             $feed->addItem();
         }
    }

  }
}
            $storekeeper=new StoreKeeper;
            if (isset($_POST['addTool']))
                 $storekeeper::addNewItem("tools");
            if (isset($_POST['addFeed']))
                      $storekeeper::addNewItem("feeds");



 ?>
