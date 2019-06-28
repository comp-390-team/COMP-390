
<?php

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

    if (!$this->itemExists($check, $this->Name)) {
          $query="INSERT INTO PIG_FARM.toos(`Name`,`Quantity`,`Date_added`,`Description`)
          VALUES('$this->Name','$this->Quantity','$this->Date_of_Addition','$this->Description')";

          //add tool to records
          $this->register_item($query,$this->Name, "../Persons/AddTF.php",  true);
    }else {
      echo "<script>alert('".$this->Name." already exists')</script>";
      echo "<script>window.open('../Persons/AddTF.php','_self')</script>";

    }

  }


  public function handTool($name, $quantity, $newQuantity, $employee_ID){
          $date_Picked  =date('Y-m-d');
          $time_picked  =time();


          $query="INSERT INTO PIG_FARM.tools_picked(`Name`,`Quantity`,`EmployeeID`,`datePicked`,`return_status`,`timePicked`)
                  VALUES('$name','$quantity','$employee_ID','$date_Picked','U','$time_picked')";

          //add tool to records
          $this->register_item($query,$this->Name, "",  false);



          //update the tools quantity
          $check="SELECT * FROM PIG_FARM.toos where Name=?";

          $update_query="UPDATE toos SET Quantity=$newQuantity WHERE Name=?";

          $this->updateItem($update_query,$check,$name,false);

  }


  public function returnTool($name, $quantity, $remark ,$employee_id, $date_picked){

    $query="SELECT toos.Quantity FROM toos  where Name='$name' ";
    $run = $this->connect()->query($query);

    while ($pig = $run->FETCH())  { $quantity+=$pig['Quantity'];  }

    //update the tools quantity
    $check="SELECT * FROM PIG_FARM.toos where Name=?";

    $update_query="UPDATE toos SET Quantity=$quantity WHERE Name=?";

    $this->updateItem($update_query,$check,$name,false);


    //update the tools picked
    $date_returned  =date('Y-m-d');

    $update_query="UPDATE tools_picked SET dateReturned='$date_returned',remark='$remark', return_status='R'
                   WHERE Name=? and datePicked='$date_picked' and EmployeeID='$employee_id'";

    $this->updateItem($update_query,$check,$name,true);

  }



  public function deleteItem($name){
    //query of the feed to be removed is realy in the databse
    $check_query="SELECT * FROM PIG_FARM.toos where Name=?";

    //delete query
    $query="DELETE FROM PIG_FARM.toos where Name=?";

    //Function to delete feed
    $this->removeItem($query,$check_query,$name,"Tools");
  }

  public function retrieveItems(){

    $query="SELECT * FROM toos";
    $run = $this->connect()->query($query);
            while ($pig = $run->FETCH())
        {
              $name=$pig['Name'];
              $quantity=$pig['Quantity'];
              $description=$pig['Description'];

              $id=str_replace(" ","",$name);

              ?>
              <tr   id='<?php echo "t_".$name ?>'>
                <td id='<?php echo "t_".$name."_n"; ?>'><?php echo $name; ?></td>

                <td>
                  <span id='<?php echo "t_".$id."_q"; ?>'><?php echo $quantity ?></span>
                  <div class="md-form"  >
                    <input id="update_<?php echo $id ?>"  type="Number" class="form-control   tools" name="" value="" style="width: 100%; height: 100%; margin: 0; padding:0">

                  </div>

                </td>

                <td id='<?php echo "t_".$name."_d" ?>'><?php echo $description; ?></td>

                <td>
                  <button id="updatebtn_<?php echo $id ?>"
                          class="btn btn-success btn-sm" type="button" name="button" onclick='updateFeed(<?php echo "\"$id\",\"t\"" ?>)'>update
                  </button>
               </td>


                <td> <button class="btn btn-success btn-sm" type="button" name="button" onclick='showToolDetails(<?php echo "\"$name\"" ?>)'>hand out</button> </td>
                <td> <button class="btn btn-danger  btn-sm" type="button" name="button" onclick='deleteTool(<?php echo "\"$name\"" ?>)'>delete</button> </td>
              </tr>


   <?php
        }

  }

  public function retrieveItemsInUSe(){
// return status='U' means the tool is in use


    $query="SELECT tools_picked.*,employees.f_name,employees.s_name FROM tools_picked,employees
           WHERE employees.ID=tools_picked.EmployeeID and return_status ='U' ";
    $run = $this->connect()->query($query);
            while ($pig = $run->FETCH()){
              $name=$pig['Name'];
              $quantity=$pig['Quantity'];
              $employee_ID=$pig['EmployeeID'];
              $date_Picked=$pig['datePicked'];


              $employee_name=$pig['f_name']."  ".$pig['s_name'];


              ?>
              <tr   id='<?php echo "t_".$name ?>'>
                <td id='<?php echo "t_".$name."_n"; ?>'><?php echo $name; ?></td>
                <td id='<?php echo "t_".$name."_q" ?>'><?php  echo $quantity; ?></td>
                <td id='<?php echo "emp_".$name."_id" ?>'><?php  echo $employee_ID; ?></td>
                <td id='<?php echo "emp_".$name."_name" ?>'><?php  echo $employee_name; ?></td>



                <td> <button class="btn btn-success btn-sm" type="button" name="button" onclick='showToolInUse(<?php echo "\"$name\",\"$date_Picked\"" ?>)'>Details</button> </td>
              </tr>

   <?php
        }

  }



  public function updateTool($name, $newQuantity){

          //update the tools quantity
          $check="SELECT * FROM PIG_FARM.toos where Name=?";

          $update_query="UPDATE toos SET Quantity=$newQuantity WHERE Name=?";

          $this->updateItem($update_query,$check,$name,true);

  }


}
 ?>
