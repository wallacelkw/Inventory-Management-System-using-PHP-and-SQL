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
    <title>View Product</title>

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

</head>


<style>
.container_product {
    border-radius: 3px;
    margin-right: auto;
    margin-left: auto;
    width: 100%;
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

.btn-color a {
    text-decoration: none;
    display: inline-block;
    padding: 10px 20px;
    position: center;
    font-weight: bold;
    outline: none;
    color: white;
}

.btn-color a:hover {
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
    margin: 30px;
}

.btn1 {
    background-color: red;
    color: black;
    border-radius: 5px;
}

.img-size img {
    margin-left: auto;
    margin-right: auto;
    display: block;
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

.topcontainer {
    display: flex;
    justify-content: space-between;

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
                <!-- Page Heading -->
                <div class="container-fluid">
                    <div class="topcontainer">
                        <h1 class="m-0 font-weight-bold text-primary">Product Information</h1>
                        <a class=" btn file-btn btn-color" href="pdf product.php">View All Product</a>
                    </div>

                    <br><br>
                    <table class="table table-striped table-bordered" id="data_table" style="width:100%">
                        <thead>
                            <tr class="control-form">
                                <th>Product ID</th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Product Quantity</th>
                                <th>Product Buying Price</th>
                                <th>Product Sales Price</th>
                                <th>Product Date</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <?php   

                $result=mysqli_query($con,"Select *from product");

                while($row=mysqli_fetch_assoc($result))
                {

                $date = $row['prod_in_date'];
                $timestamp = strtotime($date);
        $new_date = date("d-m-Y", $timestamp);
                    ?>
                        <tr class="control-form">
                            <td><?php echo $row['prod_id'];?></td>
                            <td class="img-size">
                                <?php echo "<img src=' products/{$row['prod_image']} 'style=width:180px;>";?></td>
                            <td><?php echo $row['prod_name'];?> </td>
                            <td><?php echo $row['prod_desc'];?></td>
                            <td><?php echo $row['prod_qty'];?></td>
                            <td>RM <?php echo $row['prod_buy_price'];?></td>
                            <td>RM <?php echo $row['prod_sale_price'];?></td>
                            <td><?php echo $new_date;?></td>
                            <!--take button or use a tag link -->
                            <td><a class="btn edit-btn btn-color"
                                    href="update product.php?productid=<?php echo $row['prod_id'];?>"><i
                                        class="fa fa-edit"></i></a>
                </div>
                </td>
                <td><a class="btn trash-btn btn-color"
                        href="view product.php?delproduct_id=<?php echo $row['prod_id'];?>"
                        onclick="return confirmation('Do you want to delete this package?');"><i
                            class="fa fa-trash"></i></a></td>

                </tr>

                <?php
                }
            ?>
                </table>

            </div>

            <!--end content-wrapper-->
        </div>
        <!-- END Page Wrapper -->
    </div>

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


    <!--delete notification-->
    <script type="text/javascript">
    function confirmation() {
        answer = confirm("Do you want to delete");
        return answer;
    }
    </script>

    <?php
if(isset($_GET['delproduct_id'])) 
{
  $PID = $_GET['delproduct_id']; 
  mysqli_query($con, "Delete from product where prod_id='$PID'");
  ?>

    <script type="text/javascript">
    alert("Delete Successfull!");
    window.location.href = 'view product.php';
    </script>

    <?php
}

?>
</body>

</html>