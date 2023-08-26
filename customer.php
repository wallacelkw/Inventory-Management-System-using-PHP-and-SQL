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
    <title>New Customer</title>

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
    /* background-color: #4e73df; */
    /* border-color: #4e73df; */
    width: 100%;
    letter-spacing: 1px;
    font-size: 18px;
    font-weight: 500;
    transition: all 0.3s ease;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
    height: 100%;
}

.btn-color:hover {
    /* transform: scale(0.99); */
    background: linear-gradient(-135deg, #71b7e6, #9b59b6);
}
</style>

<body>

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <?php include("sidebar.php"); ?>

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <?php include("topbar.php"); ?>
                    <!-- CREATE A CUSTOMER FORM TO POST THE DETAILS-->
                    <form action="customer.php" method="POST" id="cust_form" name="cust_form">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <!-- Page Heading -->
                            <h1 class="m-0 font-weight-bold text-primary">New Customer</h1>
                            <!--START YOUR CODE HERE-->
                            <!-- CUSTOMER DETAILS-->

                            <input type="hidden" name="cust_id" id="cust_id">
                            <label for="cust_name">Customer Name</label>
                            <input class="form-control" type="text" id="cust_name" name="cust_name" required>

                            <label for="cust_add">Customer Address</label>
                            <input class="form-control" type="text" id="cust_add" name="cust_add" required>

                            <label for="cust_contact">Customer Contact</label>
                            <span style="font-size:10px;">*XXX-XXXXXXX Format</span>
                            <input class="form-control" type="tel" id="cust_contact" name="cust_contact"
                                pattern="[0-9]{3}-[0-9]{7}" title="Please enter XXX-XXXXXXX Format." required>

                            <label for="cust_email">Customer Email</label>
                            <input class="form-control" type="email" id="cust_email" name="cust_email" required>


                            <label for="cust_status">Customer Status</label>
                            <select class="form-control" name="cust_status" id="cust_status" required>
                                <option value="Active">Active</option>
                                <option value="Deactive">Deactive</option>
                            </select>
                            <br><br>
                            <!-- Button for submit Customer Details to Database(customer)-->
                            <button class="btn btn-primary btn-color" type="submit" id="cust_register"
                                name="cust_register">Save</button>
                    </form>
                    <!-- END OF CUSTOMER DETAILS-->
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
        $('#cust_register').click(function(e) {
            var valid = this.form.checkValidity();
            console.log(valid);
            if (valid) {
                var cust_name = $('#cust_name').val();
                var cust_add = $('#cust_add').val();
                var cust_contact = $('#cust_contact').val();
                var cust_email = $('#cust_email').val();
                var cust_status = $('#cust_status').val();

                e.preventDefault();
                console.log(cust_contact);

                // Sweet Alert function after submitting the Customer details to database
                $.ajax({
                    type: 'POST',
                    url: 'customer_save.php',
                    data: {
                        cust_name: cust_name,
                        cust_add: cust_add,
                        cust_contact: cust_contact,
                        cust_email: cust_email,
                        cust_status: cust_status
                    },
                    success: function(data) {
                        Swal.fire({
                            'title': 'Successful',
                            'text': "Save Successfully",
                            'type': 'success'
                        })
                        $("#cust_form")[0].reset();
                        console.log(data);

                    },
                    error: function(data) {
                        Swal.fire({
                            'title': 'Errors',
                            'text': 'There were errors while saving the data.',
                            'type': 'error'
                        })
                        $("#cust_form")[0].reset();
                        console.log(data);
                    }
                });
            }
        });
        </script>


    </body>

</html>