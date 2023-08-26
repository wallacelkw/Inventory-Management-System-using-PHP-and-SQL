<?php
require_once('config.php');

session_start();
$name = $_SESSION['admin_name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Admin</title>

    <link rel="shortcut icon" href="image/inventory_logo.png" />

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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
</head>

<style>
.btn-color {
    color: #fff;
    width: 100%;
    letter-spacing: 1px;
    font-size: 18px;
    font-weight: 500;
    transition: all 0.3s ease;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
    height: 100%;
}

.btn-color:hover {
    background: linear-gradient(-135deg, #71b7e6, #9b59b6);
}
</style>


<body>


    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <?php include("sidebar_admin.php"); ?>

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <?php include("topbar.php"); ?>

                    <form action="admin.php" method="POST" id="admin_form" name="admin_form">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <!-- Page Heading -->
                            <h1 class="m-0 font-weight-bold text-primary">New Admin</h1>
                            <!--START YOUR CODE HERE-->
                            <input type="hidden" name="admin_id" id="admin_id">
                            <label for="admin_name">Admin Name</label>
                            <input class="form-control" type="text" id="admin_name" name="admin_name" required>

                            <label for="admin_password">Admin Password</label>
                            <input class="form-control" type="text" id="admin_password" name="admin_password" required>

                            <label for="admin_contact">Admin Contact</label>
                            <span style="font-size:10px;">*XXX-XXXXXXX Format</span>
                            <input class="form-control" type="tel" id="admin_contact" name="admin_contact"
                                pattern="[0-9]{3}-[0-9]{7}" title="Please enter XXX-XXXXXXX Format." required>

                            <label for="admin_email">Admin Email</label>
                            <input class="form-control" type="email" id="admin_email" name="admin_email" required>


                            <label for="admin_status">Admin Status</label>
                            <select class="form-control" name="admin_status" id="admin_status">
                                <option value="Admin">Admin</option>
                                <option value="Super Admin">Super Admin</option>
                            </select>
                            <br><br>

                            <button class="btn btn-primary btn-color" type="submit" id="admin_register"
                                name="admin_register">Save</button>
                    </form>
                    <!-- END YOUR CODE HERE-->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        <?php include("logout_confirm.php"); ?>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
        <script src="js/inventory.js"></script>
        <!-- snipet for pop out -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

        <script type="text/javascript">
        $('#admin_register').click(function(e) {
            var valid = this.form.checkValidity();
            console.log(valid);
            if (valid) {
                var admin_name = $('#admin_name').val();
                var admin_password = $('#admin_password').val();
                var admin_contact = $('#admin_contact').val();
                var admin_email = $('#admin_email').val();
                var admin_status = $('#admin_status').val();

                e.preventDefault();
                //console.log(admin_contact);


                $.ajax({
                    type: 'POST',
                    url: 'admin_save.php',
                    data: {
                        admin_name: admin_name,
                        admin_password: admin_password,
                        admin_contact: admin_contact,
                        admin_email: admin_email,
                        admin_status: admin_status
                    },
                    success: function(data) {
                        Swal.fire({
                            'title': 'Successful',
                            'text': "Save Successfully",
                            'type': 'success'
                        })
                        $("#admin_form")[0].reset();
                        console.log(data);

                    },
                    error: function(data) {
                        Swal.fire({
                            'title': 'Errors',
                            'text': 'There were errors while saving the data.',
                            'type': 'error'
                        })
                        $("#admin_form")[0].reset();
                        console.log(data);
                    }
                });
            }
        });
        </script>


    </body>

</html>