<?php
	
	$con=mysqli_connect('localhost','root','');
	mysqli_select_db($con,'inventory');
	include('Library/fpdf.php');
	session_start();

 //$sale_no = $_SESSION['id'];
 $query     = "SELECT * FROM sale WHERE sale_id = '".$_GET["id"]."'";
 $result    = mysqli_query($con,$query);
  
	if($row=mysqli_fetch_assoc($result))
	{
		
		if($row['sale_id'] != "" || $row['sale_id'] != NULL )
		{
			$sid = $row['sale_id'];
			$spd  = $row['sale_prod_name'];
			$sp  = $row['sale_price'];
			$sqs  = $row['sale_qty_sold'];
			$date  = $row['sale_date'];
			$sto= $row['total_price'];
			$CID = $row['cust_id'];
			$cust_sql = "SELECT * FROM customer WHERE cust_id='$CID'";
			$cust_result = mysqli_query($con,$cust_sql);
			if(mysqli_num_rows($cust_result) > 0)
			{
				while($cust_row = mysqli_fetch_assoc($cust_result)){
					$cust_name = $cust_row['cust_name'];
					$cust_add = $cust_row['cust_add'];
					$cust_cont = $cust_row['cust_contact'];
					$cust_email = $cust_row['cust_email'];
					$address_length = strlen($cust_add);

					/* For Splitting the Address */
					$strlen=strlen($cust_add);
					$first= intval($strlen * (55/100));
					$second=intval($strlen * (55/100));
					$third=intval($strlen * 50/100);
					$first_part=substr($cust_add,0,$first);
					$second_part=substr($cust_add,$first,$second);
					$third_part=substr($cust_add,($first+$second));
				}
			}
			$timestamp = strtotime($date);
			$new_date = date("d-m-Y", $timestamp);

		}
		else
		{
			
		}

		
		
	}
	class myPDF extends FPDF
	{
		function Header()
		{
			global $date,$sid,$spd,$sp,$sqs,$pd,$sto,$CID,$cust_name,$cust_add,$cust_cont
			,$cust_email,$first_part,$second_part,$third_part,$new_date;
			
			$this->Image('image/inventory_logo.png',2,5,-100,0);
			$this->Cell(500);
			$this->SetFont("Arial","B",16);
			$this->SetY(8);
			$this->SetX(29);
			$this->SetFont("Arial","B",20);
			$this->Cell(139,8,"Invoice",0,1,"C");

			$this->SetY(24);
			$this->SetX(2);
			$this->SetFont("Arial","B",13);
			$this->SetFont('');
			$this->Cell(25,5,"Jalan Ayer Keroh Lama,",0,1,"L");
			
			$this->SetX(2);
			$this->Cell(25,5,"75450 Bukit Beruang,",0,1,"L");
			
			$this->SetX(2);
			$this->Cell(25,5,"Melaka",0,1,"L");
			
			$this->SetX(2);
			$this->Cell(25,5,"012-1234567",0,1,"L");

		
			

			//First Horizontal line

			$this->Line(0,48,210,48);
			$this->Cell(20);
			$this->setTextColor(0,0,0);
			$this->SetY(30);
			
			// BILL to Information
			$this->SetY(60);
			$this->SetFont("Arial","B",16);
			$this->SetX(2);
			$this->Cell(25,5,"BILL TO:",0,1,"L");
			$this->SetY(68);
			$this->SetFont("Arial","B",13);
			$this->SetFont('');
			$this->SetX(2);
			$this->Cell(25,5,$cust_name,0,0,"L");
			$this->SetY(73);
			$this->SetX(2);
			$this->Cell(25,5,$first_part,0,0,"L");
			$this->SetY(78);
			$this->SetX(2);
			$this->Cell(25,5,$second_part,0,0,"L");
			$this->SetY(83);
			$this->SetX(2);
			$this->Cell(25,5,$third_part,0,0,"L");
			$this->SetY(83);
			$this->SetX(2);
			$this->Cell(25,5,$cust_cont,0,0,"L");
			$this->SetY(88);
			$this->SetX(2);
			$this->Cell(25,5,$cust_email,0,0,"L");
			$this->Ln(2);

			//Invoice and date information
			$this->SetY(60);
			$this->SetX(150);
			$this->SetFont("Arial","B",13);
			$this->Cell(20,5,"Invoice :",0,0,"L");
			$this->SetX(170);
			$this->SetFont("Arial","B",13);
			$this->SetFont('');
			$this->Cell(20,5,$sid,0,0,"L");
			$this->SetY(65);
			$this->SetX(150);
			$this->SetFont("Arial","B",13);
			$this->Cell(20,5,"Date:",0,0,"L");
			$this->SetX(170);
			$this->SetFont("Arial","B",13);
			$this->SetFont('');
			$this->Cell(20,5,$new_date,0,0,"L");

			//2nd Horizontal line
			$this->Line(0,110,210,110);
			$this->Cell(20);
			$this->setTextColor(0,0,0);
			$this->SetY(30);


			//sale information 
			$this->SetY(115);
			$this->SetX(38);
			$this->SetFont("Arial","B",16);
			$this->Cell(139,8,"Sale Information",0,1,"C");
			$this->Ln(2);

			$this->SetX(2);
			$this->SetFont("Arial","B",16);
			$this->Cell(70,9,"Item Name",1,0,"C");
			$this->Cell(39,9,"Item Price",1,0,"C");
			$this->Cell(39,9,"Item Qty",1,0,"C");
			$this->Cell(59,9,"Total (RM)",1,0,"C");
			$this->Ln(2);

			$this->SetY(134);
			$this->SetX(2);
			$this->SetFont("Arial","B",13);
			$this->SetFont('');
			$this->Cell(70,9,$spd,1,0,"C");
			$this->Cell(39,9,$sp,1,0,"C");
			$this->Cell(39,9,$sqs,1,0,"C");
			$this->Cell(59,9,$sto,1,0,"C");
			$this->Ln(2);

			//T&C conditions
			$this->SetY(200);
			$this->SetX(2);
			$this->Cell(25,5,"Terms & Conditions:",0,0,"L");
			$this->SetY(210);
			$this->SetX(2);
			
			$this->Cell(22,5,"The ordered items are payable via card or cash",0,1,"L");
			$this->SetX(2);
			$this->Ln(5);
			$this->SetX(2);
			$this->Cell(22,5,"No refund will be entertained once the orders are delivered",0,1,"L");
		
			
		}
		
		function footer()
		{
			$this->SetY(285);
			$this->SetFont("Arial","",9);
			$this->Cell(107,6,"Page"." ".$this->PageNo().' of {nb}',0,1,"R");

			$this->Line(0,48,210,48);
			$this->Cell(20);
			$this->setTextColor(0,0,0);
			$this->SetY(30);

		
		}

	}

	$pdf=new myPDF();
	$pdf->AliasNbPages();
	$pdf->SetAutoPageBreak(true,15);
	$pdf->AddPage('','A4',0);
	$pdf->SetFont("Arial","",9);

			
			
			

			$pdf->Output();
	
?>