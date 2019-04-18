<?php
/**
 *
 */
abstract class Invetory
{
   private $Name;
   private $Quantity;
   private $Date_of_Addition;


  function __construct($name, $quantity, $date_of_addition)
  {
    $this->Name=$name;
    $this->Quantity=$quantity;
    $this->Date_of_Addition=$Date_of_Addition;

  }

  public function addItem()
  {
    // code...
  }

  public function removeItem()
  {
    // code...
  }

  public function retrieveItems()
  {
    // code...
  }
}

 ?>
