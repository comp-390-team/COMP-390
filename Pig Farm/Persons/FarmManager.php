<?php
require 'person.php';

/**
 *
 */
class FarmManager extends Person
{

  function __construct()
  {
    // code...
  }

  public function approveSellingOfPigs()
  {
    // code...
  }

  public function hireEmployee($ID,$F_Name,$S_Name,$email,$phone_no,$Job_tittle,$nationali)
  {
    $check="SELECT * from PIG_FARM.employees where ID=?";

   //check if the Employee is already added
    if (!($this->itemExists($check,$ID))) {

      $pass_code=password_hash($ID,PASSWORD_DEFAULT);
      $query="INSERT INTO PIG_FARM.employees(`ID`,`f_name`,`s_name`,`email`,`phone_no`,`job_tittle`,`nationality`,`passcode`)
             VALUES('$ID','$F_Name','$S_Name','$email','$phone_no','$Job_tittle','$nationali','$pass_code')";

             //add the Employee
             $this->register_item($query, $F_Name."  ".$S_Name,"",false);
    }else {
        echo "<script>alert('Employee bearing the ID  ".$ID." already exists')</script>";
                // echo "<script>window.open('../','_self')</script>";
      }
  }


  public function fireEmployee($ID)
  {
    //query of the employee to be removed is realy in the databse
    $check_query="SELECT * FROM PIG_FARM.employees where ID=?";

    //delete query
    $query="DELETE FROM PIG_FARM.employees where ID=?";

    //Function to delete employee
    $this->removeItem($query,$check_query,$ID,"Employee");
    //Add to archive
  }
}

     $manager=new FarmManager();
     $manager->hireEmployee( "EU/1567/20","Ojwang","Opunda","elianto@gmail.com","0700279067","StoreKeeper","Kenyan");
     // $manager->fireEmployee("EU/1567/18");
 ?>
