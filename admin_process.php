<?php
include('config.php');

//--------------------Update data SQL for Admin------------------------
    if(isset($_POST['updatedata']))
    {   
        $admin_id        = $_POST['update_id'];
        $admin_name         = $_POST['admin_name'];
        $admin_password         = $_POST['admin_password'];
        $admin_contact  = $_POST['admin_contact'];
        $admin_email     = $_POST['admin_email'];
        $admin_status   = $_POST['admin_status'];

        $query = "UPDATE admn SET admin_name='$admin_name', admin_password='$admin_password', admin_contact='$admin_contact', admin_email=' $admin_email',
        admin_status=' $admin_status' WHERE admin_id='$admin_id'  ";
        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
            echo '<script> alert("Data Updated"); 
            window.location.href = "admin_manage.php";</script>';
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }


 //--------------------Delete data SQL for Admin------------------------   
    if(isset($_POST['deletedata']))
    {   
        $id   = $_POST['delete_id'];
        
        $sql = "DELETE FROM admn WHERE admin_id='$id'";
        $result = mysqli_query($con, $sql);

        if($result){
            echo '<script> alert("Data Deleted"); 
            window.location.href = "admin_manage.php";</script>';
        }else{
            echo '<script> alert("Data Not Deleted"); </script>';
            //header("Location:manage_admin.php");
        }
    }
    mysqli_close($con);

?>