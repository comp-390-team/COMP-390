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

                $id=str_replace(" ","",$name);
                ?>

                <tr   id='<?php echo "f_".$id ?>'>
                  <td id='<?php echo "f_".$id."_n"; ?>'><?php echo $name ?></td>
                  <td>
                    <span id='<?php echo "f_".$id."_q"; ?>'><?php echo $quantity ?></span>
                    <div class="md-form"  >
                      <input id="update_<?php echo $id ?>"  type="Number" class="form-control   feeds" name="" value="" style="width: 100%; height: 100%; margin: 0; padding:0">

                    </div>
                   </td>
                  <td id='<?php echo "f_".$id."_t"; ?>'><?php echo $type ?></td>

                  <td>
                    <button id="updatebtn_<?php echo $id ?>"
                            class="btn btn-success btn-sm" type="button" name="button" onclick='updateFeed(<?php echo "\"$id\",\"f\"" ?>)'>update
                    </button>
                 </td>

                  <td> <button       class="btn btn-success btn-sm" type="button" name="button" onclick='showFeedDetails(<?php echo "\"$id\"" ?>)'>hand out</button> </td>
                  <td> <button       class="btn btn-danger  btn-sm" type="button" name="button" onclick='deleteFeed(<?php echo "\"$name\"" ?>)'>delete</button> </td>
                </tr>

                <?php

          }

    }



    public function retrieveFeedsUsed(){

      $query="SELECT * FROM feeds_used";
      $run = $this->connect()->query($query);
              while ($feed = $run->FETCH())
          {
                $name=$feed['Name'];
                $quantity=$feed['Quantity'];
                $id=$feed['EmployeeID'];
                $date=$feed['datePicked'];


                ?>
               <tr>
                 <td><?php echo $name ?></td>
                 <td><?php echo $quantity?></td>
                 <td><?php echo $id ?></td>
                 <td><?php echo $date ?></td>
               </tr>

                <?php

          }

    }


    public function handFeed($name, $quantity, $newQuantity, $employee_ID){
            $date_Picked  =date('Y-m-d');


            $query="INSERT INTO PIG_FARM.feeds_used(`Name`,`Quantity`,`EmployeeID`,`datePicked`)
                    VALUES('$name','$quantity','$employee_ID','$date_Picked')";

            //add tool to records
            $this->register_item($query,$name, "",  false);



            //update the tools quantity
            $check="SELECT * FROM PIG_FARM.feed where Name=?";

            $update_query="UPDATE feed SET Quantity=$newQuantity WHERE Name=?";

            $this->updateItem($update_query,$check,$name,false);

    }

    public function updateFeed($name, $newQuantity){

            //update the tools quantity
            $check="SELECT * FROM PIG_FARM.feed where Name=?";

            $update_query="UPDATE feed SET Quantity=$newQuantity WHERE Name=?";

            $this->updateItem($update_query,$check,$name,true);

    }


}

 ?>
