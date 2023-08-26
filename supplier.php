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
    <title>New Supplier</title>

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

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include("sidebar.php"); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include("topbar.php"); ?>

                <form action="supplier.php" method="POST" id="supp_form" name="supp_form">
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <h1 class="m-0 font-weight-bold text-primary">New Supplier</h1>
                        <!--START YOUR CODE HERE-->
                        <input type="hidden" name="supp_id" id="supp_id">
                        <label for="supp_name">Supplier Name</label>
                        <input class="form-control" type="text" id="supp_name" name="supp_name" required>

                        <label for="supp_add">Supplier Address</label>
                        <input class="form-control" type="text" id="supp_add" name="supp_add" required>

                        <label for="supp_contact">Supplier Contact</label>
                        <span style="font-size:10px;">*XXX-XXXXXXX Format</span>
                        <input class="form-control" type="tel" id="supp_contact" name="supp_contact"
                            pattern="[0-9]{3}-[0-9]{7}" title="Please enter XXX-XXXXXXX Format." required>

                        <label for="supp_email">Supplier Email</label>
                        <input class="form-control" type="email" id="supp_email" name="supp_email" required>


                        <label for="supp_status">Supplier Status</label>
                        <select class="form-control" name="supp_status" id="supp_status" required>
                            <option value="Active">Active</option>
                            <option value="Deactive">Deactive</option>
                        </select>
                        <br><br>

                        <button class="btn btn-primary btn-color" type="submit" id="supp_register"
                            name="supp_register">Save</button>
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

    <!-- snipet for pop out -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script type="text/javascript">
    $('#supp_register').click(function(e) {
        var valid = this.form.checkValidity();
        console.log(valid);
        if (valid) {
            var supp_name = $('#supp_name').val();
            var supp_add = $('#supp_add').val();
            var supp_contact = $('#supp_contact').val();
            var supp_email = $('#supp_email').val();
            var supp_status = $('#supp_status').val();

            e.preventDefault();
            //console.log(supp_contact);

            //Sweet alert for confirmation save button
            $.ajax({
                type: 'POST',
                url: 'supplier_save.php',
                data: {
                    supp_name: supp_name,
                    supp_add: supp_add,
                    supp_contact: supp_contact,
                    supp_email: supp_email,
                    supp_status: supp_status
                },
                success: function(data) {
                    Swal.fire({
                        'title': 'Successful',
                        'text': "Save Successfully",
                        'type': 'success'
                    })
                    $("#supp_form")[0].reset();
                    console.log(data);

                },
                error: function(data) {
                    Swal.fire({
                        'title': 'Errors',
                        'text': 'There were errors while saving the data.',
                        'type': 'error'
                    })
                    $("#supp_form")[0].reset();
                    console.log(data);
                }
            });
        }
    });
    </script>


</body>

</html>