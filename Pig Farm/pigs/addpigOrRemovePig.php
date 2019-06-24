<?php
session_start();

require '../Database/DB.php';
require 'Pig.php';


if(isset($_GET['pig_id'])){
  //Add  new pig
  $mother_id=$_GET['mother_id'];
  $ID       =$_GET['pig_id'];
  $breed    =$_GET['breed'];
  $weight   =$_GET['weight'];
  $date     =$_GET['day'];
  $gender   =$_GET['gender'];





//add pig
  $pig=new Pig( $ID, $date, $breed, $weight, $gender);
  $pig->addPig($mother_id);

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

    //resets the status of arejected sell request
 }elseif (isset($_GET['updaterejects'])) {
     $ID       =$_GET['updaterejects'];
    $pig->updateRejects($ID);


}elseif (isset($_GET['saleID'])) {
    $ID          =$_GET['saleID'];
    $Customer_Id =$_GET['customer_id'];
   $pig->addSales($ID,$Customer_Id);
 }elseif (isset($_POST['min_age'])){
   $min_age       =$_POST['min_age'];
   $min_weight    =$_POST['min_weight'];
   $sex           =$_POST['sex'];
   $breeds        =$_POST['breeds'];
   $current_age   =$_POST['current_age'];

   $pig->updateSettings($min_age, $min_weight, $sex, $breeds, $current_age);
 }elseif (isset($_POST['add_breed'])){
   $pig->addnewBreed($_POST['add_breed']);
 }elseif (isset($_POST['remove_breed'])){
   $pig->removeBreed($_POST['remove_breed']);
 }

}
?>
