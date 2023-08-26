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
    <title>Manage Customer</title>

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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.css" />


</head>

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


                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <h1 class="m-0 font-weight-bold text-primary">Manage Customer</h1>
                        <!--START YOUR CODE HERE-->
                        <br><br>
                        <table class="table table-striped table-bordered" id="data_table" style="width:100%;">
                            <thead>
                                <tr class="control-form">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php 
                                $sql = "SELECT * FROM customer";
                                $result = $con->query($sql);
                                $con->close();
                                while($row =  mysqli_fetch_assoc($result)) { ?>
                            <tr class="control-form">
                                <td align="center"><?php echo $row["cust_id"]; ?></td>
                                <td align="center"><?php echo $row["cust_name"]; ?></td>
                                <td align="center"><?php echo $row["cust_add"]; ?></td>
                                <td align="center"><?php echo $row["cust_contact"]; ?></td>
                                <td align="center"><?php echo $row["cust_email"]; ?></td>
                                <td align="center"><?php echo $row["cust_status"]; ?></td>
                                <td align="center">
                                    <button type="button" class="btn btn-success editbtn"> Edit </button>
                                    <button type="button" class="btn btn-danger deletebtn"> Delete </button>
                                </td>
                            </tr>
                            <?php
                                } ?>

                        </table>

                        <!--Edit Pop Out -->
                        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> Edit Customer Data </h5>
                                    </div>
                                    <form action="customer_process.php" method="POST" id="cust_form" name="cust_form">
                                        <!-- Begin Page Content -->
                                        <div class="container-fluid">
                                            <!-- Page Heading -->
                                            <h1 class="m-0 font-weight-bold text-primary">Edit Customer</h1>
                                            <!--START YOUR CODE HERE-->

                                            <label for="cust_name">Customer ID</label>
                                            <input class="form-control" type="text" name="update_id" id="update_id"
                                                readonly="readonly">

                                            <label for="cust_name">Customer Name</label>
                                            <input class="form-control" type="text" id="data_name" name="cust_name"
                                                required>

                                            <label for="cust_add">Customer Address</label>
                                            <input class="form-control" type="text" id="data_add" name="cust_add"
                                                required>

                                            <label for="cust_contact">Customer Contact</label>
                                            <span style="font-size:10px;">*XXX-XXXXXXX Format</span>
                                            <input class="form-control" type="tel" id="data_contact" name="cust_contact"
                                                pattern="[0-9]{3}-[0-9]{7}" title="Please enter XXX-XXXXXXX Format."
                                                required>

                                            <label for="cust_email">Customer Email</label>
                                            <input class="form-control" type="email" id="data_email" name="cust_email"
                                                required>

                                            <label for="cust_status">Customer Status</label>
                                            <select class="form-control" name="cust_status" id="data_status" required>
                                                <option value="Active">Active</option>
                                                <option value="Deactive">Deactive</option>
                                            </select>
                                            <br><br>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" name="updatedata" class="btn btn-primary">Update
                                                    Data</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!--DELETE POP OUT BOTTON-->
                        <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> Delete Customer Data </h5>
                                    </div>
                                    <form action="customer_process.php" method="POST" id="cust_form" name="cust_form">
                                        <!-- Begin Page Content -->
                                        <div class="modal-body">
                                            <!-- Page Heading -->
                                            <input type="hidden" name="delete_id" id="delete_id">
                                            <h1 class="m-0 font-weight-bold text-primary">Delete Customer</h1>
                                            <p>Are you sure you want to delete this data?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" name="deletedata" class="btn btn-primary">Delete
                                                Data</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


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
        <script src="js/dataTable.js"></script>
        <!-- snipet for pop out -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.js"></script>

        <script>
        //-------------DELETE BUTTON for CUSTOMER -----------------------
        $('.deletebtn').on('click', function() {

            $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            $('#delete_id').val(data[0]);
            //console.log("status information for delete ", data[0]);
        });
        </script>

        <script>
        //-------------EDIT BUTTON for CUSTOMER -----------------------
        $('.editbtn').on('click', function() {

            $('#editmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#update_id').val(data[0]);
            $('#cust_name').val(data[1]);
            $('#cust_add').val(data[2]);
            $('#cust_contact').val(data[3]);
            $('#cust_email').val(data[4]);
            $('#cust_status').val(data[5]);

            console.log("status information ", data[5]);
        });
        </script>
    </body>

</html>