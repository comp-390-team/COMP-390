<?php

require '../../Database/DB.php';
require '../../pigs/Pig.php';
$pig=new  Pig();

$from       =$_GET['from'];
$to         =$_GET['to'];
$min_weight =$_GET['min_weight'];
$max_weight =$_GET['max_weight'];
$breed      =$_GET['breed'];
$sex        =$_GET['sex'];
$choice     =$_GET['choice'];

$min_weight=$min_weight == ''?0:$min_weight;
$max_weight=$max_weight == ''?0:$max_weight;

$breed=str_replace("_"," ",$breed);

$query="";

  if ($sex == 'all' && $breed == 'all')
    $query="SELECT * FROM `pigs` where      sell_request='N'  and     deleteStatus !='D'   and
            Weight               between    $min_weight       and     $max_weight          and
            Date_farrowed        BETWEEN   '$from'            and    '$to'";
   if($sex !='all')
    $query="SELECT * FROM `pigs` where      sell_request='N'  and     deleteStatus !='D'   and
            Weight               between    $min_weight       and     $max_weight          and
            Date_farrowed        BETWEEN   '$from'            and    '$to'                 and
            Sex='$sex'";
  if ($breed !='all')
    $query="SELECT * FROM `pigs` where      sell_request='N'  and     deleteStatus !='D'   and
            Weight               between    $min_weight       and     $max_weight          and
            Date_farrowed        BETWEEN   '$from'            and    '$to'                 and
            Breed='$breed'";
  if ($sex != 'all' && $breed != 'all')
    $query="SELECT * FROM `pigs` where      sell_request='N'  and     deleteStatus !='D'   and
            Weight               between     $min_weight      and     $max_weight          and
            Date_farrowed        BETWEEN    '$from'           and    '$to'                 and
            Breed='$breed'       and
            Sex='$sex'";


if ($choice == "viewAll")
      $pig->viewPigs($_GET['type'],true,$query);
if ($choice == "pigsdata" )
      $pig->viewPigData(true,$query);
if ($choice == "pigSell" ){
     $query=str_replace("sell_request='N' and"," ",$query);
     $pig->viewPigsToBeSold(true, $query);
   }
if($choice == "rejected"){
   $query=str_replace("SELECT * FROM `pigs` where      sell_request='N'  and     deleteStatus !='D" ,"  ",$query);
    $pig->rejectedForSale(true, $query);
}
if($choice == "accepted"){
   $query=str_replace("SELECT * FROM `pigs` where      sell_request='N'  and     deleteStatus !='D'" ,"  ",$query);
    $pig->acceptedForSale(true, $query);
}

if($choice == "deleted"){

   $query=str_replace("SELECT * FROM `pigs` where      sell_request='N'  and     deleteStatus !='D'" ,"  ",$query);
   $pig->viewPigsDeleted(true, $query);

}

 ?>
