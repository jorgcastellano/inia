<?php
require('fpdf.php');

class PDF extends FPDF
{


    public function Header()
   {
  	  $this->Image("imagen.png" , 10,3.5,40,25, "PNG");
      $this->SetFont("Arial","B",9);
	  $this->SetX(50);
      $this->MultiCell(100,3.5, 'República Bolivariana de Venezuela
	  Ministerio del  Poder Popular  para la Agricultura y Tierras
 	  instituto Nacional de Investigaciones Agrícolas ',0, "C" );
 	  $this->SetFont("Arial","B",5,"L");
	  $this->SetX(65);
	  $this->Write(5,'Dirreccion ');
	  $this->SetFont("Arial","i",5,"L");
	  $this->Cell(0,5, 'Fiscal Av Universidad via El limon Edif. Sede Gcia. INIA Maracay-Edo. Aragua ',0, "C" );
      $this->SetFont("Arial","B",5,"L");
	  $this->SetX(75);
	  $this->Write(10,'Sucursal ');
      $this->SetFont("Arial","i",5,"L");
	  $this->Cell(10,10, ' Av Urdaneta, Edificio INIA, Piso N° 02, Merida-Edo. Merida',0, "C" );
	  $this->SetY(8);
	  $this->SetX(95);
	  $this->write(30,'www.inia.gov.ve ',0, "C" );
	  $this->SetY(11);
	  $this->SetX(93);
	  $this->SetFont("Arial","B",6,"L");
	  $this->write(30,'RIF: G-20000095-3 ',0, "C" );
	  $this->SetY(9.5);
	  $this->SetX(170);
	  $this->MultiCell(30,5, ' SERIE C
		FACTURA
		N°, ',1, "C" );
      $this->Ln(15);
   }
   public function footer()
  	{
  
     $this->Cell(20,6,'ESTA FACTURA VA SIN TACHADURAS NI ENMENDADURAS',0,'L',$fill);
		
   	}
   function  tabla()
   {
	$this->SetFont("Arial","B",10,"L");
	$this->MultiCell(190,5,'NOMBRE ó RAZÓN SOCIAL: Benito Gutierrez                                                                    Fecha: 2015-07-14        
	DIRRECCIÒN: Lagunilla Sector La Variante                                                         C.I. / RIF: 23721512                ',1,"L ");
	$this->Ln(3);
	$this->SetX(10);
	$header=array('CANTIDAD','DESCRIPCION','P. UNIT','TOTAL');
     $this->SetFillColor(140,140,140);
     $this->SetTextColor(0,0,0,0);
     $this->SetDrawColor('FFF');
     $this->SetLineWidth(.4);
     $this->SetFont('Arial','B',7);
     
      $this->Cell(20,8,"CANTIDAD",1,0,'C',1);
      $this->Cell(100,8,"DESCRIPCION",1,0,'C',1);
      $this->Cell(25,8,"P. UNIT",1,0,'C',1);
      $this->Cell(45,8,"TOTAL",1,0,'C',1);
     $this->Ln();
   
     $this->SetFillColor(245,245,245);
     $this->SetTextColor(0);
     $this->SetFont('');
    
     $fill=true;
     	$this->SetFont("Arial","B",10);
     	 
		 $this->Cell(20,8,"1",1,0,'L',$fill);
		 $this->Cell(100,8,"PH",1,0,'L',$fill);
		 $this->Cell(25,8,"300",1,0,'L',$fill);
		 $this->Cell(45,8,"300",1,0,'C',$fill);
		 $this->Ln();
    	 $this->Cell(20,8,'1',1,0,'L',$fill);
		 $this->Cell(100,8,"Micro Elementos",1,0,'L',$fill);
		 $this->Cell(25,8,"200",1,0,'L',$fill);
		 $this->Cell(45,8,"200",1,0,'C',$fill);
		 $this->Ln();
		 $this->Cell(20,8,"   ",1,0,'L',$fill);
		 $this->Cell(100,8,"   ",1,0,'L',$fill);
		 $this->Cell(25,8,"  ",1,0,'L',$fill);
		 $this->Cell(45,8,"  ",1,0,'L',$fill);
		 $this->Ln();
		 $this->Cell(75,8,"OBSERVACION:",'LT',0,'L',$fill);
		 $this->Cell(70,8,"SUB-TOTAL:",1,0,'L',$fill);
		 $this->Cell(45,8,"500",1,0,'C',$fill);
		 $this->Ln();
		 $this->Cell(75,20,"     ",'LR',0,'L',$fill);
		 $this->Cell(70,8,"Adiciones, Descuento,Bonificacion al Percio:",1,0,'L',$fill);
		 $this->Cell(45,8,"0       ",1,0,'C',$fill);
		 $this->Ln();
		 $this->Cell(75,8,"     ",'LR',0,'L',$fill);
		 $this->Cell(70,8,"Monto Total Exento:",1,0,'L',$fill);
		 $this->Cell(45,8,"       ",1,0,'',$fill);
		 $this->Ln();
		 $this->Cell(75,20,"     ",'LR',0,'L',$fill);
		 $this->Cell(20,8,"I.V.A.",1,0,'C',$fill);
		 $this->Cell(50,8," Base ",1,0,'C',$fill);
		 $this->Cell(45,8,"     ",1,0,'L',$fill);
		 $this->Ln();
		 $this->Cell(75,8,"     ",0,'L',$fill);
		 $this->Cell(20,8,"12%",1,0,'L',$fill);
		 $this->Cell(50,8," 72 Bs",1,0,'L',$fill);
		 $this->Cell(45,8,"   72 Bs  ",1,0,'C',$fill);
		 $this->Ln();
		 $this->Cell(75,8,"     ",'L',0,'L',$fill);
		 $this->Cell(20,8,"%",1,0,'L',$fill);
		 $this->Cell(50,8," ",1,0,'L',$fill);
		 $this->Cell(45,8," 0",1,0,'C',$fill);
		 $this->Ln();
		 $this->Cell(75,8,"     ",'L',0,'L',$fill);
		 $this->Cell(70,8,"Monto Total del Impuesto segùn Alicuota",1,0,'L',$fill);
		 $this->Cell(45,8," 72 Bs    ",1,0,'C',$fill);
		 $this->Ln();
		 $this->Cell(75,8,"     ",'LB',0,'L',$fill);
		 $this->Cell(70,8,"MONTO TOTAL DE LA VENTA",1,0,'L',$fill);
		 $this->Cell(45,8,"572",1,0,'C',$fill);
		 $this->Ln(19);
		}

		}
		
		$pdf=& new PDF('L', 'mm' ,array(160,210));
		$pdf->SetMargins(10,4);
		$pdf->AddPage();
		$pdf->SetY(30);
		$pdf->tabla();
		$pdf->Output();
?>