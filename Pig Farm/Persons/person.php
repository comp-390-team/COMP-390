<?php
require '../Database/DB.php';

 abstract class Person extends DBconnect{
  private  $Name;
  private  $email;
  private  $phone_no;
  private  $job_tittle;
  private  $Employee_Id;

  function __construct(String $Name,String $EMP_ID,String $Email, String $Phone_No, String $Job_tittle){
     $this->Name=$Name;
     $this->email=$Email;
     $this->phone_no=$Phone_No;
     $this->job_tittle=$Job_tittle;
     $this->Employee_Id=$EMP_ID;

     }

     protected  function login(String $Employee_Id,String $User_password){
       $query="SELECT * FROM TAP_FARM.employees where  Emp_ID=?";

       $run_query=$this->connect()->prepare($query);
       $run_query->execute([$Employee_Id]);

   if ($run_query->rowCount()<1){
   echo "<script>alert('Employee Id incorrect')</script>";
   //redirecting user to a new page after an error
   echo "<script>window.open('../','_self')</script>";
   }else{

     if($row = $run_query->fetch(PDO::FETCH_ASSOC)){
//Using password verify we hash the password to compare if it atches to the password stored in the database
       if(!password_verify($this->password,$row['pass_code'])){
      //User enters a wrong password
         echo "<script>alert('Employee ID or Password Incorrect')</script>";
         echo "<script>window.open('../','_self')</script>";
       }
       else{
         //Using global variable SESSION we assing the name to help track the user
           $_SESSION['username']=$row['F_Name']."  ".$row['S_Name'];
           // $_SESSION['image']=$row['Image'];
                          echo "<script>alert('Welcome ".$_SESSION['username']."')</script>";
          //We redirect the user to their page according to their type
        }
      }
    }
  }

}
 ?>
