<?php

  require '../../Database/DB.php';
//This class is meant to handle the customer information
/**
 *
 */
class Customer extends DBconnect
{


  public function addCustomer($ID,$F_Name,$S_Name,$address,$phone_no){
    $check="SELECT * from PIG_FARM.Customer where ID=?";

    //check if the Customer is already added
    if (!($this->itemExists($check,$ID))) {

      // $pass_code=password_hash($ID,PASSWORD_DEFAULT);
      $query="INSERT INTO PIG_FARM.Customer(`ID`,`f_name`,`s_name`,`address`,`phone_no`)
             VALUES('$ID','$F_Name','$S_Name','$address','$phone_no')";

             //add the Customer
             $this->register_item($query, $F_Name."  ".$S_Name,"",false);

    }else {
        echo json_encode(array("success"=>false));
      }

    }

    public function checkCustomer($ID){
      $check="SELECT * from PIG_FARM.Customer where ID=?";
      if (($this->itemExists($check,$ID)))
            $this->getCustomerDetails($ID);
      else
          echo json_encode(array("success"=>false));
    }


    //get customer Details
    public function getCustomerDetails($ID){

      $query="SELECT * FROM  `Customer` where ID='$ID' ";
      $run = $this->connect()->query($query);

      $name='';
      $address='';
      $pgone_no='';
              while ($customer= $run->FETCH())  {
                $name     =$customer['f_name']."  ".$customer['s_name'];
                $address  =$customer['address'];
                $phone_no =$customer['phone_no'];
                $id       =$customer['ID'];

          }
          echo json_encode(array("success"=>true,"name"=>$name,"address"=>$address,"phone_no"=>$phone_no,"id"=>$id));
    }
}

     $customer=new Customer();
     if (isset($_POST["check"]))
     $customer->checkCustomer($_POST["check"]);
     //Add new Customer
     else if(isset($_POST['c_id']))
     $customer->addCustomer($_POST['c_id'],$_POST['c_fname'],$_POST['c_sname'],$_POST['c_address'],$_POST['c_phone']);

     // $customer->checkCustomer("33821021");


?>
