<?php

 abstract class Person{
  private  $Name;
  private  $email;
  private  $phone_no;
  private  $job_tittle;

  function __construct(String $Name,String $EMP_ID,String $Email, String $Phone_No, String $Job_tittle){
     $this->Name=$Name;
     $this->email=$Email;
     $this->phone_no=$Phone_No;
     $this->$job_tittle=$Job_tittle;

     }

     protected function login(String $Employee_Id,String $User_password){}

}
 ?>
