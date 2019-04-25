<?php
//Extends the file to include the database file
require '../Database/DB.php';


  /**
  * The base class to handle tools and feeds,
  *  Extends class DBConnect which is used to connect to the database
  **/

abstract class Inventory extends DBconnect
{
  //NAme of the item to modify or add
   protected $Name;
   //Quantity to be added
   protected $Quantity;
   //The date of adding the item
   protected $Date_of_Addition;


  function __construct($name, $quantity, $date_of_addition)
  {
     $this->Name=$name;
     $this->Quantity=$quantity;
     $this->Date_of_Addition=$date_of_addition;

  }

  //function is used to add a new Item to the database
   public abstract function addItem();

//used to remove an item from the database e.g when the item is acquired for use.
//incase of feeds and drugs we move the acquired items to an archive showing their use.
//if tools the person who took the item should be recorded against it
  public abstract function removeItem();

//loads table of the inventory from the database
  public abstract function retrieveItems();
}

 ?>
