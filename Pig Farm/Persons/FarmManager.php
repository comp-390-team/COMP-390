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
             $this->register_item($query, $F_Name."  ".$S_Name,"../Users/Manager",true);
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

  //update the records of an employee
  public function updateEmployee($phone_no, $job_tittle, $nationality, $ID){
    $check="SELECT * FROM employees where ID=?";

    //Query to update the Employee data using id
    $update_query="UPDATE employees SET phone_no='$phone_no', job_tittle='$job_tittle', nationality='$nationality' WHERE ID=?";

    //Call to update function
     $this->updateItem($update_query,$check,$ID,"Employee");
  }


  public function viewEmployees()
  {
    $query="SELECT * FROM PIG_FARM.employees";
    $run = $this->connect()->query($query);
            while ($employee = $run->FETCH())
        {
              $id=$employee['ID'];
              $Name=$employee['f_name']."  ".$employee['s_name'];
              $No=$employee['phone_no'];
              $tittle=$employee['job_tittle'];
              $Nationality=$employee['nationality'];

              $phone_id  =str_replace("/","_",$id."_phone");
              $tittle_id =str_replace("/","_",$id."_tittle");
              $nation_id =str_replace("/","_",$id."_nation");


          echo
                "
              <tr id='$id'>
                <td>".$id."</td>
                <td>".$Name."</td>
                <td id='$phone_id'>".$No."</td>
                <td id='$tittle_id'>".$tittle."</td>
                <td id='$nation_id'>".$Nationality."</td>

                <td><button class='btn btn-success btn-sm' onclick='editEmployee(\"$id\",\"$Name\",\"$No\",\"$tittle\",\"$Nationality\")'>update</button></td>
                <td>
                <form for='name'>
                  <input type='text' name='id' value='$id' hidden>
                  <button type='button' class='btn btn-danger btn-sm'  onclick='deleteEmployee(\"$id\")'>DELETE</button>
                 </form>
                </td>
             </tr>
                ";
        }

  }
}

     // $manager=new FarmManager();
     // $manager->hireEmployee( "EU/1567/20","Ojwang","Opunda","elianto@gmail.com","0700279067","StoreKeeper","Kenyan");
     // $manager->fireEmployee("EU/1567/18");
 ?>
