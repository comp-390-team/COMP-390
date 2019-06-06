<?php
require '../Database/DB.php';
// require 'person.php';
require 'FarmManager.php';

$manager=new FarmManager();



if(isset($_POST['addpig'])){
  //Get employee data
  $ID      =$_POST['id'];
  $f_name  =$_POST['first_name'];
  $s_name  =$_POST['second_name'];
  $email   =$_POST['email'];
  $phone   =$_POST['phone'];
  $tittle  =$_POST['tittle'];
  $nationality   =$_POST['nationality'];

 //insert the employee to the database
  $manager->hireEmployee( $ID, $f_name,$s_name,$email,$phone,$tittle,$nationality);

}elseif (isset($_GET['delete_id'])){
      //Remove employee from database
    $manager->fireEmployee($_GET['delete_id']);

}elseif (isset($_GET['update_id'])) {
     //if statement used to update employee data
     $phone_no     =$_GET['phone_no'];
     $job_tittle   =$_GET['job_tittle'];
     $nationality  =$_GET['nationality'];
     $ID           =$_GET['update_id'];

     //update date
     $manager->updateEmployee($phone_no, $job_tittle, $nationality, $ID);
}



 ?>
