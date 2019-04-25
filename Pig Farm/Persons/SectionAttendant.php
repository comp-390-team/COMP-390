<?php

require 'person.php';

class SectionAttendant extends Person{

   public function __construct(){
     $this->connect();

   }
  public function declarePigSelling(){}
  public function updateRecords(){
    $this->connect();
  }

}

new SectionAttendant;
 ?>
