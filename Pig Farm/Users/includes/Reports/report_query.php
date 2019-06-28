<?php
// Query
$query=" SELECT Breed, COUNT(Breed) as breed_count from pigs GROUP by Breed ORDER by breed_count desc";

if ($type == "general") {

  if ($breeds == "all" && $sex == "all") {
      $query="SELECT Breed, COUNT(Breed) as breed_count from pigs
              where
              deleteStatus !='D' and
              Date_farrowed      between     '$min_date_farrowed'    and   '$max_date_farrowed'     and
              Weight             between      $min_weight            and    $max_weight
              GROUP by Breed
              ORDER by breed_count desc";

  }elseif($breeds !== "all"){
    $all_breeds=explode(",",$breeds);

     $additional="where (Breed=";

    foreach ($all_breeds as $breed) {
      $additional.="'$breed'  or  Breed=";
    }

        $additional.="'all' )";

        if ($sex == "all")
        $query="SELECT Breed, COUNT(Breed) as breed_count from pigs
                $additional        and
                deleteStatus !='D' and
                Date_farrowed      between    '$min_date_farrowed'    and    '$max_date_farrowed'    and
                Weight             between     $min_weight            and     $max_weight
                GROUP by Breed
                ORDER by breed_count desc";
       else{
         $s= ($sex == "male")?"M":"F";

       $query="SELECT Breed, COUNT(Breed) as breed_count from pigs
               $additional        and
               deleteStatus !='D' and
               Date_farrowed      between     '$min_date_farrowed'    and    '$max_date_farrowed'    and
               Weight             between      $min_weight            and     $max_weight            and
               Sex='$s'
               GROUP by Breed
               ORDER by breed_count desc";

    }

  }elseif($sex !== "all"){
    $s= ($sex == "male")?"M":"F";

    $query=" SELECT Breed, COUNT(Breed) as breed_count from pigs
              where
              deleteStatus !='D' and
              Date_farrowed      between '$min_date_farrowed'    and     '$max_date_farrowed'   and
              Weight             between  $min_weight            and      $max_weight           and 
              Sex='$s'
              GROUP by Breed
              ORDER by breed_count desc";
  }


}
else{

//Sales report

  if ($breeds == "all" && $sex == "all") {
    $query="SELECT Breed,Count(Breed) as breed_count,Sum(quoted_price) as total_price from pigs,sales,sellAccepted
            where
            sales.ID = pigs.ID and sales.ID=sellAccepted.ID    and
            Date_farrowed      between '$min_date_farrowed'    and  '$max_date_farrowed'   and
            Weight             between  $min_weight            and   $max_weight           and
            quoted_price       between  $min_ammount           and   $max_ammount          and
            date_sold          between '$min_date_sold'        and  '$max_date_sold'
            GROUP by Breed
            ORDER by total_price desc";


  }elseif($breeds !== "all"){
    $all_breeds=explode(",",$breeds);

     $additional="(Breed=";

    foreach ($all_breeds as $breed) {
      $additional.="'$breed'  or  Breed=";
    }

        $additional.="'not set' )";

        if ($sex == "all")
        $query="SELECT Breed,Count(Breed) as breed_count,Sum(quoted_price) as total_price from pigs,sales,sellAccepted
                where
                sales.ID = pigs.ID and sales.ID=sellAccepted.ID    and
                $additional        and
                Date_farrowed      between '$min_date_farrowed'    and   '$max_date_farrowed'  and
                Weight             between  $min_weight            and    $max_weight          and
                quoted_price       between  $min_ammount           and    $max_ammount         and
                date_sold          between '$min_date_sold'        and   '$max_date_sold'
                GROUP by Breed
                ORDER by breed_count desc";
       else{
        $s= ($sex == "male")?"M":"F";

       $query="SELECT Breed,Count(Breed) as breed_count,Sum(quoted_price) as total_price from pigs,sales,sellAccepted
               where
               sales.ID = pigs.ID  and sales.ID=sellAccepted.ID   and
               $additional         and
               Date_farrowed       between   '$min_date_farrowed' and   '$max_date_farrowed' and
               Weight              between    $min_weight         and    $max_weight         and
               quoted_price        between    $min_ammount        and    $max_ammount        and
               date_sold           between   '$min_date_sold'     and   '$max_date_sold'     and
               Sex='$s'
               GROUP by Breed
               ORDER by breed_count desc";

    }

  }elseif($sex !== "all"){
    $s= ($sex == "male")?"M":"F";

     $query="SELECT Breed,Count(Breed) as breed_count,Sum(quoted_price) as total_price from pigs,sales,sellAccepted
             where
             sales.ID = pigs.ID   and sales.ID=sellAccepted.ID   and
             Date_farrowed        between  '$min_date_farrowed'  and   '$max_date_farrowed' and
             Weight               between   $min_weight          and    $max_weight         and
             quoted_price         between   $min_ammount         and    $max_ammount        and
             date_sold            between  '$min_date_sold'      and   '$max_date_sold'     and
             Sex='$s'
             GROUP by Breed
             ORDER by breed_count desc";
  }

}

 ?>
