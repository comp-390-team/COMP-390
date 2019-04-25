
<?php
require 'Inventory.php';

/**
 *
 */
class Tool extends Inventory
{

 public $Description;
 public $Date_of_use;
 public $Quantity_acquired;
 public $Collectors_ID;


  function __construct($name=null, $quantity =null, $date_added =null, $description =null, $date_of_use =null, $quantity_acquired =null, $collectors_ID =null)
  {
    if ($name != null && $quantity != null && $date_added !=null) {
      //initialize base components using constructor
      parent::__construct($name, $quantity, $date_added);

      //assign description
      $this->Description=$description;

      //add to database
        Tool::addItem();
    }

  }

  /**The methods below overides the base class methods

       1.AddItem: This method is used to add a new tool to the database
       2.removeItem: This method/function will be used to delete an item from the SQLiteDatabase
       3.retrieveItem: It is used to view the tools available in the database. it returs a table of the tools in the database
  **/

  public function addItem(){
    //check if the tool already in the database
    $check="SELECT * from PIG_FARM.toos where name=?";

    if (!Tool::itemExists($check, $this->Name)) {
          $query="INSERT INTO PIG_FARM.toos(`Name`,`Quantity`,`Date_added`,`Description`)
          VALUES('$this->Name','$this->Quantity','$this->Date_of_Addition','$this->Description')";

          //add tool to records
          $this->register_item($query,$this->Name, "",  false);
    }else {
      echo "<script>alert('".$this->Name." already exists')</script>";
    }

  }

  public function removeItem(){}

  public function retrieveItems(){}


}

new Tool("Fork Jembe", 5, "2012_10_10"," Used here");
 ?>
