<?php
require_once('config.php');
session_start();
$name = $_SESSION['admin_name'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Profile</title>
        <link rel="shortcut icon"  href="image/Omega-Logo.png"/>
        
        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- jQuery UI -->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <style>
            .ui-autocomplete
            {
                max-height: 400px;
                overflow-y: auto;
                /* prevent horizontal scrollbar */
                overflow-x: hidden;
                /* add padding to account for vertical scrollbar */
                padding-right: 20px; 
                z-index:2;
            }

            .modal-body
            {
                z-index:1;
            }

            table
            {
                white-space: nowrap;
            }
            
            th,tr,td 
            {
                border: 2px solid gray !important;
            } 
        </style>
    </head>

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <?php include("sidebar_admin.php"); ?>

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <?php include("topbar_admin.php"); ?>
                    
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <h1 class="m-0 font-weight-bold text-primary">MY PROFILE</h1>
                    
                        <div class="col-md-10 p-5" style="margin:0px 0px 0px 20px;">
                        <br><br>
                        <table class="table table-striped table-bordered" id="data_table" style="width:100%;">
                            <thead>
                                <tr class="control-form">
                                    <th align="center">Admin ID</th>
                                    <th align="center">Admin Name</th>
                                    <th align="center">Admin Contact</th>
                                    <th align="center">Admin Email</th>
                                    <th align="center">Admin Status</th>
                                </tr>
                            </thead>
                            
                            <tr>
                                <?php
                                $sql = "SELECT * FROM admn WHERE admin_name = '".$_SESSION['admin_name']."'";
                                $result = mysqli_query($con,$sql);
                                if($row = mysqli_fetch_assoc($result))
                                {
                                $adminid = $row['admin_id'];
                                $adminname = $row['admin_name'];
                                $admincontact = $row['admin_contact'];
                                $adminemail = $row['admin_email'];
                                $adminstatus = $row['admin_status'];
                                }
                                else
                                {
                                    $adminid = "";
                                    $adminname = "";
                                    $admincontact = "";
                                    $adminemail = "";
                                    $adminstatus = "";
                                }
                                ?>
                                <td align="center"><?php echo $adminid ?></td>
                                <td align="center"><?php echo $adminname ?></td>
                                <td align="center"><?php echo $admincontact ?></td>
                                <td align="center"><?php echo $adminemail ?></td>
                                <td align="center"><?php echo $adminstatus ?></td>
                                
                            </tr>

                        </table>

        </div>
        <!-- End of Page Wrapper -->

       <?php include("logout_confirm.php"); ?>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    </body>
</html>