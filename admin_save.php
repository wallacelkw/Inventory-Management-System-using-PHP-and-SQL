<?php
require_once('config.php');
?>
<script src="js/inventory.js"></script>

<?php
	if(isset($_POST)){
		//$contValid "";
		$admin_id 		= $_POST['admin_id'];
		$admin_name 	= $_POST['admin_name'];
		$admin_password 		= $_POST['admin_password'];
		$admin_contact 	= $_POST['admin_contact'];
		$admin_email    = $_POST['admin_email'];
		$admin_status 	= $_POST['admin_status'];


		$sql = "INSERT INTO admn (admin_id, admin_name, admin_password, admin_contact, admin_email, admin_status ) 
			VALUES('$admin_id','$admin_name' ,'$admin_password' ,'$admin_contact','$admin_email','$admin_status')";
			if(mysqli_query($con, $sql)){
				echo 'Successfully';
			}else{
				echo 'There were erros while saving the data.';
			}
		}
	
mysqli_close($con);


?>