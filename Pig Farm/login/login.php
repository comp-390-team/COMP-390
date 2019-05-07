
<?php

       session_start();

require '../Database/DB.php';

  class Login extends DBconnect{



  function __construct($Employee_Id, $User_password){

     $job_tittle=$this->getJobTittle($Employee_Id);



     $redirect="../Users/Employees/StoreKeeper/";

                if ($job_tittle=="Manager")
                      $redirect="../Users/Manager/";
                else if($job_tittle=="Section attendant")
                   $redirect="../Users/Employees/SectionAttendant/";



      $this->login($Employee_Id,$User_password, $redirect);

     }



    function login($Employee_Id, $User_password, $redirect){

       $query="SELECT * FROM PIG_FARM.employees where  ID=?";

       $run_query=$this->connect()->prepare($query);
       $run_query->execute([$Employee_Id]);

          if ($run_query->rowCount()<1){
            echo "<script>alert('Employee Id incorrect')</script>";
               //redirecting user to a new page after an error
            echo "<script>window.open('../','_self')</script>";
        }else{

     if($row = $run_query->fetch(PDO::FETCH_ASSOC)){
                  //Using password verify we hash the password to compare if it atches to the password stored in the database
       if(!password_verify($User_password,$row['passcode'])){
                  //User enters a wrong password
         echo "<script>alert('Employee ID or Password Incorrect')</script>";
         echo "<script>window.open('../','_self')</script>";
       }
       else{
             //Using global variable SESSION we assing the name to help track the user
           $_SESSION['username']=$row['f_name']."  ".$row['s_name'];
           $_SESSION['name']=$row['f_name'];
             // $_SESSION['image']=$row['Image'];
          echo "<script>alert('Welcome ".$_SESSION['username']."')</script>";
          echo "<script>window.open('$redirect','_self')</script>";
        }
      }
    }
  }


        public function getJobTittle($ID){
          $checkDb="SELECT job_tittle FROM PIG_FARM.employees WHERE ID=?";

          if ($this->itemExists($checkDb, $ID)){

            $run_query=$this->connect()->prepare($checkDb);
            $run_query->execute([$ID]);


          if($row = $run_query->fetch(PDO::FETCH_ASSOC))
                 return $row['job_tittle'];
        }else{
          echo "<script>alert('Customer with ".$ID." does not exist')</script>";

        }
        }



}


                  if (isset($_POST['login'])) {


                     $Employee_Id=$_POST['id'];
                     $User_password=$_POST['pass_code'];

                     new Login($Employee_Id, $User_password);
                  }

 ?>
