<?php
require_once('config.php');
?>


<?php
	if(isset($_POST)){
		//$contValid "";
		$supp_id 		= $_POST['supp_id'];
		$supp_name 		= $_POST['supp_name'];
		$supp_add 		= $_POST['supp_add'];
		$supp_contact 	= $_POST['supp_contact'];
		$supp_email     = $_POST['supp_email'];
		$supp_status 	= $_POST['supp_status'];


		$sql = "INSERT INTO supplier (supp_id, supp_name, supp_add, supp_contact, supp_email, supp_status ) 
			VALUES('$supp_id','$supp_name' ,'$supp_add' ,'$supp_contact','$supp_email','$supp_status')";
			if(mysqli_query($con, $sql)){
				echo 'Successfully';
			}else{
				echo 'There were erros while saving the data.';
			}
		}
	
mysqli_close($con);


?>