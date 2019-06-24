<?php

// require '../Database/DB.php';
/**
 *
 */
class Pig extends DBconnect
{
  public $Pig_Id;
  public $Date_farrowed;
  public $Breed;
  public $Weight;
  public $Sex;

  function __construct($Pig_Id=null, $Date_farrowed=null, $Breed=null, $Weight=null, $Sex=null)
  {
    if ($Pig_Id !=null &&  $Date_farrowed !=null && $Breed !=null && $Weight !=null && $Sex !=null) {

      $this->Pig_Id=$Pig_Id;
      $this->Date_farrowed=$Date_farrowed;
      $this->Breed=$Breed;
      $this->Weight=$Weight;
      $this->Sex=$Sex;
    }

  }

//Uses the databse class to add a new pig to the database
  public function addPig($mother_id)
  {
    $check="SELECT * FROM PIG_FARM.pigs where ID=?";
    //check if a feed with the same name is not in the database
          if (!$this->itemExists($check,$this->Pig_Id)) {
            //add new  feed
              $today=date('Y-m-d');

            $Query="INSERT INTO PIG_FARM.pigs(`ID`,`Date_farrowed`,`Breed`,`Weight`,`Sex`,`sell_request`,`sellStatus`,`Weight_history`,`mother`)
            VALUES('$this->Pig_Id','$this->Date_farrowed','$this->Breed','$this->Weight','$this->Sex','N','NR','$today=>$this->Weight','$mother_id')";

            //add to the records
            $this->register_item($Query, $this->Pig_Id,"../Users/Employees/SectionAttendant",true);
          }else {
            echo "<script>alert('Pig of ID  ".$this->Pig_Id." already exists')</script>";
           echo "<script>window.open('../Users/Employees/SectionAttendant','_self')</script>";
          }
  }


  public function addnewBreed($breed)
  {
    $check="SELECT * FROM PIG_FARM.breeds where breed=?";
          if (!$this->itemExists($check,$breed)) {

            $today=date('Y-m-d');

            $Query="INSERT INTO PIG_FARM.breeds(`breed`,`date_added`)
            VALUES('$breed','$today')";

            //add to the records
            $this->register_item($Query, $breed,"",false);
          }else
            echo json_encode(array("success"=>false));                // echo "<script>window.open('../','_self')</script>";
  }


  // Add a pig to the database
    public function addApprovedPig($ID,$Price)
    {
      $check="SELECT * FROM PIG_FARM.sellAccepted where ID=?";
      //check if a feed with the same name is not in the database
            if (!$this->itemExists($check,$ID)) {

              //calculate date today
              $today=date('Y-m-d');
              $Query="INSERT INTO PIG_FARM.sellAccepted(`ID`,`quoted_price`,`date_approved`)
              VALUES('$ID','$Price','$today')";

              //add to the records
              $this->register_item($Query, $ID,"../Users/Employees/SectionAttendant",true);


              //uppdate the pig sell status to rejected
              $check="SELECT * FROM PIG_FARM.pigs where ID=?";

              //Query to update the pigs data using id
              $update_query="UPDATE pigs SET sellStatus='A'  WHERE ID=?";

              $this->updateItem($update_query,$check,$ID,false);
            }else {
              echo "<script>alert('Pig of ID  ".$ID." already exists')</script>";
             echo "<script>window.open('../Users/Employees/SectionAttendant','_self')</script>";
            }
    }



    public function addRejectedPig($ID,$Comment){

              //add new  feed
              $today=date('Y-m-d');
              $Query="INSERT INTO PIG_FARM.sellRejected(`ID`,`remark`,`date_rejected`,`rejection_status`)
              VALUES('$ID','$Comment','$today','N')";
              //add to the records
              $this->register_item($Query, $ID,"../Users/Employees/SectionAttendant",true);

              //uppdate the pig sell status to rejected
              $check="SELECT * FROM PIG_FARM.pigs where ID=?";

              //Query to update the pigs data using id
              $update_query="UPDATE pigs SET sellStatus='R'  WHERE ID=?";

              $this->updateItem($update_query,$check,$ID,false);
    }



    public function addSales($ID,$Customer_Id){

              //add new  feed
              $today=date('Y-m-d');
              $Query="INSERT INTO sales(`ID`,`date_sold`,`customer_id`)
                      VALUES('$ID','$today','$Customer_Id')";
              //add to the records
              $this->register_item($Query, $ID,"",false);

              //uppdate the pig sell status to S => Sold
              $check="SELECT * FROM PIG_FARM.pigs where ID=?";

              //Query to update the pigs data using id
              $update_query="UPDATE pigs SET sellStatus='S'  WHERE ID=?";

              $this->updateItem($update_query,$check,$ID,false);
    }


  public function updatePig($breed, $sex, $weight, $request, $ID){

    $query="SELECT * FROM `pigs` where sell_request='N' and ID='$ID'";
    $run = $this->connect()->query($query);

    $weight_history="";
    while ($pig = $run->FETCH()){$weight_history=$pig['Weight_history'];}

     ///Get the latest date in the recorded weights
    $latest_date=current(explode("=>",end(explode(",",$weight_history))));

    $today=date('Y-m-d');

    if (sizeof(explode(",",$weight_history))>1 || $latest_date !=$today)
    $weight_history2=",$today=>".$weight;
    else
    $weight_history2="$today=>".$weight;


    //Check if the latest date is the same as today
    if ($latest_date != $today)
    $update_h=$weight_history.$weight_history2;
    else
    $update_h=substr($weight_history,0,strripos($weight_history,",")).$weight_history2;



    $check="SELECT * FROM PIG_FARM.pigs where ID=?";

   $sell_status=($request=="Y")?"NU":"NR";
    //Query to update the pigs data using id
    $update_query="UPDATE pigs SET Breed='$breed', Weight=$weight, Sex='$sex',
                   sell_request='$request',sellStatus='$sell_status',Weight_history='$update_h' WHERE ID=?";

    //Call to update function
     $this->updateItem($update_query,$check,$ID,true);
  }



   	 	 	 	// date_set
  public function updateSettings($min_age, $min_weight, $sex, $breeds, $current_age){

    $check="SELECT * FROM PIG_FARM.sellSettings where min_age=?";

    $today=date('Y-m-d');

    //Query to update the pigs data using id
    $update_query="UPDATE sellSettings SET min_age='$min_age', min_weight=$min_weight,
                  sex='$sex', breeds='$breeds', date_set='$today' WHERE min_age=?";



    //Call to update function
     $this->updateItem($update_query,$check,$current_age,true);
  }



  public function updateRejects($ID){
    $check="SELECT * FROM PIG_FARM.pigs where ID=?";

    //Query to update the pigs data using id
    $update_query="UPDATE sellRejected SET rejection_status='C' WHERE ID=?";

    //Call to update function
     $this->updateItem($update_query,$check,$ID,false);


     //update the pigs table and reset the
                   // sell status to NR => Not requested
                   // sell request to N => No
     $update_query="UPDATE pigs SET sell_request='N',sellStatus='NR' WHERE ID=?";
     $this->updateItem($update_query,$check,$ID,true);

  }


//Deletes an occurence of a pig from the database
  public function removePig($ID)
  {
    //query if the pig to be removed is realy in the databse
    $check_query="SELECT * FROM PIG_FARM.pigs where ID=?";

    //delete query
    $query="DELETE FROM PIG_FARM.pigs where ID=?";

    //Function to delete pig
    $this->removeItem($query,$check_query,$ID);
  }

  public function removeBreed($breed)
  {
    //query if the pig to be removed is realy in the databse
    $check_query="SELECT * FROM PIG_FARM.breeds where breed=?";

    //delete query
    $query="DELETE FROM PIG_FARM.breeds where breed=?";

    //Function to delete pig
    $this->removeItem($query,$check_query,$breed);
  }

//returns a table of the pigs in the database
  public function viewPigs($type,$sort,$query)
  {
    $settings=$this->loadCurrentSettings();

    if (!$sort)
    $query="SELECT * FROM `pigs` where sell_request='N'";

    $run = $this->connect()->query($query);
            while ($pig = $run->FETCH())
        {
              $id=$pig['ID'];
              $Breed=$pig['Breed'];
              $Weight=$pig['Weight'];
              $Sex=$pig['Sex'];
              $date_farrowed=$pig['Date_farrowed'];
              $sell_request_status=$pig['sell_request'];


              //Date from the databse
              $date = new DateTime($date_farrowed. '00:00:00');
              //Get the date today
              $now = new DateTime();
              //Get the diffrence in the dates
              $diffrence = $date->diff($now);
              //Get the difference interms of in year/months/days
              $age=$diffrence->y.' years  '.$diffrence->m.' months '.$diffrence->d.' days';

              $years_old=$diffrence->y;


              $date1 = strtotime($date_farrowed);        //date pig was born
              $date2 = strtotime($settings['min_age']);  //mimimum selling date

               $sex_validity=true;
              //check sex validity
              if ($settings['sex']=="ALL")
                    $sex_validity=true;
              else if($settings['sex'] != $Sex)
                    $sex_validity=false;


              if ((in_array($Breed,$settings['breed']) && $Weight>= $settings['min_weight'] && ($date1<= $date2) && $sex_validity))
                     $years_old=10;
              else
                   $years_old=0;


              $b_id=$id."_breed";
              $w_id=$id."_weight";
              $s_id=$id."_sex";
              $sell_id=$id."_sell";


           if ($type == 'all')
          echo
                "
              <tr id='$id'>
                <td>".$id."</td>
                <td id='$b_id'>".$Breed."</td>
                <td id='$w_id'>".$Weight."</td>
                <td>".$age ."</td>
                <td id='$s_id'>".$Sex."</td>

                <td><button class='btn btn-success btn-sm'
                onclick='hideDiv(\"$id\",\"$date_farrowed\",$years_old)'>update</button></td>
                <td>
                <form role='form' id='delete_for'>
                  <input type='text' name='id' id='$sell_id' hidden  value='$sell_request_status'>
                  <button type='button' class='btn btn-danger btn-sm' onclick='deletePig(\"$id\")'>DELETE</button>
                 </form>
                </td>
             </tr>
                ";
                else if($type=='viable'  && $years_old==10)
                echo
                      "
                    <tr id='$id'>
                      <td>".$id."</td>
                      <td id='$b_id'>".$Breed."</td>
                      <td id='$w_id'>".$Weight."</td>
                      <td>".$age ."</td>
                      <td id='$s_id'>".$Sex."</td>

                      <td><button class='btn btn-success btn-sm'
                      onclick='hideDiv(\"$id\",\"$date_farrowed\",$years_old)'>update</button></td>
                      <td>
                      <form role='form' id='delete_for'>
                        <input type='text' name='id' id='$sell_id' hidden  value='$sell_request_status'>
                        <button type='button' class='btn btn-danger btn-sm' onclick='deletePig(\"$id\")'>DELETE</button>
                       </form>
                      </td>
                   </tr>
                      ";
        }

  }



  //returns a table of the pigs in the database
    public function viewPigData($sort,$query)
    {
      if (!$sort)
      $query="SELECT * FROM pigs ORDER BY Weight";
      $run = $this->connect()->query($query);
              while ($pig = $run->FETCH())
          {
                $id=$pig['ID'];
                $Breed=$pig['Breed'];
                $Weight=$pig['Weight'];
                $Sex=$pig['Sex'];
                $date_farrowed=$pig['Date_farrowed'];
                $sell_request_status=$pig['sell_request'];


                //Date from the databse
                $date = new DateTime($date_farrowed. '00:00:00');
                //Get the date today
                $now = new DateTime();
                //Get the diffrence in the dates
                $diffrence = $date->diff($now);
                //Get the difference interms of in year/months/days
                $age=$diffrence->y.' years  '.$diffrence->m.' months '.$diffrence->d.' days';

                $years_old=$diffrence->y;

                $b_id=$id."_breed";
                $w_id=$id."_weight";
                $s_id=$id."_sex";
                $sell_id=$id."_sell";



            echo
                  "
                <tr id='$id'>
                  <td>".$id."</td>
                  <td id='$b_id'>".$Breed."</td>
                  <td id='$w_id'>".$Weight."</td>
                  <td>".$age ."</td>
                  <td id='$s_id'>".$Sex."</td>
               </tr>
                  ";
          }

    }



    //returns a table of the pigs in the database
      public function viewPigsToBeSold($sort, $query)
      {
        if(!$sort)
        $query="SELECT * FROM pigs where sell_request='Y' and sellStatus='NU' ORDER BY Weight";
        else
        $query.=" and sell_request='Y' and sellStatus='NU' ORDER BY Weight";

        $run = $this->connect()->query($query);
                while ($pig = $run->FETCH())
            {
                  $id=$pig['ID'];
                  $Breed=$pig['Breed'];
                  $Weight=$pig['Weight'];
                  $Sex=$pig['Sex'];
                  $date_farrowed=$pig['Date_farrowed'];
                  $sell_request_status=$pig['sell_request'];


                  //Date from the databse
                  $date = new DateTime($date_farrowed. '00:00:00');
                  //Get the date today
                  $now = new DateTime();
                  //Get the diffrence in the dates
                  $diffrence = $date->diff($now);
                  //Get the difference interms of in year/months/days
                  $age=$diffrence->y.' years  '.$diffrence->m.' months ';

                  // $years_old=$diffrence->y;

                  $b_id=$id."_breed";
                  $w_id=$id."_weight";
                  $s_id=$id."_sex";
                  $sell_id=$id."_sell";



              echo
                    "
                  <tr id='$id'>
                      <td>".$id."</td>
                      <td id='$b_id'>".$Breed."</td>
                      <td id='$w_id'>".$Weight."</td>
                      <td>".$age ."</td>
                      <td id='$s_id'>".$Sex."</td>


                      <td><button class='btn btn-success btn-sm'
                      onclick='showDetails(\"$id\",\"$age\")'>sell approval</button></td>
                 </tr>
                    ";
            }

      }


      //returns a table of the pigs in the database
        public function acceptedForSale($sort, $sortQuery){



          $query="SELECT  sellAccepted.*, pigs.*  from sellAccepted , pigs
                  where sellAccepted.ID = pigs.ID and  pigs.sellStatus !='S'";

          if($sort)
             $query.="  $sortQuery";

          $run = $this->connect()->query($query);
                  while ($pig = $run->FETCH())
              {
                    $id=$pig['ID'];
                    $price=$pig['quoted_price'];
                    $Weight=$pig['Weight'];
                    $Sex=$pig['Sex'];
                    $breed=$pig['Breed'];

                    $date_farrowed=$pig['Date_farrowed'];
                    // $sell_request_status=$pig['sell_request'];


                    //Date from the databse
                    $date = new DateTime($date_farrowed. '00:00:00');
                    //Get the date today
                    $now = new DateTime();
                    //Get the diffrence in the dates
                    $diffrence = $date->diff($now);
                    //Get the difference interms of in year/months/days
                    $age=$diffrence->y.' years  '.$diffrence->m.' months ';

                    $years_old=$diffrence->y;


                    $p_id=$id."_price";
                    $b_id=$id."_breed";
                    $w_id=$id."_weight";
                    $s_id=$id."_sex";
                    $sell_id=$id."_sell";



                echo
                      "
                    <tr id='$id'>
                        <td>".$id."</td>
                        <td id='$p_id'>".$price."</td>
                        <td id='$w_id'>".$Weight."</td>
                        <td >".$breed."</td>
                        <td >".$age ."</td>
                        <td id='$s_id'>".$Sex."</td>



                        <td>
                          <center>
                            <button class='btn btn-success btn-sm'onclick='sellPig(\"$id\")' style='margin: 0px;'>
                                      sell info
                          </button>
                        </center>
                      </td>
                   </tr>
                      ";
              }

        }





        public function rejectedForSale($sort, $sortQuery){


          $query="SELECT  sellRejected.*, pigs.*  from sellRejected , pigs
                  where sellRejected.ID = pigs.ID  and sellRejected.rejection_status='N'";
          if($sort)
          $query.="  $sortQuery";

          $run = $this->connect()->query($query);
                  while ($pig = $run->FETCH())
              {
                    $id=$pig['ID'];
                    $reject_date=$pig['date_rejected'];
                    $remark=$pig['remark'];


                    $b_id=$id."_breed";
                    $w_id=$id."_weight";
                    $s_id=$id."_sex";
                    $sell_id=$id."_sell";

                echo
                      "
                    <tr id='$id'>
                        <td>".$id."</td>
                        <td id='$b_id'>".$reject_date."</td>
                        <td id='$w_id'>".$remark."</td>

                        <td><button class='btn btn-success btn-sm'
                         onclick='removeFromRejects(\"$id\",\"$reject_date\")'> &nbsp;&nbsp;&nbsp;&nbsp; Ok &nbsp;&nbsp;&nbsp;&nbsp; </button></td>
                   </tr>
                      ";
              }

        }

        public function loadID_Of_Pigs_To_Sell(){
          $query="SELECT  sellAccepted.*, pigs.*  from sellAccepted , pigs
                  where sellAccepted.ID = pigs.ID and  pigs.sellStatus !='S'";
          $run = $this->connect()->query($query);
                  while ($pig = $run->FETCH()){
                    $id=$pig['ID'];

                    $opt_id="option_".$id;

              echo "<option value='$id' id='$opt_id'>$id</option>";
                  }

        }

        public function loadBreeds($id_option){

           $query="SELECT * from sellSettings";
           $breed="";

           $run = $this->connect()->query($query);
           while ($pig = $run->FETCH()){ $breed=$pig['breeds'];}

           $breeds_currently_sold=explode(",",$breed);

          $query="SELECT * from breeds";
          $run = $this->connect()->query($query);
            while ($pig = $run->FETCH()){
                    $breed=$pig['breed'];

                    $id=$id_option."_".$breed;

                     if($id_option != "all"){
                if (!in_array($breed,$breeds_currently_sold))
                           echo "<option value='$breed' id='$id'>$breed</option>";
                  }
                else{
                  echo "<option value='$breed' id='$id'>$breed</option>";
                }

              }

        }


        public function loadCurrentBreeds(){

           $query="SELECT * from sellSettings";
           $breed="";

           $run = $this->connect()->query($query);
           while ($pig = $run->FETCH()){ $breed=$pig['breeds'];}

           $breeds_currently_sold=explode(",",$breed);




              foreach ( $breeds_currently_sold as $breed ){

                $btn="<button class='btn btn-danger btn-sm' type='button' name='button'  onclick='removeSale(\"".$breed."\")'>&times;</button>";

                $tr="<tr id='sales_".$breed."'><td>".$breed."</td> <td>".$btn."</td> </tr>";

                if ($breed != "none")
                     echo  $tr;
              }

        }


        public function getStatistics($pig_Id){

           $query="SELECT Weight_history,Date_farrowed from pigs where ID='$pig_Id'";
           $history="";
           $date_farrowed="";

           $run = $this->connect()->query($query);
           while ($pig = $run->FETCH()){
             $history=$pig['Weight_history'];
             $date_farrowed=$pig['Date_farrowed'];

           }

           $history=explode(",",$history);


           $start = strtotime($date_farrowed);

           $tatistics=[];


              foreach ( $history as $weight_data ){
                  $daily_data=explode("=>",$weight_data);

                  $end = strtotime($daily_data[0]);

                  $days_between = ceil(abs($end - $start) / 86400);

                  $data=[intval($end."000"),floatval($daily_data[1])];

                  array_push($tatistics, $data);
              }
            return $tatistics;
        }


        public function loadCurrentSettings(){

           $query="SELECT * from sellSettings";
           $breed="";
           $min_age="";
           $min_weight="";
           $sex="";

           $run = $this->connect()->query($query);
           while ($pig = $run->FETCH()){
                $breed     =$pig['breeds'];
                $min_age   =$pig['min_age'];
                $sex       =$pig['sex'];
                $min_weight=$pig['min_weight'];
            }

            //Calculate day age
            //Date from the databse
            $date = new DateTime($min_age. '00:00:00');
            //Get the date today
            $now = new DateTime();
            //Get the diffrence in the dates
            $diffrence = $date->diff($now);
            //Get the difference interms of in year/months/days
            $y=($diffrence->y > 1 || $diffrence->y ==0)?" years ":' year ';
            $m=($diffrence->m > 1 || $diffrence->m ==0)?" months ":' month ';
            $d=($diffrence->d > 1 || $diffrence->d ==0)?" days ":' day ';

            $age=$diffrence->y.$y.$diffrence->m.$m.$diffrence->d.$d;

           $breeds_currently_sold=explode(",",$breed);

           $settings=array("breed" => $breeds_currently_sold, "min_age" => $min_age, 'sex' => $sex,"min_weight"=>$min_weight,"age"=>$age);

           return $settings;
        }

}
 ?>
