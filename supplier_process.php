<?php
include('config.php');

//--------------------Update data SQL for Supplier------------------------
    if(isset($_POST['updatedata']))
    {   
        $supp_id        = $_POST['update_id'];
        $supp_name 		= $_POST['supp_name'];
        $supp_add 		= $_POST['supp_add'];
        $supp_contact 	= $_POST['supp_contact'];
        $supp_email     = $_POST['supp_email'];
        $supp_status 	= $_POST['supp_status'];

        $query = "UPDATE supplier SET supp_name='$supp_name', supp_add='$supp_add', supp_contact='$supp_contact', supp_email=' $supp_email',
        supp_status=' $supp_status' WHERE supp_id='$supp_id'  ";
        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
            echo '<script> alert("Data Updated"); 
            window.location.href = "supplier_manage.php";</script>';
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }


 //--------------------Delete data SQL for Supplier------------------------   
    if(isset($_POST['deletedata']))
    {   
        $id   = $_POST['supp_delete_id'];
        
        $sql = "DELETE FROM supplier WHERE supp_id='$id'";
        $result = mysqli_query($con, $sql);

        if($result){
            echo '<script> alert("Data Deleted"); 
            window.location.href = "supplier_manage.php";</script>';
        }else{
            echo '<script> alert("Data Not Deleted"); </script>';
        
        }
    }
    mysqli_close($con);

?>