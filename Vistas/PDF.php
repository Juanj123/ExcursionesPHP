<?php
require_once '../fpdf/fpdf.php';
require_once '../Datos/DaoApartaTuLugar.php';
require_once '../Pojos/PojoApartaTuLugar.php';
$pojo = new PojoApartaTuLugar();
$daoAparta = new DaoApartaTuLugar();
class PDF extends FPDF
{
   //Cabecera de página
   function Header()
   {

       $this->Image('../Vistas/img/Excursiones Lore Pantoja.png',10,8,33);

      $this->SetFont('Arial','B',30);

      $this->Cell(200,30,'Excursiones Lore Pantoja',0,0,'C');
   }
}

//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Output();
?>