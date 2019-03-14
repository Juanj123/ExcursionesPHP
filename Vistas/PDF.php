<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
	function Header()
	{
		global $title;
		$this->Image('../Vistas/img/Excursiones Lore Pantoja.png',10,8,33);

		$this->SetFont('Arial','B',30);

		$this->Cell(200,30,'Excursiones Lore Pantoja',0,0,'C');
		$this->Ln(40);
	}

	function Footer()
	{
    // Posición a 1,5 cm del final
		$this->SetY(-15);
    // Arial itálica 8
		$this->SetFont('Arial','I',8);
    // Color del texto en gris
		$this->SetTextColor(128);
    // Número de página
		$this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');
	}

	function ChapterTitle()
	{
    // Arial 12
		$this->SetFont('Arial','',16);
    // Color de fondo
		$this->SetFillColor(0,0,0);
	// Color de Letra
		$this->SetTextColor(255,255,255);
    // Título
		$this->Cell(0,6,"Informacion del Usuario",0,0,'C',true);
    // Salto de línea
		$this->Ln(4);
	}

	function ChapterBody($file)
	{
    // Leemos el fichero
		$txt = file_get_contents($file);
    // Times 12
		$this->SetFont('Times','',12);
    // Imprimimos el texto justificado
		$this->MultiCell(0,5,$txt);
    // Salto de línea
		$this->Ln();
    // Cita en itálica
		$this->SetFont('','I');
		$this->Cell(0,5,'(fin del extracto)');
	}

	function PrintChapter($file)
	{
		$this->AddPage();
		$this->ChapterTitle();
		$this->ChapterBody($file);
	}
}

$pdf = new PDF();
$title = '20000 Leguas de Viaje Submarino';
$pdf->SetTitle($title);
$pdf->SetAuthor('Julio Verne');
$pdf->PrintChapter('backupAparta.txt');
$pdf->Output();
?>