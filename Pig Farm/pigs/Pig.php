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
    // code...
  }

//Deletes an occurence of a pig from the database
  public function removePig()
  {
    // code...
  }

//returns a table of the pigs in the database
  public function viewPigs()
  {
    // code...
  }

}

 ?>
