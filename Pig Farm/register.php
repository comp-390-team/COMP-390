<?php
include '../includes/DB_Connect.php';

/**
 *
 */
class Register extends DBconnect
{
	private $first_Name;
	private $second_Name;
	private $Employee_ID;
	private $pass_code;

	function __construct($F_name,$S_Name,$EMP_ID)
	{
		$this->first_Name=$F_name;
		$this->second_Name=$S_Name;
        $this->Employee_ID=$EMP_ID;

		$this->pass_code=password_hash($EMP_ID,PASSWORD_DEFAULT);

         $checkDb="SELECT * FROM TAP_FARM.employees WHERE Emp_ID=?";
         $query="INSERT INTO TAP_FARM.employees(`F_Name`,`S_Name`,`Emp_ID`,`pass_code`,`Assigned`)
		        VALUES('$this->first_Name','$this->second_Name','$this->Employee_ID','$this->pass_code','no')";

		if (!$this->itemExists($checkDb,$this->Employee_ID));
			 $this->register_item($query,$this->first_Name,"index.php");
			else
			echo "<script>alert('".$this->first_Name." already exists')</script>";

	}

}
    if (isset($_POST['register']))
    	new Register($_POST['F_name'],$_POST['S_name'],$_POST['E_ID']);

?>
