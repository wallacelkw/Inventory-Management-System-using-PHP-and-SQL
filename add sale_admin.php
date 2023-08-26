<?php include('config.php');
session_start();
$name = $_SESSION['admin_name'];
if(isset($_POST['addbtn']))
{
    session_start();

    $SaleProductName=$_POST['sale_prod_name'];  //product name (load_sale.php)
    $SalePrice = $_POST['sale_price'];          // product sale price (load_sale.php)
    $SaleQtySold=$_POST['sale_qty_sold'];       // product quantity going to sell 
    $SaleTotal = $_POST['total_price'];         // total price going to sell
    $SaleDate=$_POST['sale_date'];              // update sales data
    $prodID=$_POST['prod_id'];                  // foreign key for product id
    $custID=$_POST['cust_id'];                  // foreign key for customer id
    $product_qty = $_POST['prod_qty'];          // get the quantity data from product database(load_sale.php)      

    $sql = "Insert INTO sale(sale_prod_name,sale_price,sale_qty_sold,total_price,sale_date,prod_id,cust_id) 
    values('$SaleProductName','$SalePrice','$SaleQtySold',$SaleTotal,'$SaleDate','$prodID','$custID')";
    // execute query
    $totalPrice =0;
    $totalPrice= $product_qty - $SaleQtySold;

    
    //update product quantity
    $updata_sql = "UPDATE product SET prod_qty = '$totalPrice' WHERE
                    prod_id='$prodID'";

    if(mysqli_query($con, $sql)){
        //echo "<script>console.log('Product Quantity : ,".$totalPrice.")</script>";
        //update the latest product quantity from product database
        if(mysqli_query($con, $updata_sql)){
            echo "<script type='text/javascript'>alert('Added Successfully')</script>";
        }

        echo "<script>document.location='add sale_admin.php';</script>";
        
        
    }

        ?>

<script>
alert("Added Succesfully");
</script>
<?php
   // header("Location: index.php");
  mysqli_close($con);
}


$sql = "SELECT *
FROM product";
$res = mysqli_query($con, $sql) or die ("Error SQL: $sql");

//DROPDOWN FOR Sales Product

function fill_brand($con){
    $sql = "SELECT *
    FROM product WHERE prod_qty >0";
    $res = mysqli_query($con, $sql) or die ("Error SQL: $sql");
    $opt = '';
while ($row = mysqli_fetch_assoc($res)) {  
    $opt .= "<option   value='" . $row['prod_id'] . " '>" . $row['prod_name'] ." </option>";

}
    return $opt;
}

function fill_customer($con){
    $sql = "SELECT *
    FROM customer WHERE cust_status='Active' OR cust_status=' Active'";
    $res = mysqli_query($con, $sql) or die ("Error SQL: $sql");
    $opt = '';
while ($row = mysqli_fetch_assoc($res)) {  
    $opt .= "<option  value='" . $row['cust_id'] . " '>" . $row['cust_name'] ." </option>";

}
    return $opt;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Page</title>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    /*font-family: 'Poppins',sans-serif;*/
}

/*
body{
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
  background-image:url("image/stock-in-inventory-warehouse-cycle-stock.jpg");
  background-size:cover;
}
*/
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



.changeDate input {
    position: relative;
    width: 150px;
    height: 20px;
    color: white;
}

.changeDate input:before {
    content: attr(data-date);
    display: inline-block;
    color: black;
}

.changeDate input::-webkit-datetime-edit,
input::-webkit-inner-spin-button,
input::-webkit-clear-button {
    display: none;
}

.changeDate input::-webkit-calendar-picker-indicator {
    position: absolute;
    right: 0;
    color: black;
    opacity: 1;
}
</style>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include("sidebar_admin.php"); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include("topbar.php"); ?>
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="m-0 font-weight-bold text-primary">Sales</h1>
                    <div class="content">
                        <form method="post" enctype="multipart/form-data">
                            <br>
                            <div class="user-details">
                                <label for="supp_status">Product</label>
                                <select class='form-control' id='prod_id' name='prod_id' required
                                    onchange="selecProduct()">
                                    <option value="">Show All Product</option>
                                    <?php echo fill_brand($con); ?>
                                </select>
                                <br><br>
                                <div class="container-fluid" id="disp"></div>
                            </div>

                            <div class="user-details">
                                <label>Customer</label>
                                <select class='form-control' name='cust_id' required>
                                    <option value="">Select Customer</option>
                                    <?php echo fill_customer($con); ?>
                                </select>
                                <br><br>
                                <div class="container-fluid" id="disp"></div>
                            </div>

                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details">Number of Product Sold(unit)</span>
                                    <input type="number" name="sale_qty_sold" id="sale_qty_sold"
                                        onchange="selecProduct()"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                        pattern="[0-9]{0,9}" id="quantity" required>
                                </div>
                            </div>

                            <div class="user-details">
                                <label for="supp_name">Total Price(RM)</label>
                                <input class="form-control" type="text" id="totalPrice" name="total_price" required
                                    readonly="readonly">
                            </div>
                            <div class="user-details">
                                <div class="input-box changeDate">
                                    <span class="details ">Product Date</span>
                                    <input type="date" name="sale_date" value="" data-date=""
                                        data-date-format="DD MMMM YYYY" required>
                                </div>
                            </div>
                            <div class="button">
                                <input type="submit" name="addbtn" value="Add Sales Information"
                                    onClick='return confirmSubmit()'>
                            </div>
                        </form>



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
    <!-- snipet for pop out -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script>
    //DROP DOWN PRODUCT NAME based on PRODUCT ID   
    function selecProduct() {
        var x = document.getElementById("prod_id").value;
        var y = document.getElementById("sale_qty_sold").value;

        //console.log("x value", x);
        console.log("sale_qty_sold Quantity", y);
        $.ajax({
            url: "load_sale.php",
            method: "POST",
            data: {
                id: x,
                quantity: y
            },
            success: function(data) {
                $("#disp").html(data);
                var sale_price = document.getElementById("sale_price").value;
                var tPrice = 0;
                let num = y * sale_price;
                let n = num.toFixed(2);
                tPrice = n;
                document.getElementById("totalPrice").value = tPrice;
                console.log("Product Price ", tPrice);
            }
        })
    }

    function confirmSubmit() {
        var agree = confirm("Are you sure you wish to Confirm This Order?");
        if (agree)
            return true;
        else
            return false;
    }
    </script>
    <script>
    $("input").on("change", function() {
        this.setAttribute(
            "data-date",
            moment(this.value, "YYYY-MM-DD")
            .format(this.getAttribute("data-date-format"))
        )
    }).trigger("change")
    </script>




</body>

</html>