
<?php

       session_start();

require '../Database/DB.php';

  class Login extends DBconnect{



  function __construct($Employee_Id, $User_password ,$check_user,$update){

  if ($User_password !="") {

   if(!$check_user){
     $job_tittle=$this->getJobTittle($Employee_Id);
     $redirect="../Users/Employees/Store Keeper/?id=";

                if ($job_tittle=="Manager")
                      $redirect="../Users/Manager/?id=";
                else if($job_tittle=="Section attendant")
                   $redirect="../Users/Employees/SectionAttendant/?id=";

      $this->login($Employee_Id,$User_password, $redirect);
    }else{
      if (!$update)
          $this->checkValidity($Employee_Id, $User_password);
      else
         $this->updateInfo($Employee_Id, $User_password,"passcode");

    }
  }else{
    // Update either phone or email
    if ($check_user) {
        //update phone data
        $this->updateInfo($Employee_Id, $update,"phone_no");

        // echo $update;

    }else{
      //update email data
      $this->updateInfo($Employee_Id, $update,"email");


    }
  }

     }

     function updateInfo($Employee_Id,$update,$column_name){
       $check="SELECT * FROM employees where ID=?";

       $new_info=$update;

       if ($column_name == "passcode")
       $new_info=password_hash($new_info,PASSWORD_DEFAULT);

       //Query to update the Employee data using id
       $update_query="UPDATE employees SET `$column_name`='$new_info' WHERE ID=?";

       //Call to update function
        $this->updateItem($update_query,$check,$Employee_Id,"Employee");


     }



     function checkValidity($Employee_Id,$User_password){
       $query="SELECT * FROM PIG_FARM.employees where  ID=?";

       $run_query=$this->connect()->prepare($query);
       $run_query->execute([$Employee_Id]);

       if($row = $run_query->fetch(PDO::FETCH_ASSOC)){
         if(password_verify($User_password,$row['passcode']))
         echo json_encode(array("success"=>true));
         else
         echo json_encode(array("success"=>false));

       }
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
           $_SESSION['username']      =$row['f_name']."  ".$row['s_name'];
           $_SESSION['user_id']       =$row['ID'];
           $_SESSION['profile']       =$row['profile_picture'];
           $_SESSION['title']         =$row['job_tittle'];
           $_SESSION['phone_no']      =$row['phone_no'];
           $_SESSION['nationality']   =$row['nationality'];

           $redirect.=str_rot13(base64_encode(gzdeflate($_SESSION['user_id'],9)));

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

         new Login($Employee_Id, $User_password, false, false);
    }else if(isset($_GET['choice'])){

      $Employee_Id=$_GET['check'];

     if ($_GET['choice'] == "password") {
      //handle checking
      if ($_GET['old_P'] != "empty") {
        //check if password is correct
        $User_password=$_GET['old_P'];

        //check user but do not update
        new Login($Employee_Id, $User_password, true,false);

      }else{
        // change the employee password
        $User_password=$_GET['new_P'];

        // Change password but do not login or check if Incorrect
        new Login($Employee_Id, $User_password, true,true);
      }
    }else if ($_GET['choice'] == "phone") {
      $User_ephone=$_GET['user_info'];
      // echo "$User_ephone";

      // change phone number
      new Login($Employee_Id, "", true ,$User_ephone);


    }else if ($_GET['choice'] == "email") {
      $User_email=strtolower($_GET['user_info']);

      // echo "$User_email";

      // change email
      new Login($Employee_Id, "", false , $User_email);

    }


    }

 ?>
