<?php
session_start();

require '../Database/DB.php';
require 'Pig.php';


if(isset($_GET['pig_id'])){
  //Add  new pig
  $ID       =$_GET['pig_id'];
  $breed    =$_GET['breed'];
  $weight   =$_GET['weight'];
  $date     =$_GET['day'];
  $gender   =$_GET['gender'];





//add pig
  $pig=new Pig( $ID, $date, $breed, $weight, $gender);
  $pig->addPig();

}else{

  $pig=new Pig();
  //remove the pig from the database
  if (isset($_GET['id'])){
  $pig->removePig($_GET['id']);

  //Else statement used to update
}elseif (isset($_GET['update_id'])) {

    $ID       =$_GET['update_id'];
    $breed    =$_GET['update_breed'];
    $weight   =$_GET['update_weight'];
    $gender   =$_GET['update_gender'];
    $request  =$_GET['update_request'];


    //id to be used in reanaming the image of the pigs
    $_SESSION['pig_id']=$ID;

   //Call function to update
   $pig->updatePig($breed, $gender, $weight, $request, $ID);

 }elseif (isset($_GET['quote_id'])) {
     $ID      =$_GET['quote_id'];
     $price   =$_GET['quote_price'];
    $pig->addApprovedPig($ID, $price);

 }elseif (isset($_GET['reject_id'])) {
     $ID       =$_GET['reject_id'];
     $remark   =$_GET['remark'];
    $pig->addRejectedPig($ID, $remark);
 }

}
?>
