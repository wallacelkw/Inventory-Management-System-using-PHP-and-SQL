<?php include('config.php');?>

<?php

//session_start();

$PID = $_GET['productid'];
$sql = "SELECT * FROM product WHERE prod_id='$PID'";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        $a = $row["prod_id"];
        $b = $row["prod_image"];
        $c = $row["prod_name"];
        $d = $row['prod_desc'];
        $e = $row["prod_qty"];
        $f = $row["prod_buy_price"];
        $g = $row["prod_sale_price"];
        $h = $row["prod_in_date"];
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

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.css"/>
   </head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
/*
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
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
.container{
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  margin:10px;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
}
.container .title{
  font-size: 25px;
  font-weight: 500;
 
}
.container .title::before{
  content: "";
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  /*background: linear-gradient(135deg, #71b7e6, #9b59b6);*/
}
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input{
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
.user-details .input-box input:valid{
  border-color: #9b59b6;
}
 form input[type="file"]{
   padding:10px;
   cursor: pointer;
   top:3px;
 }
 form .button{
   height: 45px;
   margin: 35px 0
 }
 form .button input{
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
 form .button input:hover{
  /* transform: scale(0.99); */
  background: linear-gradient(-135deg, #71b7e6, #9b59b6);
  }
 @media(max-width: 584px){
 .container{
  max-width: 100%;
}
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
  }
  @media(max-width: 459px){
  .container .content .category{
    flex-direction: column;
  }
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box textarea{
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
.user-details .input-box textarea:valid{
  border-color: #9b59b6;
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
                                
                                  <div class="title">Product Page</div>
                                  <div class="content">
                                    <form method="post" enctype="multipart/form-data">
                                      <div class="user-details">
                                      <div class="input-box">
                                          <span class="details">Product ID</span>
                                          <input type="text" name="prod_id" value="<?php echo $a;?>" disabled>
                                        </div> 

                                      </div>
                                      <div class="user-details">
                                        <div class="input-box">
                                          <span class="details">Product Image</span>
                                          <input type="file" name="prod_image" value="<?php echo $b;?>"> <?php echo $b;?>
                                        </div> 
                                        <div class="input-box">
                                          <span class="details">Product Name</span>
                                          <input type="text" name="prod_name" pattern="[a-zA-Z ]{5,30}" placeholder="Enter full product Name" value="<?php echo $c;?>" required>
                                      
                                        </div>

                                      </div>

                                      <div class="user-details">
                                        <div class="input-box">
                                          <span class="details">Product Description</span>
                                          <textarea name="prod_desc"  cols="97" rows="5"  required><?php echo $d;?></textarea>
                                        </div>
                                        </div>
                                      
                                      <div class="user-details">
                                        <div class="input-box">
                                          <span class="details">Product Qty</span>
                                          <input type="number" name="prod_qty" min="1" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" pattern="[0-9]{0,9}"  value="<?php echo $e;?>"required>
                                        </div>
                                  
                                        <div class="input-box">
                                          <span class="details">Product Buying Price</span>
                                          <input type="number" name="prod_buy_price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" pattern="[0-9]{0,9}" value="<?php echo $f;?>" required>
                                        </div>
                                      </div>

                                    <div class="user-details">
                                        <div class="input-box">
                                          <span class="details">Product Sale Price</span>
                                          <input type="number" name="prod_sale_price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  pattern="[0-9]{0,9}" value="<?php echo $g;?>"required>
                                        </div>
                                        <div class="input-box">
                                          <span class="details">Product Date</span>
                                          <input type="date" name="prod_in_date" value="<?php echo $h;?>" required>
                                        </div> 
                                    </div>
                                        
                                    <div class="button">
                                        <input type="submit" name="update" value="Update Product">
                                      </div>
                                    </form>
                      
                                  
                              
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
            
            <!-- snipet for pop out -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
            

            <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.js"></script>

</body>
</html>

<?php
if(isset($_POST["update"])) 	
{

    $Product_Image=$_FILES["prod_image"]['name'];

    $Product_Image2="";
    
    if($Product_Image!=''||$Product_Image2 !=NULL)
	{
		$Product_Image2 = $Product_Image;
	}
	else
	{
		$resultb = mysqli_query($con,"Select * from product where prod_id='$PID'");
		$row = mysqli_fetch_assoc($resultb);
		$Product_Image2 = $row['prod_image'];
        
	}


    $ProductName = $_POST["prod_name"];  
	$ProductDesc=$_POST['prod_desc']; 	
    $ProductQTY=$_POST['prod_qty'];
    $ProductBuyPrice=$_POST['prod_buy_price'];
	$ProductSalePrice=$_POST['prod_sale_price'];
    $ProductDate = $_POST['prod_in_date'];
    
    
   
	mysqli_query($con,"UPDATE product SET prod_image='$Product_Image2',prod_name='$ProductName',prod_desc='$ProductDesc',prod_qty='$ProductQTY',prod_buy_price='$ProductBuyPrice', prod_sale_price='$ProductSalePrice',prod_in_date='$ProductDate' where prod_id='$PID'");
     
	$result=mysqli_query($con,$sql);
	 
    $movefile=move_uploaded_file($_FILES["prod_image"]['tmp_name'], "products/".$Product_Image2);


	echo "<script type='text/javascript'>alert('Update Successfully')</script>";
    echo '<script>window.location.href="view product.php"</script>';	

}
?>
