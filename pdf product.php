<?php 

$db=new PDO("mysql:host=localhost;dbname=inventory",'root','');

include('Library/fpdf.php');

session_start();

class myPDF extends FPDF
{
    function header()
    {
        $this->Image('C:\xampp\htdocs\inventory\Library\inventory_logo.png',10,10,-300);
        $this->SetFont('Arial','B',16);
        $this->Cell(400,5,"Product Report",0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(400,10,'Total Product Report',0,0,'C');
        $this->Ln(20);
    }
    function footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','',10);
        $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
    }
    function headerTable()
    {
        $this->SetFont('Times','B',10);
        $this->Cell(17,10,"Product ID",1,0,'C');
        $this->Cell(70,10,"Product Image",1,0,'C');
        $this->Cell(40,10,"Product Name",1,0,'C');
        $this->Cell(130,10,"Product Desc",1,0,'C');
        $this->Cell(30,10,"Product Quantity",1,0,'C');
        $this->Cell(40,10,"Product Buying Price",1,0,'C');
        $this->Cell(40,10,"Product Sales Price",1,0,'C');
        $this->Cell(35,10,"Product Date",1,0,'C');
        $this->Ln(10);
        
        
        
    }
    function ViewTable($db)
    {
        $this->SetFont('Times','',10);
        $stmt=$db->query("SELECT *from product");
        while($data= $stmt->fetch(PDO::FETCH_OBJ))
        {
            $date = $data->prod_in_date;
            $timestamp = strtotime($date);
        $new_date = date("d-m-Y", $timestamp);
            $this->Cell(17,10,$data->prod_id,1,0,'C');
            $this->Cell(70,10,$data->prod_image,1,0,'L');
            $this->Cell(40,10,$data->prod_name,1,0,'L');
            $this->Cell(130,10,$data->prod_desc,1,0,'L');
            $this->Cell(30,10,$data->prod_qty,1,0,'L');
            $this->Cell(40,10,$data->prod_buy_price,1,0,'L');
            $this->Cell(40,10,$data->prod_sale_price,1,0,'L');
            $this->Cell(35,10,$new_date,1,0,'L');
            $this->Ln(10);
            
            
        }
    }
    
    
    
    
}
$pdf= new myPDF();

$pdf->AliasNbPages();

$pdf->AddPage('L','A3',0);

$pdf->headerTable();

$pdf->ViewTable($db);



$pdf->Output();


?>