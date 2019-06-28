<?php

// require '../../Database/DB.php';


class Report extends DBconnect{

 public function getReports($from, $to,$baseUrl)
 {
   if ($from == "all")
      $query="SELECT * FROM `reports`";
   else
      $query="SELECT * FROM `reports`
              where  `Date produced` between  $from and   $to";

   $run = $this->connect()->query($query);
           while ($report = $run->FETCH()){
            $Fname  =$report['Name'];
            $file   =$report['fileName'];
            $date   =$report['Date produced'];

            ?>
            <tr>
            <td><img src="<?php echo $baseUrl."icon.png" ?>" alt=""  width="15px"> <a href="<?php echo $baseUrl.$file ?>"
              target="_blank"
              style="color:#44c; font-size: 18px; font-weight: bold">
              <?php echo $Fname ?></a>
            </td>
            <td><?php echo $date ?></td>
            </tr>
            <?php
        }

 }

 public function addReport($name, $filename) {
   $today=date('Y-m-d');

   $Query="INSERT INTO PIG_FARM.reports(`Name`,`fileName`,`Date produced`) VALUES('$name','$filename','$today')";

       //add to the reports
     $this->register_item($Query, $name,"",false);
 }


}
 ?>
