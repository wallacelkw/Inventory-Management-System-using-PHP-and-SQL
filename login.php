<?php
	$connect = mysqli_connect("localhost", "root", "", "inventory");

	$adminname = $_POST['adminname'];
	$password = $_POST['password'];

	if($adminname == "" || $password == "")
	{
		echo '<script>';
		echo 'alert("Login Fail! Empty is not accepted");';
		echo 'location.href="index.php"';
		echo '</script>';
	}
	else
	{
		$sql = "SELECT * FROM admn WHERE admin_name = '".$adminname."' AND admin_password = '".$password."'";
		$result = mysqli_query($connect,$sql);
		$row = mysqli_fetch_array($result);

		if($row[1] == null || $row[2] == null)
		{
			echo '<script>';
			echo 'alert("Login Fail! Wrong admin name or password");';
			echo 'location.href="index.php"';
			echo '</script>';
		}
		else
		{
			if ($adminname == $row[1] && $password == $row[2])
			{
			session_start();
			$_SESSION['admin_name']    = $row[1];
			$_SESSION['password']      = $row[2];
			$_SESSION['admin_status']  = $row[5];

				if (trim($row[5]) == 'Super Admin') 
				{
					header('Location:dashboard_admin.php');
				}
				else
				{
					header('Location:dashboard.php');
				}		
			}

			else
			{   
				echo '<script>';
				echo 'alert("Login Fail! Wrong admin name or password");';
				echo 'location.href="index.php"';
				echo '</script>';
			}
		}
		
	}
?>
