<?php
require_once('config.php');

$prodId = $_POST['id'];
$prodQty = $_POST['quantity']; //quantity from sales

$sql = "SELECT * FROM product WHERE prod_id = '$prodId'";  
$result = mysqli_query($con, $sql) or die ("Error SQL: $sql");;  
while($row = mysqli_fetch_array($result))  
{ 
    

    if($prodQty <= $row['prod_qty'] && $row['prod_qty'] >= 1  ){
       
    echo '<br><label class="font-weight-bold"> Product Details</label>
    <hr><label >Product Quantity(Unit)</label>
        <input class="form-control" name="sale_prod_name" value="'.$row['prod_name'].'" type="hidden">
        <input class="form-control" name="prod_qty" value='.$row['prod_qty'].' readonly="readonly">';
        
    echo '<label >Product Sale Price(unit)(RM) </label>
    <input class="form-control" id="sale_price" name="sale_price" value='.$row['prod_sale_price'].' readonly="readonly">
    <hr>';
   
    }else if($prodQty > $row['prod_qty']){
        
    echo '<script> alert("Please refer to Product Detail Quantity. ");
        document.getElementById("sale_qty_sold").value = "";
        </script>';

    echo '<br><label class="font-weight-bold"> Product Details</label>
            <hr><label >Product Quantity(Unit)</label>
            <input class="form-control" name="sale_prod_name" value='.$row['prod_name'].' readonly="readonly" type="hidden">
            <input class="form-control" value='.$row['prod_qty'].' readonly="readonly">';

    echo '<label >Product Sale Price(RM)</label>
            <input class="form-control" id="sale_price" name="sale_price" value="RM  '.$row['prod_sale_price'].'" readonly="readonly">
            <hr>';
    }else if($row['prod_qty'] == 0){
        
        echo '<script> alert("Quantity of '.$row['prod_name'].' is empty. ");
        document.getElementById("sale_qty_sold").value = "";
        </script>';
    }
    
} 

 ?>