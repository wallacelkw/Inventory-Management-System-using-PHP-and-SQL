<?php
include('config.php');

//--------------------Update data SQL for Customer------------------------
    if(isset($_POST['updatedata']))
    {   
        $cust_id        = $_POST['update_id'];
        $cust_name 		= $_POST['cust_name'];
        $cust_add 		= $_POST['cust_add'];
        $cust_contact 	= $_POST['cust_contact'];
        $cust_email     = $_POST['cust_email'];
        $cust_status 	= $_POST['cust_status'];

        $query = "UPDATE customer SET cust_name='$cust_name', cust_add='$cust_add', cust_contact='$cust_contact', cust_email=' $cust_email',
        cust_status=' $cust_status' WHERE cust_id='$cust_id'  ";
        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
            echo '<script> alert("Data Updated"); 
            window.location.href = "customer_manage.php";
            </script>';
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }


 //--------------------Delete data SQL for Customer------------------------   
    if(isset($_POST['deletedata']))
    {   
        $id   = $_POST['delete_id'];
        
        $sql = "DELETE FROM customer WHERE cust_id='$id'";
        $result = mysqli_query($con, $sql);

        if($result){
            echo '<script> alert("Data Deleted"); 
            window.location.href = "customer_manage.php";</script>';
        }else{
            echo '<script> alert("Data Not Deleted"); </script>';
            //header("Location:manage_customer.php");
        }
    }
    mysqli_close($con);

?>