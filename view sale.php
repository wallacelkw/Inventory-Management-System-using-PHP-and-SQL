<?php include('config.php');?>
<?php 
  session_start();
$name = $_SESSION['admin_name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Sales</title>

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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="shortcut icon" type="image/png" href="image/inventory_logo.png" />
</head>
<style>
.container_sales {
    /*background-color:grey;*/
    border-radius: 3px;
}

input[type=text] {
    width: 100%;
    margin-bottom: 20px;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

label {
    margin-bottom: 15px;
    display: block;
}

.icon-container {
    margin-bottom: 20px;
    padding: 7px;
    font-size: 24px;
}

.btn_color a {
    text-decoration: none;
    display: inline-block;
    padding: 10px 20px;
    position: left;
    font-weight: bold;
    outline: none;
    color: white;
}

.btn_color a:hover {
    background: yellow;
    color: black;
}

.btn {
    border: none;
    margin: 10px;
    color: white;
    font-weight: bold;
    font-size: 23px;
    border-radius: 10px 0 10px 0;
}

.edit-btn {
    background-color: orange;
    color: white;
}

.trash-btn {
    background-color: #CF3A24;
}

.file-btn {
    background-color: #26A65B;
}

.btn1 {
    background-color: red;
    color: black;
    border-radius: 5px;
}

hr {
    border: 1px solid lightgrey;
}

span.price {
    float: right;
    color: grey;
}

@media (max-width: 800px) {
    .row {
        flex-direction: column-reverse;
    }

    .col-25 {
        margin-bottom: 20px;
    }

}

table tr th {
    font-size: 20px;
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

                <div class="container-fluid">
                    <h1 class="m-0 font-weight-bold text-primary">
                        Sale Information</h1>
                    <br><br>
                    <table class="table table-striped table-bordered" id="data_table" width="100%">
                        <thead>
                            <tr class="control-form">
                                <th>Sale ID</th>
                                <th>Sale Product Name</th>
                                <th>Sale Price(Unit)</th>
                                <th>Sale Qty Sold(Unit)</th>
                                <th>Sale Total Price(RM)</th>
                                <th>Sale Date</th>
                                <th>Invoice</th>
                                <th>Delete</th>
                                <th>PDF</th>

                            </tr>
                        </thead>
                        <?php   

                              $result=mysqli_query($con,"Select * from sale");

                              while($row=mysqli_fetch_assoc($result))
                              {
                                $date = $row['sale_date'];
                                $timestamp = strtotime($date);
                                $new_date = date("d-m-Y", $timestamp);
                                  ?>
                        <tr>
                            <td><?php echo $row['sale_id'];?></td>
                            <td><?php echo $row['sale_prod_name'];?> </td>
                            <td>RM <?php echo $row['sale_price'];?></td>
                            <td><?php echo $row['sale_qty_sold'];?></td>
                            <td><?php echo $row['total_price'];?></td>
                            <td><?php echo $new_date;?></td>
                            <td><a class="btn edit-btn btn_color"
                                    href="invoice sale.php?id=<?php echo $row['sale_id'];?>"><i
                                        class="fa fa-edit"></button></i></a></td>
                            <td><a class="btn trash-btn btn_color" href="view sale.php?id=<?php echo $row['sale_id'];?>"
                                    onclick="return confirmation('Do you want to delete this package?');"><i
                                        class="fa fa-trash"></button></i></a></td>
                            <td><a class="btn file-btn btn_color" href="invoice.php?id=<?php echo $row['sale_id'];?>"><i
                                        class="far fa-file-alt"></button></i></a></td>
                        </tr>

                        <?php
                              }
                          ?>
                    </table>

                </div>
                <br /><br /><br />


            </div>
        </div>
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

    <script type="text/javascript">
    function confirmation() {
        answer = confirm("Do you want to delete");
        return answer;
    }
    </script>


    <?php

if(isset($_GET['id'])) 
{
  $SID = $_GET['id']; 
  mysqli_query($con, "Delete from sale where sale_id='$SID'");
  ?>

    <script type="text/javascript">
    alert("Delete Successfull!");
    window.location.href = 'view sale.php';
    </script>

    <?php
}

?>
</body>

</html>