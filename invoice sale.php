<?php include('config.php');?>

<?php

session_start();
$name = $_SESSION['admin_name'];
$SID = $_GET['id'];
$sql = "SELECT * FROM sale WHERE sale_id='$SID'";

$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        $a = $row["sale_id"];
        $b = $row["sale_prod_name"];
        $c = $row["sale_price"];
        $d = $row['sale_qty_sold'];
        $e = $row["sale_date"];
        $f = $row['total_price'];
        $CID = $row['cust_id'];
        $cust_sql = "SELECT * FROM customer WHERE cust_id='$CID'";
        $cust_result = mysqli_query($con,$cust_sql);
        if(mysqli_num_rows($cust_result) > 0)
        {
            while($cust_row = mysqli_fetch_assoc($cust_result)){
                $g = $cust_row['cust_name'];
                $h = $cust_row['cust_add'];
                $i = $cust_row['cust_contact'];
                $j = $cust_row['cust_email'];
            }
        }
        $timestamp = strtotime($e);
        $new_date = date("d-m-Y", $timestamp);

    }
    
}


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Product</title>

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
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

.container {
    max-width: 700px;
    width: 100%;
    background-color: #fff;
    padding: 25px 30px;
    border-radius: 5px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
}

.container .title {
    font-size: 25px;
    font-weight: 500;
    position: relative;
}

.container .title::before {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 30px;
    border-radius: 5px;
    /*background: linear-gradient(135deg, #71b7e6, #9b59b6);*/
}

.content form .user-details {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 10px 0 12px 0;

}

form .user-details .input-box {
    margin-bottom: 15px;
    width: calc(100% / 2 - 20px);

}

form .input-box span.details {
    display: block;
    font-weight: 500;
    margin-bottom: 5px;
}

.user-details .input-box input {

    height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 16px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
}

.user-details .input-box input:focus,
.user-details .input-box input:valid {
    border-color: #9b59b6;
}

form input[type="file"] {
    padding: 10px;
    cursor: pointer;
    top: 3px;
}

form .button {
    height: 45px;
    margin: 35px 0
}

form .button input {
    height: 100%;
    width: 100%;
    border-radius: 5px;
    border: none;
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
}

form .button input:hover {
    /* transform: scale(0.99); */
    background: linear-gradient(-135deg, #71b7e6, #9b59b6);
}

@media(max-width: 584px) {
    .container {
        max-width: 100%;
    }

    form .user-details .input-box {
        margin-bottom: 15px;
        width: 100%;
    }

    form .category {
        width: 100%;
    }

    .content form .user-details {
        max-height: 300px;
        overflow-y: scroll;
    }

    .user-details::-webkit-scrollbar {
        width: 5px;
    }
}

@media(max-width: 459px) {
    .container .content .category {
        flex-direction: column;
    }
}

form .user-details .input-box {
    margin-bottom: 15px;
    width: 100%;
}

form .input-box span.details {
    display: block;
    font-weight: 500;
    margin-bottom: 5px;
}

.user-details .input-box textarea {
    height: 115px;
    width: 214%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
}

.user-details .input-box textarea:focus,
.user-details .input-box textarea:valid {
    border-color: #9b59b6;
}

/*------------------------INVOICE------------------------ */

.invoice-title {
    text-align: center;
    font-size: 40px;
    font-weight: bold;

}

.invoice-information {
    text-align: center;
    font-size: 25px;
    font-weight: bold;
}

tr {
    font-size: 20px;
    font-weight: bold;
    background-color: black;
    color: #fff;
}

td {
    font-size: 19px;
    color: black;
}


.user-details-top {
    display: flex;
    justify-content: space-between;

}

.user-details-top h1 {
    font-size: 18px;
    font-weight: 0;
}



.user-details-top label {
    font-size: 25px;
    font-weight: bold;

}

.user-details-top h2 {
    font-size: 18px;
}

.top-left-invoice {
    width: 30%;
}



.top-right-invoice {
    display: flex;
    float: right;
}

.top-right-invoice .detail {
    padding: 0 20px 0 20px;
}

.top-right-invoice h1 {

    font-weight: bold;
}


.user-details-topper .detail {
    width: 15%;
}

.user-details-topper h1 {
    font-size: 25px;
}

.user-details-topper h2 {
    font-size: 18px;
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
                <!-- Begin Page Content -->

                <div class="container-fluid">

                    <div class="title invoice-title">Invoice</div>
                    <div class="content">
                        <form method="post" enctype="multipart/form-data">
                            <div class="user-details-topper">
                                <img src="image/inventory_logo.png" width="15%" />
                                <div class="detail">
                                    <br>
                                    <h2>Jalan Ayer Keroh Lama, 75450 Bukit Beruang, Melaka</h2>
                                    <h2>012-1234567</h2>
                                </div>
                            </div>
                            <hr>

                            <div class="user-details-top">
                                <div class="top-left-invoice">

                                    <label>BILL TO:</label>
                                    <br>
                                    <h2><?php echo $g?></h2>
                                    <!--Name-->
                                    <h2><?php echo $h?></h2>

                                    <!--Contact-->
                                    <h2><?php echo $j?></h2>
                                    <!--Add-->
                                    <h2><?php echo $i?></h2>
                                </div>
                                <div class="top-right-invoice">
                                    <div class="detail">
                                        <h1>INVOICE :</h1>
                                        <h1>DATE :</h1>
                                    </div>
                                    <div>
                                        <h2><?php echo $a?></h2>
                                        <h2><?php echo $new_date?></h2>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <br>
                            <div class="table-information">
                                <div class="title invoice-information">Sale Information</div>
                                <br>
                                <table class="table table-striped table-bordered" id="data_table" style="width:100%;">
                                    <thead>
                                        <tr class="control-form">
                                            <th>Product Name</th>
                                            <th width="8%">Quantity(Unit)</th>
                                            <th width="20%">Price(Unit)</th>
                                            <th width="20%">Total Price(RM)</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td><?php echo $b;?> </td>
                                        <td>x<?php echo $d;?></td>
                                        <td>RM <?php echo $c;?></td>
                                        <td><?php echo $f;?></td>
                                    </tr>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
    </div>
    <?php include("logout_confirm.php"); ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- snipet for pop out -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.js"></script>

</body>

</html>

<?php
/*
if(isset($_POST["update"])) 	
{

    $SaleProductName=$_POST['sale_prod_name'];
    $SalePrice = $_POST['sale_price'];
    $SaleQtySold=$_POST['sale_qty_sold'];
    $SaleDate=$_POST['sale_date'];
    
    
   
	mysqli_query($con,"UPDATE sale SET sale_prod_name='$SaleProductName',sale_price='$SalePrice',sale_qty_sold='$SaleQtySold',sale_date='$SaleDate' where sale_id='$SID'");
     
	$result=mysqli_query($con,$sql);
	 

	echo "<script type='text/javascript'>alert('Update Successfully')</script>";
    echo '<script>window.location.href="view sale.php"</script>';	

}
*/
?>