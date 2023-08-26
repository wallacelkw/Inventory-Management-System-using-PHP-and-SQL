<?php include('config.php');
session_start();
$name = $_SESSION['admin_name'];

if(isset($_POST['addbtn']))
{
    session_start();

    $Product_Image = $_FILES["prod_image"]["name"]; 
    $tempname = $_FILES['prod_image']["tmp_name"];     
    $folder = "products/"; 

    $ProductName=$_POST['prod_name'];
    $ProductDesc = $_POST['prod_desc'];
    $ProductQTY=$_POST['prod_qty'];
    $ProductBuyPrice=$_POST['prod_buy_price'];
    $ProductSalePrice=$_POST['prod_sale_price'];
    $ProductDate = $_POST['prod_in_date'];
    $supp = $_POST['supp_id'];
    
    

    $sql_a= "SELECT *from product where prod_name='$ProductName'";

        $result_a=mysqli_query($con,$sql_a);

        if(mysqli_num_rows($result_a)>0)
        {
            ?>
<script>
alert("The Product name being Used. Please us a new Name");
</script>
<?php
        }
        else
        {
            $sql = "INSERT INTO product(prod_image,prod_name,prod_desc,prod_qty,prod_buy_price,prod_sale_price,prod_in_date,supp_id) values
            ('$Product_Image','$ProductName','$ProductDesc','$ProductQTY','$ProductBuyPrice','$ProductSalePrice','$ProductDate','$supp')";
    // execute query
        mysqli_query($con, $sql);

      $movefile= move_uploaded_file($tempname,$folder.$Product_Image);

      
            echo "<script type='text/javascript'>alert('Added Successfully')</script>";
            echo "<script>document.location='add product_admin.php';</script>";
      
    
        }
        echo "<script>document.location='add product_admin.php'
        </script>";
  mysqli_close($con);
}

function fill_brand($con){
        //DROPDOWN FOR SUPPLIER
        $sql = "SELECT supp_status,supp_id,supp_name
                FROM supplier WHERE supp_status=' Active'or supp_status='Active'";
        $res = mysqli_query($con, $sql) or die ("Error SQL: $sql");
        $opt = "<select class='form-control'  name='supp_id' required>
                <option value='' disabled selected hidden>Select Supplier</option>";
        while ($row = mysqli_fetch_assoc($res)) {
                $opt .= "<option value='" . $row['supp_id'] . " " . $row['supp_status'] . "'>" . $row['supp_name'] ." </option>";

        }
        $opt .= "</select>";
        return $opt;
        // END OF DROP DOWN
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>

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
    margin: 20px 0 12px 0;
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
    padding-left: 15px;
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
    width: calc(100% / 2 - 20px);
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
                    <h1 class="m-0 font-weight-bold text-primary">Product Page</h1>
                    <div class="container-fluid">
                        <div class="content">
                            <form method="post" enctype="multipart/form-data">
                                <br>
                                <div class="user-details">
                                    <label for="supp_status">Supplier</label>
                                    <?php echo fill_brand($con); ?>
                                </div>

                                <div class="user-details">
                                    <div class="input-box">
                                        <span class="details">Product Image</span>
                                        <input type="file" name="prod_image" required>
                                    </div>
                                    <div class="input-box">
                                        <span class="details">Product Name</span>
                                        <input type="text" name="prod_name" pattern="[a-zA-Z ]{5,30}"
                                            placeholder="Enter full product Name" required>

                                    </div>

                                </div>

                                <div class="user-details">

                                    <span class="details">Product Description</span>
                                    <textarea class="form-control" name="prod_desc" rows="5" required></textarea>

                                </div>

                                <div class="user-details">
                                    <div class="input-box">
                                        <span class="details">Product Qty</span>
                                        <input type="number" name="prod_qty" min="1"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                            pattern="[0-9]{0,9}" required>
                                    </div>

                                    <div class="input-box">
                                        <span class="details">Product Buying Price</span>
                                        <input type="number" name="prod_buy_price" pattern="[0-9]{0,9}" min="0.00"
                                            max="10000000.00" step="0.01" required>
                                    </div>
                                </div>

                                <div class="user-details">
                                    <div class="input-box">
                                        <span class="details">Product Sale Price</span>
                                        <input type="number" name="prod_sale_price" pattern="[0-9]{0,9}" min="0.00"
                                            max="10000000.00" step="0.01" required>
                                    </div>
                                    <div class="input-box changeDate">
                                        <span class="details ">Product Date</span>
                                        <input type="date" name="prod_in_date" value="" data-date=""
                                            data-date-format="DD MMMM YYYY" required>
                                    </div>
                                </div>

                                <div class="button">
                                    <input type="submit" name="addbtn" value="Add Product">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
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



    <!--Save notification-->
    <script type="text/javascript">
    function confirmation() {
        answer = confirm("Do you want to Save");
        return answer;
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