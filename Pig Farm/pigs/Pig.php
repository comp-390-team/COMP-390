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
  public function addPig()
  {
    $check="SELECT * FROM PIG_FARM.pigs where ID=?";
    //check if a feed with the same name is not in the database
          if (!$this->itemExists($check,$this->Pig_Id)) {
            //add new  feed
            $Query="INSERT INTO PIG_FARM.pigs(`ID`,`Date_farrowed`,`Breed`,`Weight`,`Sex`,`sell_request`,`sellStatus`)
            VALUES('$this->Pig_Id','$this->Date_farrowed','$this->Breed','$this->Weight','$this->Sex','N','NR')";

            //add to the records
            $this->register_item($Query, $this->Pig_Id,"../Users/Employees/SectionAttendant",true);
          }else {
            echo "<script>alert('Pig of ID  ".$this->Pig_Id." already exists')</script>";
           echo "<script>window.open('../Users/Employees/SectionAttendant','_self')</script>";
          }
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

              $this->updateItem($update_query,$check,$ID,"Pig");
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

              $this->updateItem($update_query,$check,$ID,"Pig");
    }

  public function updatePig($breed, $sex, $weight, $request, $ID){
    $check="SELECT * FROM PIG_FARM.pigs where ID=?";

   $sell_status=($request=="Y")?"NU":"NR";
    //Query to update the pigs data using id
    $update_query="UPDATE pigs SET Breed='$breed', Weight=$weight, Sex='$sex',
                   sell_request='$request',sellStatus='$sell_status' WHERE ID=?";

    //Call to update function
     $this->updateItem($update_query,$check,$ID,"Pig");
  }


//Deletes an occurence of a pig from the database
  public function removePig($ID)
  {
    //query if the pig to be removed is realy in the databse
    $check_query="SELECT * FROM PIG_FARM.pigs where ID=?";

    //delete query
    $query="DELETE FROM PIG_FARM.pigs where ID=?";

    //Function to delete pig
    $this->removeItem($query,$check_query,$ID,"Pig");
  }

//returns a table of the pigs in the database
  public function viewPigs()
  {
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
    public function viewPigData()
    {
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
      public function viewPigsToBeSold()
      {
        $query="SELECT * FROM pigs where sell_request='Y' and sellStatus='NU' ORDER BY Weight";
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
        public function acceptedForSale()
        {
          $query="SELECT  sellAccepted.*, pigs.*  from sellAccepted , pigs where sellAccepted.ID = pigs.ID";
          $run = $this->connect()->query($query);
                  while ($pig = $run->FETCH())
              {
                    $id=$pig['ID'];
                    $price=$pig['quoted_price'];
                    $Weight=$pig['Weight'];
                    // $Sex=$pig['Sex'];
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

                    $b_id=$id."_breed";
                    $w_id=$id."_weight";
                    $s_id=$id."_sex";
                    $sell_id=$id."_sell";


                    // <td id='$s_id'>".$Sex."</td>


                    // <td><button class='btn btn-success btn-sm'
                    // onclick='showDetails(\"$id\",\"$age\")'>sell approval</button></td>
                echo
                      "
                    <tr id='$id'>
                        <td>".$id."</td>
                        <td id='$b_id'>".$price."</td>
                        <td id='$w_id'>".$Weight."</td>
                        <td>".$age ."</td>


                        <td>
                          <center>
                            <button class='btn btn-success btn-sm'onclick='openSellPane(\"$id\")' style='margin: 0px;'>
                                      sell info
                          </button>
                        </center>
                      </td>
                   </tr>
                      ";
              }

        }





        public function rejectedForSale()
        {
          $query="SELECT  sellRejected.*, pigs.*  from sellRejected , pigs where sellRejected.ID = pigs.ID";
          $run = $this->connect()->query($query);
                  while ($pig = $run->FETCH())
              {
                    $id=$pig['ID'];
                    $reject_date=$pig['date_rejected'];
                    $remark=$pig['remark'];
                    // $Sex=$pig['Sex'];
                    // $date_farrowed=$pig['Date_farrowed'];
                    // $sell_request_status=$pig['sell_request'];


                    // //Date from the databse
                    // $date = new DateTime($date_farrowed. '00:00:00');
                    // //Get the date today
                    // $now = new DateTime();
                    // //Get the diffrence in the dates
                    // $diffrence = $date->diff($now);
                    // //Get the difference interms of in year/months/days
                    // $age=$diffrence->y.' years  '.$diffrence->m.' months ';

                    // $years_old=$diffrence->y;

                    $b_id=$id."_breed";
                    $w_id=$id."_weight";
                    $s_id=$id."_sex";
                    $sell_id=$id."_sell";


                    // <td>".$age ."</td>
                    // <td id='$s_id'>".$Sex."</td>


                    // <td><button class='btn btn-success btn-sm'
                    // onclick='showDetails(\"$id\",\"$age\")'>sell approval</button></td>
                echo
                      "
                    <tr id='$id'>
                        <td>".$id."</td>
                        <td id='$b_id'>".$reject_date."</td>
                        <td id='$w_id'>".$remark."</td>

                        <td><button class='btn btn-success btn-sm'
                         onclick='removeFromRejects(\"$id\")'> &nbsp;&nbsp;&nbsp;&nbsp;Ok&nbsp;&nbsp;&nbsp;&nbsp; </button></td>
                   </tr>
                      ";
              }

        }



}
 ?>


<!--
 <script>
 document.getElementById





 </script> -->
