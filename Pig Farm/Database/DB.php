<?php

/*
    The database class used to handle all interactions to the database
*/
    class DBconnect{
    	private $servername;
    	private $user_Name;
    	private $password;
    	private $database_Name;
    	private $charset;

      protected function connect()  {
      	$this->servername="127.0.0.1";
      	$this->user_Name="root";
      	$this->password="";
      	$this->database_Name="PIG_FARM";
      	$this->charset="utf8mb4";


      	   try {
      	   	$link="mysql:host=".$this->servername.";
                        dbname=".$this->database_Name.";
                        charset=".$this->charset;

      	   	$pdo=new PDO($link,$this->user_Name,$this->password);
      	   	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      	   	return $pdo;

      	   } catch (Exception $e) {
      	   	 echo "Could not connect ".$e->getMessage();
      	   }
      }

    //This function is used to check if an item is already in the database
    //If the item is available returns true
    //This method is also used for login  since it returns true or false
  protected function itemExists($Query, $Primary_Key){
        $run_query=$this->connect()->prepare($Query);
        $run_query->execute([$Primary_Key]);
        $row=$run_query->rowCount();
           if ($row>0)
            return true;
            else
              return false;
      }


//Adds a new item to the database. Irrigardless of the  of the table it takes a query and adds the item directly
  protected function register_item($Query, $Value,$Redirectory,$redirect){
                    $run_query=$this->connect()->prepare($Query);

                    if($run_query->execute()){
                        echo json_encode(array("success"=>true));                // echo "<script>window.open('../','_self')</script>";

                      }else
                        echo json_encode(array("success"=>true));                // echo "<script>window.open('../','_self')</script>";

          }

//Delete and item from a table
          protected function removeItem($Query,$check_query,$ID){
            if ($this->itemExists($check_query,$ID)) {
                  $run_query=$this->connect()->prepare($Query);
                  $run_query->execute([$ID]);
                  echo json_encode(array("success"=>true));                // echo "<script>window.open('../','_self')</script>";

            }else{

              echo json_encode(array("success"=>false));                // echo "<script>window.open('../','_self')</script>";
            }
          }


          protected function updateItem($Query,$check_query,$ID, $echo_message){
            if ($this->itemExists($check_query,$ID)) {
                  $run_query=$this->connect()->prepare($Query);
                  $run_query->execute([$ID]);

                     if($echo_message)
                  echo json_encode(array("success"=>false,"updatesuccess"=>true));                // echo "<script>window.open('../','_self')</script>";
            }else{
              echo json_encode(array("success"=>false));                // echo "<script>window.open('../','_self')</script>";
            }
          }
    }

?>
