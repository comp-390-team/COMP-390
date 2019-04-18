
<?php
require 'Invetory.php';

/**
 *
 */
class Tools extends Invetory
{

 public $Description;
 public $date_of_use;
 public $quantity_acquired;
 public $collectors_Employee_ID;


  function __construct()
  {
    // code...
  }

  /**The methods below overides the base class methods

       1.AddItem: This method is used to add a new tool to the database
       2.removeItem: This method/function will be used to delete an item from the SQLiteDatabase
       3.retrieveItem: It is used to view the tools available in the database. it returs a table of the tools in the database
  **/


}

 ?>
