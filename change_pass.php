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

        <title>Change Password</title>
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
            <?php include("sidebar.php"); ?>

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <?php include("topbar.php"); ?>
                    
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <h1 class="m-0 font-weight-bold text-primary">CHANGE PASSWORD</h1>
                    
                        <div class="col-md-10 p-5" style="margin:0px 0px 0px 20px;">
                        
                        <form method="POST">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <!-- Page Heading -->
                            <h3 class="m-0 font-weight-bold text-primary">Please enter the details required*</h3>
                            <!--START YOUR CODE HERE-->
                            <br>
                            <label for="current_pass">Current Password</label>
                            <input class="form-control" type="text" id="current_pass" name="current_pass" placeholder="Enter your current password..." style="width: 500px;" required>
                            <br>
                            <label for="new_pass">New Password</label>
                            <input class="form-control" type="text" id="new_pass" name="new_pass" placeholder="Enter your new password...(MAX 15 CHARACTERS)" maxlength="15" style="width: 500px;" required>
                            <br>
                            <label for="cnew_pass">Confirm New Password</label>
                            <input class="form-control" type="text" id="cnew_pass" name="cnew_pass" placeholder="Confirm your new password...(MAX 15 CHARACTERS)" maxlength="15" style="width: 500px;" required>
                            <br><br>

                            <input class="btn btn-primary btn-color" type="submit" name="submit" value="Change New Password">
                    </form>

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
<?php
    
    if(isset($_POST['submit'])){
    
    echo $name;
    echo $cpass = $_POST['current_pass'];
    echo $npass = $_POST['new_pass'];
    echo $cnpass = $_POST['cnew_pass'];

    $sql = "Select admin_password from admn where admin_name = '".$name."'";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result))
    {
        $pass = $row['admin_password'];
    }
    echo $pass;

    if($cpass == $pass)
    {
        if($npass == $cnpass)
        {
            if($cpass == $npass || $cpass == $cnpass)
            {
                echo "<script type='text/javascript'>alert('Current Password Is The Same With New Password! Please Try Again.')</script>";
                echo "<script>document.location='change_pass.php'
                </script>";
            }
            else
            {
                $sql2=mysqli_query($con,"UPDATE admn SET admin_password='$cnpass' WHERE admin_name = '".$name."'");
                echo "<script type='text/javascript'>alert('New Password Changed Successfully! Please Login Again')</script>";
                echo "<script>document.location='index.php'
                </script>";
            }

        }
        else
        {
            echo "<script type='text/javascript'>alert('New Password Is Different With Confirm New Password! Please Try Again.')</script>";
            echo "<script>document.location='change_pass.php'
            </script>";
        }
    }
    else
    {
        echo "<script type='text/javascript'>alert('Current Password Is Wrong! Please Try Again.')</script>";
        echo "<script>document.location='change_pass.php'
        </script>";
    }

    }
?>