<?php

require '../Database/DB.php';

/**
 *
 */
class Pig extends DBconnect
{
  public $Pig_Id;
  public $Date_farrowed;
  public $Breed;
  public $Weight;
  public $Sex;

  function __construct($Pig_Id, $Date_farrowed, $Breed, $Weight, $Sex)
  {
    $this->Pig_Id=$Pig_Id;
    $this->Date_farrowed=$Date_farrowed;
    $this->Breed=$Breed;
    $this->Weight=$Weight;
    $this->Sex=$Sex;

  }

//Uses the databse class to add a new pig to the database
  public function addPig()
  {
    $check="SELECT * FROM PIG_FARM.pigs where ID=?";
    //check if a feed with the same name is not in the database
          if (!$this->itemExists($check,$this->Pig_Id)) {
            //add new  feed
            $Query="INSERT INTO PIG_FARM.pigs(`ID`,`Date_farrowed`,`Breed`,`Weight`,`Sex`)
            VALUES('$this->Pig_Id','$this->Date_farrowed','$this->Breed','$this->Weight','$this->Sex')";

            //add to the records
            $this->register_item($Query, $this->Pig_Id,"../Users/Employees/SectionAttendant",true);
          }else {
            echo "<script>alert('Pig of ID  ".$this->Pig_Id." already exists')</script>";
           echo "<script>window.open('../Users/Employees/SectionAttendant','_self')</script>";
          }
  }


//Deletes an occurence of a pig from the database
  public function removePig($ID)
  {
    //query if the pig to be removed is realy in the databse
    $check_query="SELECT * FROM PIG_FARM.pigs where ID=?";

    //delete query
    $query="DELETE FROM PIG_FARM.pigs where ID=?";

    //Function to delete pig
    $this->removeItem($query,$check_query,$ID,"Pig");
  }

//returns a table of the pigs in the database
  public function viewPigs()
  {
    // code...
  }


}



    if(isset($_POST['addpig'])){
      $ID       =$_POST['id'];
      $breed    =$_POST['breed'];
      $weight   =$_POST['weight'];
      $date     =$_POST['day'];
      $gender   =$_POST['gender'];

      $pig=new Pig( $ID, $date, $breed, $weight, $gender);
      $pig->addPig();



    }



 ?>
