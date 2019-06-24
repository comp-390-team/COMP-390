<?php
    // require 'Inventory.php';
/**
 *
 */

class Feed extends Inventory
{
  public $type;
  public $date_of_use;
  public $quantity_acquired;
  public $collectors_Employee_ID;


//declare the deafault values to null to enable method overloading
  function __construct($name=null, $quantity=null, $date_of_addition=null, $type=null, $date_of_use=null,$quantity_acquired=null, $employee_ID=null)
  {
       //assign the values for the feed
        if ($name !=null && $quantity !=null && $date_of_addition !=null && $type !=null){

             //assign the values of the parent
             parent::__construct($name,  $quantity, $date_of_addition);
             //assign type of feed
             $this->type=$type;

             Feed::addItem();
        }

      //we will be able to archive the feed if $date_of_use, $quantity_acquired and Employee_Id is assigned
        if ($date_of_use !=null && $quantity_acquired !=null && $employee_ID !=null) {
               $this->date_of_use=$date_of_use;
               $this->quantity_acquired=$quantity_acquired;
               $this->collectors_Employee_ID=$employee_ID;
             }


  }


  /**The methods below overides the base class methods

       1.AddItem: This method is used to add a new tool to the database
       2.removeItem: This method/function will be used to delete an item from the SQLiteDatabase
       3.retrieveItem: It is used to view the tools available in the database. it returs a table of the tools in the database
  **/

//Overidden parent method
  public function addItem(){
    // Insert query
    $check="SELECT * FROM PIG_FARM.feed where name=?";
    //check if a feed with the same name is not in the database
          if (!($this->itemExists($check,$this->Name))) {
            //add new  feed
            $Query="INSERT INTO PIG_FARM.feed(`Name`,`Quantity`,`date_added`,`type`)
            VALUES('$this->Name','$this->Quantity','$this->Date_of_Addition','$this->type')";

            //add to the records
            $this->register_item($Query, $this->Name,"",false);

          }else {
            echo "<script>alert('".$this->Name." already exists')</script>";
          }


  }

  public function deleteItem($name){

    //query of the feed to be removed is realy in the databse
    $check_query="SELECT * FROM PIG_FARM.feed where Name=?";

    //delete query
    $query="DELETE FROM PIG_FARM.feed where Name=?";

    //Function to delete feed
    $this->removeItem($query,$check_query,$name,"Feed");

  }


    public function retrieveItems(){

      $query="SELECT * FROM feed";
      $run = $this->connect()->query($query);
              while ($pig = $run->FETCH())
          {
                $name=$pig['Name'];
                $quantity=$pig['Quantity'];
                $type=$pig['type'];
                ?>

                <tr   id='<?php echo "f_".$name ?>'>
                  <td id='<?php echo "f_".$name."_n"; ?>'><?php echo $name ?></td>
                  <td id='<?php echo "f_".$name."_q"; ?>'><?php echo $quantity ?></td>
                  <td id='<?php echo "f_".$name."_t"; ?>'><?php echo $type ?></td>

                  <td> <button class="btn btn-success btn-sm" type="button" name="button" onclick='showFeedDetails(<?php echo "\"$name\"" ?>)'>hand out</button> </td>
                  <td> <button class="btn btn-danger  btn-sm" type="button" name="button" onclick='deleteFeed(<?php echo "\"$name\"" ?>)'>delete</button> </td>
                </tr>

                <?php

          }

    }


}

 ?>
