<?php
require_once('config.php');
	
	if(isset($_POST)){
		
		$cust_id 		= $_POST['cust_id'];
		$cust_name 		= $_POST['cust_name'];
		$cust_add 		= $_POST['cust_add'];
		$cust_contact 	= $_POST['cust_contact'];
		$cust_email     = $_POST['cust_email'];
		$cust_status 	= $_POST['cust_status'];


		$sql = "INSERT INTO customer (cust_id, cust_name, cust_add, cust_contact, cust_email, cust_status ) 
			VALUES('$cust_id','$cust_name' ,'$cust_add' ,'$cust_contact','$cust_email','$cust_status')";
			if(mysqli_query($con, $sql)){
				echo 'Successfully';
			}else{
				echo 'There were erros while saving the data.';
			}
		}
	
mysqli_close($con);
?>